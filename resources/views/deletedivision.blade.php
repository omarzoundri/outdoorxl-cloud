@extends('master')

@section('title', 'Afdeling Verwijderen')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Beheer</li>
        <li class="active">Afdeling Verwijderen</li>
    </ol>
@stop

@section('content')
<center>
  <h4>Weet je zeker dat je de afdeling "{{ $division->division }}" wilt verwijderen?</h4>
  <form method="POST" action="">
    <button type="submit" class="btn btn-danger">Verwijder</button>
  </form>
</center>
@stop