@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('messages.admin_home_page') }}</div>

                    <div class="panel-body">
                        {{ trans('messages.welcome_admin') }} {{ \Illuminate\Support\Facades\Auth::user()->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
