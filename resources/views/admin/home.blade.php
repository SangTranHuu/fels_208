@extends('layouts.admin.master')

@section('title')
    <title>{{ config('app.name') }}</title>
@endsection

@section('content')
    <div class="jumbotron">
        <h1>{{ config('app.name') }}</h1>
    </div>

@endsection
