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
    <a href="/nieuws/{{ $new->id }}/edit" class="box-title"><strong>{{ $new->title}}</strong></a>

    <span>{{ $new->created_at}}</span>
  </div><!-- /.box-header -->
  <div class="box-body">
      <p>{{ $new->body }}</p>
  </div><!-- /.box-body -->
</div><!-- /.box -->
@endforeach

@stop
