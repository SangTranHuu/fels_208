@extends('layouts.admin.master')

@section('title')
    <title>{{ trans('messages.error') }}</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template">
                    <h1>{{ trans('messages.opps')}}</h1>
                    <h2>{{ trans('messages.not_found') }}</h2>
                    <div class="error-details">

                    </div>
                    <br>
                    <div class="error-actions">
                        <a href="{{ action('Admin\HomeController@index')}}  " class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                            {{ trans('messages.take_me_home') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
