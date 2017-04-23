@extends('layouts.admin.master')

@section('title')

    <title>{{ trans('messages.edit_user') }}</title>

@endsection

@section('content')
    <ol class='breadcrumb'>
        <li><a href='{{ action('Admin\HomeController@index') }}'>{{ trans('messages.home') }}</a></li>
        <li><a href='{{ action('Admin\UserController@index')}}'>{{ trans('messages.users') }}</a></li>
        <li class='active'>{{ trans('messages.edit') }}</li>
    </ol>
    <h1>{{ trans('messages.edit_user') }}</h1>
    <hr/>
    {!! Form::open([
        'method' => 'PUT',
        'action' => ['Admin\UserController@update', 'id' => $user->id],
        'files' => true,
    ]) !!}
    <div class="{{ Form::showErrClass('name') }}">
        {!! Form::label('user_name', trans('messages.name'), ['class' => 'control-label']) !!}
        {!! Form::text('name', $user->name,['class' => 'form-control']) !!}
        {!! Form::showErrField('name')!!}
    </div>

    <div class="{{ Form::showErrClass('email') }}">
        {!! Form::label('email', trans('messages.email'), ['class' => 'control-label']) !!}
        {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
        {!! Form::showErrField('email') !!}
    </div>

    <div class="{{ Form::showErrClass('birthday') }}">
        {!! Form::label('birthday', trans('messages.birthday'), ['class' => 'control-label']) !!}
        {!! Form::date('birthday', $user->birthday, ['class' => 'form-control']) !!}
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

    <img src="/uploads/avatars/{{ $user->avatar }}" alt="" class="img-rounded" width="150" height="150">
    <br><br>
    <div class="{{ Form::showErrClass('avatar') }}">
        {!! Form::file('avatar') !!}
        {!! Form::showErrField('avatar') !!}
    </div>
    <br>
    <div class="form-group">
        {!! Form::submit(trans('messages.edit'), ['class' => 'btn btn-primary btn-lg'])!!}
    </div>
    {!! Form::close() !!}

@endsection
