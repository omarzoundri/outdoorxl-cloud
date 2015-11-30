@extends('master')

@section('title', 'Medewerkers')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Beheer</li>
        <li class="active">Medewerkers</li>
    </ol>
@stop

@section('content')
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Medewerkers Inplannen</h3>
  </div><!-- /.box-header -->

  @foreach ($users as $user)
  <div class="box-body">
    <table class="pure-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Medewerker</th>
            <th>Afdeling</th>
            <th>Rank(?)</th>
            <th>Bevestigen</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>1</td>
            <td>{{ $user->name}}</td>
            <td>{{ $user->rank_id}}</td>
            <td>2009</td>
            <td><div class="tdbutton"><a href="#">Inplannen</a></div></td>
        </tr>

        <tr>
            <td>2</td>
            <td>Toyota</td>
            <td>Camry</td>
            <td>2012</td>
            <td><div class="tdbutton"><a href="#">Inplannen</a></div></td>
        </tr>

        <tr>
            <td>3</td>
            <td>Hyundai</td>
            <td>Elantra</td>
            <td>2010</td>
            <td><div class="tdbutton"><a href="#">Inplannen</a></div></td>
        </tr>

        <tr>
            <td>3</td>
            <td>Hyundai</td>
            <td>Elantra</td>
            <td>2010</td>
            <td><div class="tdbutton"><a href="#">Inplannen</a></div></td>
        </tr>
    </tbody>
</table>
  </div><!-- /.box-body -->
  @endforeach


</div><!-- /.box -->
@stop