@extends('master')

@section('title', 'Nieuws Wijzigen')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Beheer</li>
        <li class="active">Profiel Wijzigen</li>
    </ol>
@stop

@section('content')

<div class="box box-info">
<div class="box-header with-border">
  <h3 class="box-title">Profiel wijzigen</h3>
</div>

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
      <label for="division" class="col-sm-2 control-label">E-mail</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="division" placeholder="E-mail">
        </div>
    </div>
    <hr>
    <div class="form-group">
      <label for="division" class="col-sm-2 control-label">Huidige Wachtwoord</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="division" placeholder="Huidige Wachtwoord">
        </div>
    </div>
    <div class="form-group">
      <label for="division" class="col-sm-2 control-label">Nieuwe wachtwoord</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="division" placeholder="Nieuwe wachtwoord">
        </div>
    </div>
    <div class="form-group">
      <label for="division" class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="division" placeholder="Nieuwe wachtwoord bevestigen">
        </div>
    </div>

    <div class="box-footer">
      <button type="submit" class="btn btn-info pull-left">Update</button>
    </div><!-- /.box-footer -->
  </div><!-- /.box-body -->
</form>

@stop
