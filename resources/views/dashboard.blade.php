@extends('master')

@section('title', 'Home')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Dashboard</li>
        <li class="active">Nieuws</li>
    </ol>
@stop

@section('content')
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Nieuws</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <a href="news/">Nieuws bericht</a>
  </div><!-- /.box-body -->

</div><!-- /.box -->
@stop