<?php
 ini_set('mongo.long_as_object', 1);
?>
@extends('layout')

@section('content')
<h1>Edit medicine {{ $medicine['name'] }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($medicine, array('route' => array('medicine.update', $medicine->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Medicine') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>


    {{ Form::submit('Edit medicine !', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop