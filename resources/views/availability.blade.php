@extends('master')

@section('title', 'Planning - Beschikbaarheid')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Planning</li>
        <li class="active">Planning</li>
    </ol>
@stop

@section('content')
<div id="calendar">
	<form method="post">
	<table class="responstable">
	  
	  <tr>
	  		@for ($i=1; $i <= 7; $i++)
	    	<th>{{Date::parse('+2 weeks')->addDay($i)->format('l d F Y')}}</th>
	    	@endfor
	  </tr>
	  
	  <tr>
	    @for ($i=1; $i <= 7; $i++)
    	<td>
    		<input type="text" class="date" name="date[]" value="{{Date::parse('+2 weeks')->addDay($i)->format('d-m-Y')}}" readonly>
    		<label for="day">Hele dag:</label>
    		<input class="day" type="checkbox" name="day[]" value="1"><br>
    		<label for="notavailable">Niet beschikbaar:</label>
			<input class="notavailable" type="checkbox" name="notavailable[]" value="1"><br>
    		<label for="from">Van</label>
    		<select class="from" name="from[]">
	    		<option value="10">10:00</option>
	    		<option value="10,5">10:30</option>
	    		<option value="11">11:00</option>
	    		<option value="11,5">11:30</option>
	    		<option value="12">12:00</option>
	    		<option value="12,5">12:30</option>
	    		<option value="13">13:00</option>
	    		<option value="13,5">13:30</option>
	    		<option value="14">14:00</option>
	    		<option value="14,5">14:30</option>
	    		<option value="15">15:00</option>
	    		<option value="15,5">15:30</option>
	    		<option value="16">16:00</option>
	    		<option value="16,5">16:30</option>
	    		<option value="17">17:00</option>
	    		<option value="17,5">17:30</option>
	    		<option value="18">18:00</option>
	    		<option value="18,5">18:30</option>
	    		<option value="19">19:00</option>
	    		<option value="19,5">19:30</option>
	    		<option value="20">20:00</option>
	    		<option value="20,5">20:30</option>
	    		<option value="21">21:00</option>
	  		</select><br>
	  		<label for="untill">Tot</label>
    		<select class="untill" name="untill[]">
	    		<option value="10">10:00</option>
	    		<option value="10,5">10:30</option>
	    		<option value="11">11:00</option>
	    		<option value="11,5">11:30</option>
	    		<option value="12">12:00</option>
	    		<option value="12,5">12:30</option>
	    		<option value="13">13:00</option>
	    		<option value="13,5">13:30</option>
	    		<option value="14">14:00</option>
	    		<option value="14,5">14:30</option>
	    		<option value="15">15:00</option>
	    		<option value="15,5">15:30</option>
	    		<option value="16">16:00</option>
	    		<option value="16,5">16:30</option>
	    		<option value="17">17:00</option>
	    		<option value="17,5">17:30</option>
	    		<option value="18">18:00</option>
	    		<option value="18,5">18:30</option>
	    		<option value="19">19:00</option>
	    		<option value="19,5">19:30</option>
	    		<option value="20">20:00</option>
	    		<option value="20,5">20:30</option>
	    		<option value="21">21:00</option>
	  		</select>
    	</td>
    	@endfor
	  </tr>
	  <tr>
	  		@for ($i=1; $i <= 7; $i++)
	    	<th>{{Date::parse('+3 weeks')->addDay($i)->format('l d F Y')}}</th>
	    	@endfor
	  </tr>
	  
	  <tr>
	    @for ($i=1; $i <= 7; $i++)
    	<td>
    		<input type="text" class="date" name="date[]" value="{{Date::parse('+3 weeks')->addDay($i)->format('d-m-Y')}}" readonly>
    		<label for="day">Hele dag:</label>
    		<input class="day" type="checkbox" name="day[]" value="1"><br>
    		<label for="notavailable">Niet beschikbaar:</label>
			<input class="notavailable" type="checkbox" name="notavailable[]" value="1"><br>
    		<label for="from">Van</label>
    		<select class="from" name="from[]">
	    		<option value="10">10:00</option>
	    		<option value="10,5">10:30</option>
	    		<option value="11">11:00</option>
	    		<option value="11,5">11:30</option>
	    		<option value="12">12:00</option>
	    		<option value="12,5">12:30</option>
	    		<option value="13">13:00</option>
	    		<option value="13,5">13:30</option>
	    		<option value="14">14:00</option>
	    		<option value="14,5">14:30</option>
	    		<option value="15">15:00</option>
	    		<option value="15,5">15:30</option>
	    		<option value="16">16:00</option>
	    		<option value="16,5">16:30</option>
	    		<option value="17">17:00</option>
	    		<option value="17,5">17:30</option>
	    		<option value="18">18:00</option>
	    		<option value="18,5">18:30</option>
	    		<option value="19">19:00</option>
	    		<option value="19,5">19:30</option>
	    		<option value="20">20:00</option>
	    		<option value="20,5">20:30</option>
	    		<option value="21">21:00</option>
	  		</select><br>
	  		<label for="untill">Tot</label>
    		<select class="untill" name="untill[]">
	    		<option value="10">10:00</option>
	    		<option value="10,5">10:30</option>
	    		<option value="11">11:00</option>
	    		<option value="11,5">11:30</option>
	    		<option value="12">12:00</option>
	    		<option value="12,5">12:30</option>
	    		<option value="13">13:00</option>
	    		<option value="13,5">13:30</option>
	    		<option value="14">14:00</option>
	    		<option value="14,5">14:30</option>
	    		<option value="15">15:00</option>
	    		<option value="15,5">15:30</option>
	    		<option value="16">16:00</option>
	    		<option value="16,5">16:30</option>
	    		<option value="17">17:00</option>
	    		<option value="17,5">17:30</option>
	    		<option value="18">18:00</option>
	    		<option value="18,5">18:30</option>
	    		<option value="19">19:00</option>
	    		<option value="19,5">19:30</option>
	    		<option value="20">20:00</option>
	    		<option value="20,5">20:30</option>
	    		<option value="21">21:00</option>
	  		</select>
    	</td>
    	@endfor
	  </tr>
	  <tr>
	  		@for ($i=1; $i <= 7; $i++)
	    	<th>{{Date::parse('+4 weeks')->addDay($i)->format('l d F Y')}}</th>
	    	@endfor
	  </tr>
	  
	  <tr>
	    @for ($i=1; $i <= 7; $i++)
    	<td>
    		<input type="text" class="date" name="date[]" value="{{Date::parse('+4 weeks')->addDay($i)->format('d-m-Y')}}" readonly>
    		<label for="day">Hele dag:</label>
    		<input class="day" type="checkbox" name="day[]" value="1"><br>
    		<label for="notavailable">Niet beschikbaar:</label>
			<input class="notavailable" type="checkbox" name="notavailable[]" value="1"><br>
    		<label for="from">Van</label>
    		<select class="from" name="from[]">
	    		<option value="10">10:00</option>
	    		<option value="10,5">10:30</option>
	    		<option value="11">11:00</option>
	    		<option value="11,5">11:30</option>
	    		<option value="12">12:00</option>
	    		<option value="12,5">12:30</option>
	    		<option value="13">13:00</option>
	    		<option value="13,5">13:30</option>
	    		<option value="14">14:00</option>
	    		<option value="14,5">14:30</option>
	    		<option value="15">15:00</option>
	    		<option value="15,5">15:30</option>
	    		<option value="16">16:00</option>
	    		<option value="16,5">16:30</option>
	    		<option value="17">17:00</option>
	    		<option value="17,5">17:30</option>
	    		<option value="18">18:00</option>
	    		<option value="18,5">18:30</option>
	    		<option value="19">19:00</option>
	    		<option value="19,5">19:30</option>
	    		<option value="20">20:00</option>
	    		<option value="20,5">20:30</option>
	    		<option value="21">21:00</option>
	  		</select><br>
	  		<label for="untill">Tot</label>
    		<select class="untill" name="untill[]">
	    		<option value="10">10:00</option>
	    		<option value="10,5">10:30</option>
	    		<option value="11">11:00</option>
	    		<option value="11,5">11:30</option>
	    		<option value="12">12:00</option>
	    		<option value="12,5">12:30</option>
	    		<option value="13">13:00</option>
	    		<option value="13,5">13:30</option>
	    		<option value="14">14:00</option>
	    		<option value="14,5">14:30</option>
	    		<option value="15">15:00</option>
	    		<option value="15,5">15:30</option>
	    		<option value="16">16:00</option>
	    		<option value="16,5">16:30</option>
	    		<option value="17">17:00</option>
	    		<option value="17,5">17:30</option>
	    		<option value="18">18:00</option>
	    		<option value="18,5">18:30</option>
	    		<option value="19">19:00</option>
	    		<option value="19,5">19:30</option>
	    		<option value="20">20:00</option>
	    		<option value="20,5">20:30</option>
	    		<option value="21">21:00</option>
	  		</select>
    	</td>
    	@endfor
	  </tr>
	  <tr>
	  		@for ($i=1; $i <= 7; $i++)
	    	<th>{{Date::parse('+5 weeks')->addDay($i)->format('l d F Y')}}</th>
	    	@endfor
	  </tr>
	  
	  <tr>
	    @for ($i=1; $i <= 7; $i++)
    	<td>
    		<input type="text" class="date" name="date[]" value="{{Date::parse('+5 weeks')->addDay($i)->format('d-m-Y')}}" readonly>
    		<label for="day">Hele dag:</label>
    		<input class="day" type="checkbox" name="day[]" value="1"><br>
    		<label for="notavailable">Niet beschikbaar:</label>
			<input class="notavailable" type="checkbox" name="notavailable[]" value="1"><br>
    		<label for="from">Van</label>
    		<select class="from" name="from[]">
	    		<option value="10">10:00</option>
	    		<option value="10,5">10:30</option>
	    		<option value="11">11:00</option>
	    		<option value="11,5">11:30</option>
	    		<option value="12">12:00</option>
	    		<option value="12,5">12:30</option>
	    		<option value="13">13:00</option>
	    		<option value="13,5">13:30</option>
	    		<option value="14">14:00</option>
	    		<option value="14,5">14:30</option>
	    		<option value="15">15:00</option>
	    		<option value="15,5">15:30</option>
	    		<option value="16">16:00</option>
	    		<option value="16,5">16:30</option>
	    		<option value="17">17:00</option>
	    		<option value="17,5">17:30</option>
	    		<option value="18">18:00</option>
	    		<option value="18,5">18:30</option>
	    		<option value="19">19:00</option>
	    		<option value="19,5">19:30</option>
	    		<option value="20">20:00</option>
	    		<option value="20,5">20:30</option>
	    		<option value="21">21:00</option>
	  		</select><br>
	  		<label for="untill">Tot</label>
    		<select class="untill" name="untill[]">
	    		<option value="10">10:00</option>
	    		<option value="10,5">10:30</option>
	    		<option value="11">11:00</option>
	    		<option value="11,5">11:30</option>
	    		<option value="12">12:00</option>
	    		<option value="12,5">12:30</option>
	    		<option value="13">13:00</option>
	    		<option value="13,5">13:30</option>
	    		<option value="14">14:00</option>
	    		<option value="14,5">14:30</option>
	    		<option value="15">15:00</option>
	    		<option value="15,5">15:30</option>
	    		<option value="16">16:00</option>
	    		<option value="16,5">16:30</option>
	    		<option value="17">17:00</option>
	    		<option value="17,5">17:30</option>
	    		<option value="18">18:00</option>
	    		<option value="18,5">18:30</option>
	    		<option value="19">19:00</option>
	    		<option value="19,5">19:30</option>
	    		<option value="20">20:00</option>
	    		<option value="20,5">20:30</option>
	    		<option value="21">21:00</option>
	  		</select>
    	</td>
    	@endfor
    	</form>
	  </tr>
	</table>
	<input class="doorgeven" type="submit" name="name">
	</form>
</div>


@stop