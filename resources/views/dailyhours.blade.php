@extends('master')

@section('title', 'Dagelijkse Uren')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Beheer</li>
        <li class="active">Dagelijkse Uren</li>
    </ol>
@stop

@section('content')
	<!-- Horizontal Form -->
	<div class="box box-info">
	<div class="box-header with-border">
	  <h3 class="box-title">Dagelijkse Uren Invullen</h3>
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
		      <label for="rank" class="col-sm-2 control-label">Aanvang</label>
		      	<div class="col-sm-10">
		          <select class="form-control" name="">	

		          	@for($u=9; $u <= 20; $u++)
						 @if($u == 9)
						  <option disabled selected>Selecteer Aanvang</option>
						 @endif
						 @for($m=0; $m < 4; $m++)
						 	@if($m == 0){{--*/ $minutes = 00; /*--}} @endif
						 	@if($m == 1){{--*/ $minutes = 15; /*--}} @endif
						 	@if($m == 2){{--*/ $minutes = 30; /*--}} @endif
						 	@if($m == 3){{--*/ $minutes = 45; /*--}} @endif
						 	<option value="{{ $u }}">{{ $u }}:{{ $minutes }}@if($m == 0)0 @endif</option>
						 @endfor
					@endfor

		          </select>
		      </div>
		    </div>

		    <div class="form-group">
		      <label for="rank" class="col-sm-2 control-label">Totale Pauze's</label>
		      	<div class="col-sm-10">
		          <select class="form-control" name="pauze">
		            <option value="15">15 Minuten</option>
		            <option value="30">30 Minuten</option>
		            <option value="45">45 Minuten</option>
		            <option value="60">60 Minuten</option>
		          </select>
		      </div>
		    </div>

		   	<div class="form-group">
		      <label for="rank" class="col-sm-2 control-label">Eindtijd</label>
		      	<div class="col-sm-10">
		          <select class="form-control" name="">

		            	@for($u=9; $u <= 21; $u++)
						 @if($u == 9)
						  <option disabled selected>Selecteer Eindtijd </option>
						 @endif
						 @for($m=0; $m < 4; $m++)
						 	@if($m == 0){{--*/ $minutes = 00; /*--}} @endif
						 	@if($m == 1){{--*/ $minutes = 15; /*--}} @endif
						 	@if($m == 2){{--*/ $minutes = 30; /*--}} @endif
						 	@if($m == 3){{--*/ $minutes = 45; /*--}} @endif
						 	<option value="{{ $u }}:{{ $minutes }}">{{ $u }}:{{ $minutes }}@if($m == 0)0 @endif</option>
						 @endfor
					@endfor
					<option value="22:0">22:00</option>
		          </select>
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
