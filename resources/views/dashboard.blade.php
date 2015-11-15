@extends('master')

@section('title', 'Home')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Dashboard</li>
        <li class="active">Nieuws</li>
    </ol>
@stop

@section('content')

@foreach($news as $new)
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"><strong>{{ $new->title}}</strong></h3>
    <span>{{ $new->created_at}}</span>
  </div><!-- /.box-header -->
  <div class="box-body">
      {{ $new->body}}
  </div><!-- /.box-body -->
</div><!-- /.box -->
@endforeach

@stop
