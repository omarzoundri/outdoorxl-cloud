@extends('master')

@section('title', 'Medewerker Wijzigen')

@section('content')
	<!-- Horizontal Form -->
	<div class="box box-info">
	<div class="box-header with-border">
	  <h3 class="box-title">Medewerker Wijzigen - {!! $user->name !!}</h3>
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
	        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="email" class="col-sm-2 control-label">Email</label>
	      <div class="col-sm-10">
	        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
	      </div>
	    </div>
	   	<div class="form-group">
	      <label for="rank" class="col-sm-2 control-label">Soort Medewerker</label>
	      	<div class="col-sm-10">
	          <select class="form-control" name="rankid">
	          	<option value="{{ $user->rankid }}" default>Huidige: @if($user->rankid === 0) Medewerker @endif @if($user->rankid === 1) Stagiare @endif @if($user->rankid === 2) Beheerder @endif</option>
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
	          	<option value="{{ $user->divisionid }}" default>Huidige: @if($user->divisionid === 0) Kassa @endif @if($user->divisionid === 1) Schoenen @endif @if($user->divisionid === 2) Tenten @endif @if($user->divisionid === 3) Wintersport @endif</option>
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
	          	<option value="{{ $user->experienceid }}" default>Huidige: @if($user->experienceid === 0) Junior @endif @if($user->experienceid === 1) Ervaren @endif @if($user->experienceid === 2) Heel Ervaren @endif</option>
				<option value="0">Junior</option>
				<option value="1">Ervaren</option>
				<option value="2">Heel Ervaren</option>
	          </select>
	      </div>
	    </div>
	    <div class="box-footer">
	    	<button type="submit" class="btn btn-info pull-left">Wijzigen</button>
	  	</div><!-- /.box-footer -->
	  </div><!-- /.box-body -->
	</form>
	</div><!-- /.box -->
@stop
