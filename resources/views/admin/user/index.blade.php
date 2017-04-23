@extends('layouts.admin.master')

@section('title')
    <title>{{ trans('messages.list_users') }}</title>
@endsection

@section('content')
    @if (session()->has('edit'))
        <div class="alert alert-success" role="alert">
            {{ session('edit') }}
        </div>
    @endif
    @if (session()->has('create'))
        <div class="alert alert-success" role="alert">
            {{ session('create') }}
        </div>
    @endif
    @if (session()->has('delete'))
        <div class="alert alert-danger" role="alert">
            {{ session('delete') }}
        </div>
    @endif

    @if ($users->count())
        <table class="table table-hover table-bordered">
            <caption>{{ trans('messages.list_users') }}</caption>
            <thead>
                <tr>
                    <th>{{  trans('messages.id') }}</th>
                    <th>{{ trans('messages.avatar') }}</th>
                    <th>{{ trans('messages.name') }}</th>
                    <th>{{ trans('messages.email') }}</th>
                    <th>{{ trans('messages.birthday') }}</th>
                    <th>{{ trans('messages.date_created') }}</th>
                    <td>{{ trans('messages.edit') }}</td>
                    <th>{{ trans('messages.delete') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><img src="/{{ config('custom.url.avatar'). $user->avatar }}" alt="" class="img-rounded" width="100" height="100"></td>
                        <td>
                            <a href="{{ action('Admin\UserController@show', ['id' => $user->id]) }}">{{ $user->name }}</a>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->birthday }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td><a href="{{ action('Admin\UserController@edit', ['id' => $user->id]) }}" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            {!! Form::open([
                                'method' => 'DELETE',
                                'action' => ['Admin\UserController@destroy', $user->id],
                            ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onClick' => 'return deleteUser();']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-danger" role="alert">
            {{ trans('messages.no_user') }}
        </div>
    @endif
    <div>
        <a class="btn btn=success" href="{{ action('Admin\UserController@create') }}">
            <button type="" class="btn btn-success">{{ trans('messages.new_user') }}</button>
        </a>
    </div>
    {{ $users->links() }}
@endsection
@section('scripts')
   {!! Html::script('/js/confirm_delete.js') !!}
@endsection
