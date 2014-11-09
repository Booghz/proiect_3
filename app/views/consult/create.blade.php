@extends('layout')

@section('content')
<h1>Consult creation </h1>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'consults')) }}

    <div class="form-group">
        {{ Form::label('patientName', 'Patient Name') }}
        {{ Form::select('patientName', $patients, Input::old('patientName'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('date', 'Date') }}
        {{ Form::text('date', Input::old('date'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('diagnostic', 'Diagnostic') }}
        {{ Form::textarea('diagnostic', Input::old('diagnostic'), array('class' => 'form-control')) }}
    </div>


    <div class="form-group">
        {{ Form::label('medicine', 'Medicine') }}
        {{ Form::select('medicines', $medicines , Input::old('medicine'), array('class' => 'form-control')) }}
    </div>
    
    <div class="form-group">
        {{ Form::label('dosage', 'Medicine Dosage') }}
        {{ Form::text('dosage', Input::old('dosage'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Add Consult!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop