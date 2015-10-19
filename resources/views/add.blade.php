@extends('master')

@section('title', 'Medewerker Toevoegen - ')

@section('page-title', 'Medewerker toevoegen')

@section('page-description', 'Hier kun je medewerkers toevoegen.')

@section('content')
	<!-- Horizontal Form -->
	<div class="box box-info">
	<div class="box-header with-border">
	  <h3 class="box-title">Medewerker Toevoegen Form</h3>
	</div><!-- /.box-header -->
	<!-- form start -->
	<form class="form-horizontal">
	  <div class="box-body">
	  	<div class="form-group">
	      <label for="firstname" class="col-sm-2 control-label">Voornaam</label>
	      <div class="col-sm-10">
	        <input type="text" class="form-control" id="firstname" placeholder="Voornaam">
	      </div>
	    </div>
	   	<div class="form-group">
	      <label for="lastname" class="col-sm-2 control-label">Voornaam</label>
	      <div class="col-sm-10">
	        <input type="text" class="form-control" id="lastname" placeholder="Achternaam">
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="email" class="col-sm-2 control-label">Email</label>
	      <div class="col-sm-10">
	        <input type="email" class="form-control" id="email" placeholder="Email">
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="password" class="col-sm-2 control-label">Wachtwoord</label>
	      <div class="col-sm-10">
	        <input type="password" class="form-control" id="password" placeholder="Wachtwoord">
	      </div>
	    </div>
	  </div><!-- /.box-body -->
	  <div class="box-footer">
	    <button type="submit" class="btn btn-default">Cancel</button>
	    <button type="submit" class="btn btn-info pull-right">Sign in</button>
	  </div><!-- /.box-footer -->
	</form>
	</div><!-- /.box -->
@stop