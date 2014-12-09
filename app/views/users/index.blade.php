@extends('layout')

@section('content')
<?php
 ini_set('mongo.long_as_object', 1);
?>
<h1><small>Doctors</small></h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Name</td>
            <td>Specialization</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $key => $value)

        <tr>
            <td>{{ $value['username']}}</td>
            <td>{{ $value['specialty']}}</td>

            <td>
                {{ Form::open(array('url' => 'users/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this Doctor', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->id . '/edit') }}">Edit this Doctor</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop