@extends('master')

@section('title', 'Medewerker Verwijderen')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Beheer</li>
        <li class="active">Medewerker Verwijderen</li>
    </ol>
@stop

@section('content')
<center>
  <h4>Weet je zeker dat je de medewerker "{{ $user->name }}" wilt verwijderen?</h4>
  <form method="POST" action="">
    <button type="submit" class="btn btn-danger">Verwijder</button>
  </form>
</center>
@stop