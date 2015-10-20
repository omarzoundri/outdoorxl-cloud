@extends('master')

@section('title', 'Medewerker Toevoegen - ')

@section('page-description', 'Hier kun je medewerkers toevoegen.')

@section('content')
	<!-- add page specific css -->
    <link href="{{ asset("/docs/dist/css/custom.css")}}" rel="stylesheet" type="text/css" />
	<!-- add page specific css -->

	<!-- Horizontal Form -->
	<div class="box box-info">
	<div class="box-header with-border">
	  <h3 class="box-title">Medewerker Toevoegen</h3>
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
	   	<div class="form-group">
	      <label for="rank" class="col-sm-2 control-label">Soort Medewerker</label>
	      	<div class="col-sm-10">
	          <select class="form-control" id="rank">
	            <option id="1">Medewerker</option>
	            <option id="2">Stagiare</option>
	            <option id="3">Beheerder</option>
	          </select>
	      </div>
	    </div>
	   	<div class="form-group">
	      <label for="division" class="col-sm-2 control-label">Afdeling</label>
	      	<div class="col-sm-10">
	          <select class="form-control" id="division">
				<option id="1">Kassa</option>
				<option id="2">Schoenen</option>
				<option id="3">Tenten</option>
				<option id="4">Wintersport</option>
	          </select>
	      </div>
	    </div>
	   	<div class="form-group">
	      <label for="experience" class="col-sm-2 control-label">Afdeling</label>
	      	<div class="col-sm-10">
	          <select class="form-control" id="experience">
				<option id="1">Junior</option>
				<option id="2">Ervaren</option>
				<option id="3">Heel Ervaren</option>
	          </select>
	      </div>
	    </div>
	  </div><!-- /.box-body -->
	  <div class="box-footer">
	    <button type="submit" class="btn btn-info pull-left">Toevoegen</button>
	  </div><!-- /.box-footer -->
	</form>
	</div><!-- /.box -->
@stop
