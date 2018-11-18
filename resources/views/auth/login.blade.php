@extends('layouts.login')

{{-- Web site Title --}}
@section('title'){{ trans('auth.login') }}@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/AdminLTE/plugins/iCheck/square/blue.css') }}">
@endsection

{{-- Content --}}
@section('content')
    <!-- start: LOGIN BOX -->
    <p class="login-box-msg">{{ trans('auth.sign_title') }}</p>

    {!! Form::open(['route' => 'login']) !!}
    <div class="form-group has-feedback">
        {!! Form::text('email', null, array(
                    'class' => 'form-control',
                    'placeholder' => trans('auth.email'),
                    'required' => 'required',
                    'autofocus' => 'autofocus'
                    )) !!}
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        {!! Form::password('password', array(
                    'class' => 'form-control password',
                    'placeholder' => trans('auth.password'),
                    'required' => 'required'
                    )) !!}
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox icheck">
                <label>
                    {!! Form::checkbox('remember', '1', false) !!}
                    {{ trans('auth.remember_me') }}
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">
                {{ trans('auth.login') }}
            </button>
        </div>
        <!-- /.col -->
    </div>
    {!! Form::close() !!}
    <a href="{{ url('auth/forgot_password') }}">
        {{ trans('auth.forgot_password') }}
    </a><br>
    <a href="{{ url('auth/register') }}" class="text-center">
        {{ trans('auth.create_account') }}
    </a>
    <!-- end: LOGIN BOX -->
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/AdminLTE/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
        });
    </script>
@endsection
