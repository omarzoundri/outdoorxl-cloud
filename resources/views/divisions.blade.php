@extends('master')

@section('title', 'Afdelingen')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Beheer</li>
        <li class="active">Afdelingen</li>
    </ol>
@stop

@section('content')
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Afdelingen</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary">actief</span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  @foreach ($division as $div)
  <div class="box-body">
    <a href="afdeling/{{ $div['division_id'] }}/edit">{{ $div['division'] }}</a>
  </div><!-- /.box-body -->
  @endforeach

</div><!-- /.box -->
@stop