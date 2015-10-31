@extends('master')

@section('title', 'Medewerker Wijzigen')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Beheer</li>
        <li class="active">Medewerker Wijzigen</li>
    </ol>
@stop

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
	          <select class="form-control" name="rank_id">
	          	<option value="{{ $user->rank_id }}" default>Huidige: @if($user->rank_id === 0) Medewerker @endif @if($user->rank_id === 1) Stagiare @endif @if($user->rank_id === 2) Beheerder @endif</option>
	            <option value="0">Medewerker</option>
	            <option value="1">Stagiare</option>
	            <option value="2">Beheerder</option>
	          </select>
	      </div>
	    </div>
	   	<div class="form-group">
	      <label for="division" class="col-sm-2 control-label">Afdeling</label>
	      	<div class="col-sm-10">
	          <select class="form-control" name="division_id">
	          	<option value="{{ $user->division_id }}" default>Huidige: @if($user->division_id === 0) Kassa @endif @if($user->division_id === 1) Schoenen @endif @if($user->division_id === 2) Tenten @endif @if($user->division_id === 3) Wintersport @endif</option>
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
	          <select class="form-control" name="experience_id">
	          	<option value="{{ $user->experience_id }}" default>Huidige: @if($user->experience_id === 0) Junior @endif @if($user->experience_id === 1) Ervaren @endif @if($user->experience_id === 2) Heel Ervaren @endif</option>
				<option value="0">Junior</option>
				<option value="1">Ervaren</option>
				<option value="2">Heel Ervaren</option>
	          </select>
	      </div>
	    </div>
	    <div class="box-footer">
	    	<button type="submit" class="btn btn-info pull-left">Wijzigen</button>
	    	<a class="btn btn-danger pull-right" href="/medewerker/{{ $user->id }}/delete">Verwijderen</a>
	  	</div><!-- /.box-footer -->
	  </div><!-- /.box-body -->
	</form>
	</div><!-- /.box -->
@stop
