@extends('master')

@section('title', 'Medewerker Toevoegen - ')

@section('page-description', 'Hier kun je medewerkers toevoegen.')

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
	      <label for="firstname" class="col-sm-2 control-label">Naam</label>
	      <div class="col-sm-10">
	        <input type="text" class="form-control" name="name" placeholder="Naam">
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="email" class="col-sm-2 control-label">Email</label>
	      <div class="col-sm-10">
	        <input type="email" class="form-control" name="email" placeholder="Email">
	      </div>
	    </div>
	   	<div class="form-group">
	      <label for="rank" class="col-sm-2 control-label">Soort Medewerker</label>
	      	<div class="col-sm-10">
	          <select class="form-control" name="rankid">
	            <option value="0">Medewerker</option>
	            <option value="1">Stagiare</option>
	            <option value="2">Beheerder</option>
	          </select>
	      </div>
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
	   	<div class="form-group">
	      <label for="experience" class="col-sm-2 control-label">Ervaring</label>
	      	<div class="col-sm-10">
	          <select class="form-control" name="experienceid">
				<option value="0">Junior</option>
				<option value="1">Ervaren</option>
				<option value="2">Heel Ervaren</option>
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
