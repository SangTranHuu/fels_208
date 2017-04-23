@extends('layouts.admin.master')

@section('title')
    <title>{{ trans('messages.create_user') }}</title>
@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='{{ action('Admin\HomeController@index' )}}'>{{ trans('messages.home') }}</a></li>
        <li><a href='{{ action('Admin\UserController@index') }}'>{{ trans('messages.users') }}</a></li>
        <li class='active'>{{ trans('messages.create_user') }}</li>
    </ol>

    <h2>{{ trans('messages.create_user') }}</h2>
    <hr/>

    {!! Form::open([
        'method' => 'POST',
        'action' => 'Admin\UserController@store',
        'files' => true,
    ]) !!}
    <div class="{{ Form::showErrClass('name') }}">
        {!! Form::label('user_name', trans('messages.name'), ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! Form::showErrField('name')!!}
    </div>

    <div class="{{ Form::showErrClass('email') }}">
        {!! Form::label('email', trans('messages.email'), ['class' => 'control-label']) !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
        {!! Form::showErrField('email') !!}
    </div>

    <div class="{{ Form::showErrClass('birthday') }}">
        {!! Form::label('birthday', trans('messages.birthday'), ['class' => 'control-label']) !!}
        {!! Form::date('birthday', null, ['class' => 'form-control']) !!}
        {!! Form::showErrField('birthday') !!}
    </div>

    <div class="{{ Form::showErrClass('password') }}">
        {!! Form::label('password', trans('messages.new_password'), ['class' => 'control-label']) !!}
        {!! Form::password('password', ['class' => 'form-control'])!!}
        {!! Form::showErrField('password') !!}
    </div>
    <div class="form-group">
        {!! Form::label('confirm_password', trans('messages.confirm_password'), ['class' => 'control-label']) !!}
        {!! Form::password('password_confirmation',['class' => 'form-control']) !!}
    </div>
    <div class="{{ Form::showErrClass('avatar') }}">
        {!! Form::label('ava', trans('messages.avatar')) !!}
        {!! Form::file('avatar') !!}
        {!! Form::showErrField('avatar') !!}
    </div>
    <br>
    <div class="form-group">
        {!! Form::submit(trans('messages.create'), ['class' => 'btn btn-success btn-lg'])!!}
    </div>
    {!! Form::close() !!}

@endsection
