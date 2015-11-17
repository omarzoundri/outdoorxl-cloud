@extends('master')

@section('title', 'Nieuws Verwijderen')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Beheer</li>
        <li class="active">Nieuws verwijderen</li>
    </ol>
@stop

@section('content')
<center>
  <h4>Weet je zeker dat je "{{$news->title}}" wilt verwijderen?</h4>
  <form method="POST" action="">
    <button type="submit" class="btn btn-danger">Verwijderen</button>
  </form>
</center>
@stop
