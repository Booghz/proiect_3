<?php
 ini_set('mongo.long_as_object', 1);
?>
@extends('layout')

@section('content')

<h1>New patient </h1>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'patients')) }}

    
    <div class="form-group">
        {{ Form::label('name', 'Nume') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('cnp', 'CNP') }}
        {{ Form::text('cnp', Input::old('cnp'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', Input::old('address'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('insurance', 'Insurance') }}
        {{ Form::text('insurance', Input::old('insurance'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Add patient !', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop