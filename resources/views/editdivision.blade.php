@extends('master')

@section('title', 'Afdeling Wijzigen')

@section('page-description', 'Hier kun je afdelingen wijzigen.')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Beheer</li>
        <li class="active">Afdeling Wijzigen</li>
    </ol>
@stop

@section('content')
	<!-- Horizontal Form -->
	<div class="box box-info">
	<div class="box-header with-border">
	  <h3 class="box-title">Afdeling Wijzigen - {{ $division->division }}</h3>
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

	   	<div class="form-group">
	      <label for="division" class="col-sm-2 control-label">Afdeling</label>
	      	<div class="col-sm-10">
	        	<input type="text" class="form-control" name="division" value="{{ $division->division }}">
	      	</div>
	    </div>

	    <div class="box-footer">
	    	<button type="submit" class="btn btn-info pull-left">Wijzigen</button>
	    	<a class="btn btn-danger pull-right" href="/afdeling/{{ $division->division_id }}/delete">Verwijderen</a>
	  	</div><!-- /.box-footer -->
	  </div><!-- /.box-body -->
	</form>
	</div><!-- /.box -->
@stop
