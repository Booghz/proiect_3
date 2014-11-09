<?php
 ini_set('mongo.long_as_object', 1);
?>
@extends('layout')

@section('content')
<h1>Edit consult on patient {{ $consult['patient']['name'] }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($consult, array('route' => array('consults.update', $consult->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('patientName', 'Patient Name') }}
        {{ Form::select('patientName', $patients, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('date', 'Date') }}
        {{ Form::text('date', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('diagnostic', 'Diagnostic') }}
        {{ Form::textarea('diagnostic', null, array('class' => 'form-control')) }}
    </div>


    <div class="form-group">
        {{ Form::label('medicine', 'Medicine') }}
        {{ Form::select('medicines', $medicines , null, array('class' => 'form-control')) }}
    </div>
    
    <div class="form-group">
        {{ Form::label('dosage', 'Medicine Dosage') }}
        {{ Form::text('dosage', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the consult!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop