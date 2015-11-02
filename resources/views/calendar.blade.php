@extends('master')

@section('title', 'Planning')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Planning</li>
        <li class="active">Planning</li>
    </ol>
@stop

@section('content')

    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}

@stop