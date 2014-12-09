@extends('layout')

@section('content')
<?php
 ini_set('mongo.long_as_object', 1);
?>
<h1><small>Medicine</small></h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Medicine</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
    @foreach($medicine as $key => $value)

        <tr>
            <td>{{ $value['name']}}</td>

            <td>
                {{ Form::open(array('url' => 'medicine/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this Medicine', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <a class="btn btn-small btn-info" href="{{ URL::to('medicine/' . $value->id . '/edit') }}">Edit this Medicine</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop