@extends('master')

@section('title', 'Nieuws Wijzigen')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Beheer</li>
        <li class="active">Nieuws Wijzigen</li>
    </ol>
@stop

@section('content')
	<!-- Horizontal Form -->
	<div class="box box-info">
	<div class="box-header with-border">
	  <h3 class="box-title">Nieuws Wijzigen - {!! $news->title !!}</h3>
	</div><!-- /.box-header -->
	<!-- form start -->

	<form method="POST" action="" class="form-horizontal">
	  <div class="box-body">

	  		@if ($errors->any())
			<div class="alert alert-danger">
				@foreach ($errors->all() as $error)
					<p>{{ $error }}</p>
				@endforeach
			@endif
			</div>

      <div class="box-body">
          {{ $news->body}}
      </div>

	    <div class="box-footer">
	    	<button type="submit" class="btn btn-info pull-left">Wijzigen</button>
	    	<a class="btn btn-danger pull-right" href="/nieuws/{{ $news->id }}/delete">Verwijderen</a>
	  	</div><!-- /.box-footer -->
	  </div><!-- /.box-body -->
	</form>


	</div><!-- /.box -->
@stop
