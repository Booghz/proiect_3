<?php
 ini_set('mongo.long_as_object', 1);
?>
@extends('layout')

@section('content')
<h1>Edit doctor {{ $user['username'] }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('username', 'Doctor') }}
        {{ Form::text('username', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('specialty', 'Speciality') }}
        {{ Form::text('specialty', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('password_confirmation', 'Confirm password') }}
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
    </div>


    {{ Form::submit('Edit doctor !', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop