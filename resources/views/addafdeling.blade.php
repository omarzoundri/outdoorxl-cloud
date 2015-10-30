@extends('master')

@section('title', 'Medewerker Toevoegen')

@section('page-description', 'Hier kun je medewerkers toevoegen.')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Beheer</li>
        <li class="active">Medewerker Toevoegen</li>
    </ol>
@stop

@section('content')
	<!-- Horizontal Form -->
	<div class="box box-info">
	<div class="box-header with-border">
	  <h3 class="box-title">Medewerker Toevoegen</h3>
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
	          <select class="form-control" name="divisionid">
				<option value="0">Kassa</option>
				<option value="1">Schoenen</option>
				<option value="2">Tenten</option>
				<option value="3">Wintersport</option>
	          </select>
	      </div>
	    </div>

	    <div class="box-footer">
	    	<button type="submit" class="btn btn-info pull-left">Toevoegen</button>
	  	</div><!-- /.box-footer -->
	  </div><!-- /.box-body -->
	</form>
	</div><!-- /.box -->
@stop
