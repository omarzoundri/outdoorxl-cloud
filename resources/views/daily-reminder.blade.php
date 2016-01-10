@extends('master')

@section('title', 'Dagelijkse Reminder Mail')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Beheer</li>
        <li class="active">Dagelijkse Reminder Mail</li>
    </ol>
@stop

@section('content')
<center>
  <h4>Weet je zeker dat je de dagelijkse reminder wilt versturen?</h4>
  <form method="POST" action="">
    <button type="submit" class="btn btn-success">Verstuur Reminder</button>
  </form>
</center>
@stop