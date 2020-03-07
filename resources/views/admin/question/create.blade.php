@extends('layouts.admin')

{{-- Web site Title --}}
@section('title')
    {{ __('admin/question/title.create_a_new_question') }} :: @parent
@endsection

{{-- Content Header --}}
@section('header')
    {{ __('admin/question/title.create_a_new_question') }}
    <small>create a new question</small>
@endsection

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    <li>
        <a href="{{ route('admin.home') }}">
            <i class="fa fa-dashboard"></i> {{ __('admin/site.dashboard') }}
        </a>
    </li>
    <li>
        <a href="{{ route('admin.questions.index') }}">
            {{ __('admin/site.questions') }}
        </a>
    </li>
    <li class="active">
        {{ __('admin/question/title.create_a_new_question') }}
    </li>
    @endsection

    {{-- Content --}}
    @section('content')

            <!-- notifications -->
    @include('partials.notifications')
            <!-- ./ notifications -->

    @include('admin/question/_form', ['action' => 'create'])
@endsection
