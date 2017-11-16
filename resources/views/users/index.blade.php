@extends('layouts.admin')

@section ('breadcrumbs')
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">@lang('Users')</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="float-md-left"><h2>@lang('Users')</h2></div>
    <div class="float-md-right"><a class="btn btn-primary" href="{{route('users.create')}}">@lang('Create User')</a></div>
    <br><br>
    @if (count($users) > 0)
        <table class="table table-striped table-inverse">
            <thead>
            <tr>
                <th>@lang('#')</th>
                <th>@lang('Name')</th>
                <th>@lang('Email')</th>
                <th>@lang('Created at')</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user['id']}}</th>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>{{$user['created_at']}}</td>
                    <td>
                        <div class="pull-right">
                            <form method="post" action="/users/{{ $user['id'] }}">
                                {{ method_field('DELETE') }}
                                <div class="form-group">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input name="id" type="hidden" value="{{$user['id']}}" class="form-control">
                                    <div class="form-group">
                                        <a title="@lang('Edit user')" href="{{route('users.edit', $user['id'])}}"
                                           class="btn btn-primary btn-sm" role="button">
                                            <span class="icon is-small"><i class="fa fa-edit"></i></span>
                                        </a>
                                        <button onclick="return confirm('@lang('Are you sure?')')"
                                                title="@lang('Delete user')" role="botton"
                                                type="submit"
                                                @if (Auth()->user()->id == $user['id'])
                                                disabled
                                                @endif
                                                class="btn btn-primary btn-sm">
                                            <span class="icon is-small"><i class="fa fa-times"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>@lang('No users found')</p>
    @endif
    {{ $users->links() }}
@endsection
