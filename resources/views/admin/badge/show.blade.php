@extends('layouts.admin')

{{-- Web site Title --}}
@section('title')
    {{ __('admin/badge/title.badge_show') }} :: @parent
@endsection

{{-- Content Header --}}
@section('header')
        {{ __('admin/badge/title.badge_show') }}
        <small>{{ $badge->name }}</small>
@endsection

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    <li>
        <a href="{{ route('admin.home') }}">
            <i class="fa fa-dashboard"></i> {{ __('admin/site.dashboard') }}
        </a>
    </li>
    <li>
        <a href="{{ route('admin.badges.index') }}">
            {{ __('admin/site.badges') }}
        </a>
    </li>
    <li class="active">
        {{ __('admin/badge/title.badge_show') }}
    </li>
    @endsection

    {{-- Content --}}
    @section('content')

            <!-- Notifications -->
    @include('partials.notifications')
            <!-- ./ notifications -->

    @include('admin/badge/_details', ['action' => 'show'])

@endsection
