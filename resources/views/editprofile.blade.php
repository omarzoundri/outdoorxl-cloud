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
          <input type="email" class="form-control" name="email" placeholder="{{ $user->email }}">
        </div>
    </div>
    <hr>
    <div class="form-group">
      <label for="division" class="col-sm-2 control-label">Huidige Wachtwoord</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="oldpassword" placeholder="Huidige Wachtwoord">
        </div>
    </div>
    <div class="form-group">
      <label for="division" class="col-sm-2 control-label">Nieuwe wachtwoord</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="newpassword"  placeholder="Nieuwe wachtwoord">
        </div>
    </div>
    <div class="form-group">
      <label for="division" class="col-sm-2 control-label">Wachtwoord bevestigen</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="confirmpassword" onsubmit="return myFunction()"  placeholder="Nieuwe wachtwoord bevestigen">
        </div>
    </div>

    <script>
      function myFunction() {
          var pass1 = document.getElementById("pass1").value;
          var pass2 = document.getElementById("pass2").value;
          var ok = true;
          if (pass1 != pass2) {
              //alert("Passwords Do not match");
              document.getElementById("pass1").style.borderColor = "#E34234";
              document.getElementById("pass2").style.borderColor = "#E34234";
              ok = false;
          }
          else {
              alert("Passwords Match");
          }
          return ok;
      }
    </script>
    <div class="box-footer">
      <button type="submit" class="btn btn-info pull-left">Update profile</button>
    </div>
  </div><!-- /.box-body -->
</form>

@stop
