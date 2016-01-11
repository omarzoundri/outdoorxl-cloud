@extends('master')

@section('title', 'Ingevoerde Data Wijzigen')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Beheer</li>
        <li class="active">Ingevoerde Data Wijzigen</li>
    </ol>
@stop

@section('content')
	<!-- Horizontal Form -->
	<div class="box box-info">
  	<div class="box-header with-border">
      <h3 class="box-title">Ingevoerde Data Wijzigen</h3>
    </div><!-- /.box-header -->
    	<form method="POST" action="" class="form-horizontal">
        @foreach($planning as $plan)
        <div class="form-group">
          <label for="start" class="col-sm-2 control-label">Start</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="start" value="{{ $plan->from }}" placeholder="{{ $plan->from }}">
            </div>
        </div>

        <div class="form-group">
          <label for="end" class="col-sm-2 control-label">Eind</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="end" value="{{ $plan->untill }}" placeholder="{{ $plan->untill }}">
            </div>
        </div>
        <div class="form-group">
          <label for="break" class="col-sm-2 control-label">Totale Pauze's</label>
            <div class="col-sm-10">
              <select class="form-control" name="break">
                <option value="{{ $plan->break }}" selected>Huidige: {{ $plan->break }} Minuten</option>
                <option value="15">15 Minuten</option>
                <option value="30">30 Minuten</option>
                <option value="45">45 Minuten</option>
                <option value="60">60 Minuten</option>
                <option value="75">75 Minuten</option>
              </select>
          </div>
        </div>
        @endforeach


        <div class="box-footer">
          <button type="submit" class="btn btn-info pull-left">Wijzigen</button>
        </div>

      </form>

	  </div><!-- /.box-body -->
	</form>


	</div><!-- /.box -->
@stop
