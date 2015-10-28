@extends('master')

@section('title', 'Medewerkers')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Beheer</li>
        <li class="active">Medewerkers</li>
    </ol>
@stop

@section('content')
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Medewerkers</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary">actief</span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  @foreach ($users as $user)
  <div class="box-body">
    <a href="employees/{{ $user['id'] }}/edit">{{ $user['name'] }}</a>
  </div><!-- /.box-body -->
  @endforeach

</div><!-- /.box -->
@stop