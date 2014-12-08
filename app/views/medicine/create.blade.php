@extends('layout')

@section('content')
<h1>New medicine </h1>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'medicine')) }}

    
    <div class="form-group">
        {{ Form::label('name', 'Medicine') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Add medicine !', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop