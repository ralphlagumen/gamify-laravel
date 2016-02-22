<!DOCTYPE html>
<html>
<!-- start: HEAD -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Administration Dashboard') :: gamify v3</title>
    <!-- start: META -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta content="gamify v3: A Gamification Platform - Administration" name="description">
    <meta content="Paco Orozco" name="author">
    @yield('meta')
            <!-- end: META -->
    <!-- start: MAIN CSS -->
    {!! HTML::style('vendor/AdminLTE/bootstrap/css/bootstrap.min.css') !!}
    {!! HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') !!}
    {!! HTML::style('//code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css') !!}
    {!! HTML::style('vendor/AdminLTE/dist/css/AdminLTE.min.css') !!}
    {!! HTML::style('vendor/AdminLTE/dist/css/skins/skin-blue.min.css') !!}
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    {!! HTML::script('//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') !!}
    {!! HTML::script('//oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') !!}
    <![endif]-->
    <!-- end: MAIN CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    @yield('styles')
            <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
</head>
<!-- start: BODY -->
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('home') }}"><b>gamify</b> v3</a>
    </div>

    <!-- start: NOTIFICATIONS -->
    @include('partials.notifications')
    <!-- end: NOTIFICATIONS -->

    <div class="login-box-body">
        @yield('content')
    </div>
</div>

<!-- start: MAIN JAVASCRIPTS -->
{!! HTML::script('vendor/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js') !!}
{!! HTML::script('vendor/AdminLTE/bootstrap/js/bootstrap.min.js') !!}
{!! HTML::script('vendor/AdminLTE/dist/js/app.min.js') !!}
        <!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@yield('scripts')
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
</body>
<!-- end: BODY -->
</html>