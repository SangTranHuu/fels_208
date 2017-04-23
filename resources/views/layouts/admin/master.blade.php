<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('title')
    {!! Html::style('css/app.css') !!}
    {!! Html::style('css/home.css') !!}
    {!! Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css') !!}
    @yield('css')
</head>
<body role="document">

<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ action('Admin\HomeController@index') }}">{{ trans('messages.app_name') }}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse pull-right">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ action('Admin\HomeController@index') }}">{{ trans('messages.home') }}</a></li>

                <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{trans('messages.content')}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ action('Admin\UserController@index') }}"><i class="fa fa-user" aria-hidden="true"></i> {{ trans('messages.manager_users') }}</a></li>
                        <li><a href="{{ action('Admin\CourseController@index') }}"><i class="fa fa-book" aria-hidden="true"></i> {{ trans('messages.manager_courses') }}</a></li>
                    </ul>
                </li>
                @if (Auth::check())
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ action('Auth\LoginController@logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{trans('messages.logout')}}</a>
                                {!! Form::open([
                                    'action' => 'Auth\LoginController@logout',
                                    'method' => 'POST',
                                    'id' => 'logout-form',
                                    'style' => 'display:none',
                                ]) !!}
                                {!! Form::close() !!}
                            </li>

                            <li>
                                <a href=""><i class="fa fa-user-o" aria-hidden="true"></i>{{ trans('messages.profile') }}</a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ action('Auth\LoginController@showLoginForm') }}">{{ trans('messages.login') }}</a></li>
                    <li><a href="{{ action('Auth\LoginController@logout') }}">{{ trans('messages.logout') }}</a></li>

                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container theme-showcase" role="main">
    @yield('content')
    <hr>
    <div class="well">
        <p>&copy;{{ config('app.name') }}</p>
    </div>

</div> <!-- /container -->
{!! Html::script('/js/app.js') !!}
@yield('scripts')
</body>
</html>
