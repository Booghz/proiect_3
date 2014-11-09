<?php
 ini_set('mongo.long_as_object', 1);
?>
@extends('layout')

@section('content')
<div class="container">


<h1>Showing the consult on patient {{ $consult['patient']['name'] }}</h1>

    <div class="jumbotron text-center">
        <h2> Date {{ $consult['date'] }}</h2>
        <p>
            <strong>Doctor:</strong> {{ $consult['user']['username'] }}<br>
            <strong>Medicine:</strong> {{ $consult['medicine']['name'] }}
</div>
@stop