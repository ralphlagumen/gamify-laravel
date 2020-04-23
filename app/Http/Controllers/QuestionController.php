<?php

namespace Gamify\Http\Controllers;

use Gamify\Events\QuestionAnswered;
use Gamify\Http\Requests\QuestionAnswerRequest;
use Gamify\Libs\Game\Game;
use Gamify\Question;
use Gamify\User;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $questions = $user->pendingQuestions();

        return view('question.index', compact('questions'));
    }

    /**
     * @param QuestionAnswerRequest $request
     * @param Question              $question
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function answer(QuestionAnswerRequest $request, Question $question)
    {
        // TODO: If question has been answered can't answer again

        // TODO: AI. Global Badges

        // Obtain how many points has its answer obtained
        $points = 0;
        $answerCorrectness = false;

        foreach ($request->choices as $answer) {
            $choice = $question->choices()->find($answer);
            $points += $choice->score;
            $answerCorrectness = $answerCorrectness || $choice->correct;
        }
        // minimum points for answer is '1'
        if ($points < 1) {
            $points = 1;
        }

        // Create relation between User and Question
        $user = User::findOrFail(Auth::id());
        $user->answeredQuestions()->attach($question, [
            'points' => $points,
            'answers' => implode(',', $request->choices),
        ]);

        // Trigger an event that will update XP, badges...
        event(new QuestionAnswered($user, $question, $answerCorrectness, $points));

        // Deal with Question specific Badges
        if ($answerCorrectness) {
            $answerStatus = 'correct';
        } else {
            $answerStatus = 'incorrect';
        }
        $badges = $question->actions()
            ->whereIn('when', ['always', $answerStatus]);

        // AI. Increment actions
        foreach ($badges as $badge) {
            Game::incrementBadge($user, $badge);
        }

        // AI. Add notifications and return view
        return redirect()->route('questions.show', $question->short_name);
    }

    /**
     * Display the specified resource.
     *
     * @param Question $question
     *
     * @return \Illuminate\View\View
     */
    public function show(Question $question)
    {
        // TODO: If question has been answered, not show form
        $user = User::findOrFail(Auth::id());
        if ($answer = $user->answeredQuestions()->find($question->id)) {
            // User has answered this question
            return view('question.show-answered', compact('answer', 'question'));
        }

        return view('question.show', compact('question'));
    }
}
