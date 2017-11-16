@extends('layouts.admin')

@section ('breadcrumbs')
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('users.index')}}">@lang('Users')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('Edit')</li>
        </ol>
    </nav>
@endsection

@section('content')

    {{ Form::open(array('route' => ['users.update', $user['id']], 'method' => 'put')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', $user['name'], ['class'=>'form-control', 'id' => 'email', 'aria-describedby' => 'Name of this user', 'placeholder' => 'Name of this user']) }}
    </div>

    <div class="form-check">
        <label class="form-check-label">
            <input class="form-check-input" name="active" type="checkbox" @if ($user['active'] == true)checked="checked"@endif value="1">
            @lang('This user is active')
        </label>
    </div>


    <div class="form-group">
        {{ Form::label('email', 'Email address') }}
        {{ Form::email('email', $user['email'], ['class'=>'form-control', 'id' => 'email', 'aria-describedby' => 'Email of this user', 'placeholder' => 'Email for this user']) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', $user['description'],
        ['class'=>'form-control', 'rows' => 3,
        'id' => 'description',
        'aria-describedby' => 'Description for this user', 'placeholder' => 'Description for this user']) }}
    </div>


    <h4 id="auto-sizing">@lang('Change the user password')</h4>
    <p>Enter a new password twice to change the password for this user.</p>

    <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password',  ['class'=>'form-control', 'id' => 'password', 'aria-describedby' => 'Password for this user', 'placeholder' => 'Password for this user']) }}
    </div>

    <div class="form-group">
        {{ Form::label('password_confirmation', 'Confirm password') }}
        {{ Form::password('password_confirmation',  ['class'=>'form-control', 'id' => 'password_confirmation', 'aria-describedby' => 'Repeat password for this user', 'placeholder' => 'Repeat password for this user']) }}
    </div>


    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection
