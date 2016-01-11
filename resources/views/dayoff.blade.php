@extends('master')

@section('title', 'Verlof vragen')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Beheer</li>
        <li class="active">Verlof vragen</li>
    </ol>
@stop

@section('content')
	<!-- Horizontal Form -->
	<div class="box box-info">
	<div class="box-header with-border">
	  <h3 class="box-title">Verlof vragen of Ziek melden</h3>
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

			<div class="form-group">
		      <label for="type" class="col-sm-2 control-label">Soort</label>
		      	<div class="col-sm-10">
		          <select class="form-control" name="">	
					<option disabled selected>Selecteer Soort</option>
				 	<option value="1">Verlof</option>
				 	<option value="2">Ziek</option>
		          </select>
		      </div>
		    </div>

		    <div class="form-group">
		      <label for="start" class="col-sm-2 control-label">Van</label>
		      	<div class="col-sm-10">
		          <input type="date" class="form-control" name="start">
		      </div>
		    </div>

		   	<div class="form-group">
		      <label for="start" class="col-sm-2 control-label">Tot</label>
		      	<div class="col-sm-10">
					<input type="date" class="form-control" name="end">
		      	</div>
		    </div>
		   	
		</div>

		<div class="box-footer">
	    	<button type="submit" class="btn btn-info pull-left">Versturen</button>
	  	</div><!-- /.box-footer -->

	    </div>
	
	  </div><!-- /.box-body -->
	</form>


	</div><!-- /.box -->
@stop
