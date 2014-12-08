<?php
 ini_set('mongo.long_as_object', 1);
?>
@extends('layout')

@section('content')

<h1>Patient</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Patient</td>
            <td>CNP</td>
            <td>Address</td>
            <td>Insurance</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
    @foreach($patients as $key => $value)

        <tr>
            <td>{{ $value['name']}}</td>
            <td>{{ $value['CNP']}}</td>
            <td>{{ $value['address']}}</td>
            <td>{{ $value['insurance']}}</td>

            <td>
                {{ Form::open(array('url' => 'patients/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this Patient', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <a class="btn btn-small btn-info" href="{{ URL::to('patients/' . $value->id . '/edit') }}">Edit this Patient</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop