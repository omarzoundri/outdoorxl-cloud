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
    	@for($x=0; $x <= 3; $x++)
    	<tr>
    	{{--*/ $w = 7 * $x /*--}}
    	{{--*/ $k = $w + 7 /*--}}
    	   @for($s=$w; $s < $k; $s++)
    	   <th>{{Date::parse()->addDay($s)->format('l d F')}}</th>
    	   @endfor
    	</tr>
    	<tr>
    	  	@for($i=$w; $i < $k; $i++)
                @if(isset($planning))
                    @foreach($planning as $plan)
                        @if($plan->date === Date::parse()->addDay($i)->format('Y-m-d'))
                            {{--*/ $status = 1 /*--}}
                            @if($plan->day == 1){{--*/ $day = 1 /*--}}@endif
                            @if($plan->unavailable == 1){{--*/ $unavailable = 1 /*--}}@endif
                            {{--*/ $start = substr($plan->from, 0, 2) /*--}}
                            {{--*/ $end = substr($plan->untill, 0, 2) /*--}}
                            <?php break;?>
                        @else
                            {{--*/ $status = 0 /*--}}
                            @if($plan->day != 1){{--*/ $day = 0 /*--}}@endif
                            @if($plan->unavailable != 1){{--*/ $unavailable = 0 /*--}}@endif
                        @endif
                    @endforeach
                @endif
                <td @if($status == 1)style="background: green; color: black"@else style="background: white"@endif>
                    <input type="text" class="date" name="date[]" value="{{Date::parse()->addDay($i)->format('Y-m-d')}}" readonly>
                    <label for="day">Hele dag:</label>
                    <input class="day" type="checkbox" @if($day == 1)checked="checked"@endif name="day[]" value="1"><br>
                    <label for="notavailable">Niet beschikbaar:</label>
                    <input class="notavailable" type="checkbox" @if($unavailable == 1)checked="checked"@endif name="notavailable[]" value="1"><br>
                    <label for="from">Van</label>
                    <select id="postAvailability({{ $plan->planning_id }})" class="from" name="from[]">
                        @for($u=10; $u <= 21; $u++)
                            @if($status == 0)
                                @if($u == 10)
                                    <option disabled selected>-- select --</option>
                                @endif
                                <option value="{{ $u }}">{{ $u }}:00</option>
                            @else
                                @if($u == 10)
                                    <option value="{{ $start }}" selected>{{ $start }}:00</option>
                                @endif
                                @if($start != $u)
                                <option value="{{ $u }}">{{ $u }}:00</option>
                                @endif
                            @endif
                        @endfor
                    </select>
                    <br>
                    <label for="untill">Tot</label>
                    <select class="untill" name="untill[]">
                        @for($u=10; $u <= 21; $u++)
                            @if($status == 0)
                                @if($u == 10)
                                    <option disabled selected>-- select --</option>
                                @endif
                                <option value="{{ $u }}">{{ $u }}:00</option>
                            @else
                                @if($u == 10)
                                <option value="{{ $end }}" selected>{{ $end }}:00</option>
                                @endif
                                @if($end != $u)
                                <option value="{{ $u }}">{{ $u }}:00</option>
                                @endif
                            @endif
                        @endfor
                    </select>
                </td>
            @endfor
        </tr>
        @endfor
    </table>
	</form>
</div>

<script type="text/javascript">
    $('select.from').change(function(){
        function postAvailability(planningid){
                $.ajax({
                  url: "beschikbaarheid",
                  type: "POST",
                  data: {_planningid: planningid,_start: $('select.from').val()},
                  dataType: 'json'
                }).success(function(data){
            });
        }
    }
</script>
@stop