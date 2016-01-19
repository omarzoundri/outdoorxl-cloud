@extends('master')

@section('title', 'Nieuws Wijzigen')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Beheer</li>
        <li class="active">Nieuws Wijzigen</li>
    </ol>
@stop

@section('content')
	<!-- Horizontal Form -->
	<div class="box box-info">
	<div class="box-header with-border">
	  <h3 class="box-title"> - {!! $news->title !!}</h3>
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
          <p>{{ $news->body}}</p>
      </div>

      <hr>
@if (Auth::user()->rank_id == 2)
    	<form method="POST" action="" class="form-horizontal">

        <div class="form-group">
          <label for="division" class="col-sm-2 control-label">Nieuws</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="title" value="{{ $news->title }}" placeholder="Titel">
            </div>
        </div>

        <div class="form-group">
          <label for="division" class="col-sm-2 control-label">Text</label>
            <div class="col-sm-10 custom">
              <textarea class="form-control" name="body" value="{{ $news->body }}" placeholder="Description"></textarea>
            </div>
        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-info pull-left">Wijzigen</button>
  	    	<a class="btn btn-danger" href="/nieuws/{{ $news->id }}/delete">Verwijderen</a>
        </div>

      </form>
@endif
	  </div><!-- /.box-body -->
	</form>


	</div><!-- /.box -->
@stop
