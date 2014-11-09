@extends('layout')

@section('content')
<?php
 ini_set('mongo.long_as_object', 1);
?>
<h1>Consults</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Name</td>
            <td>Date</td>
            <td>Patient</td>
            <td>Medicine</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($consults as $key => $value)

        <tr>
            <td>{{ $value['user']['username'] }}</td>
            <td>{{ $value['date'] }}</td>
            <td>{{ $value['patient']['name'] }}</td>
            <td>{{ $value['medicine']['name'] }}</td>

            <td>
                {{ Form::open(array('url' => 'consults/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this Consult', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <a class="btn btn-small btn-success" href="{{ URL::to('consults/' . $value->id) }}">Show this Consult</a>


                <a class="btn btn-small btn-info" href="{{ URL::to('consults/' . $value->id . '/edit') }}">Edit this Consult</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop