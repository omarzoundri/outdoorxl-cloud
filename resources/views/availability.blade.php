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
    @if(Input::get('month') !== null && Input::get('month') > 0) <a @if(Input::get('month') !== null) {{--*/ $prevMonth = Input::get('month') - 1 /*--}}@endif href="?month={{$prevMonth}}">Vorige maand</a> - @endif
	<a @if(Input::get('month') !== null) {{--*/ $nextMonth = Input::get('month') + 1 /*--}} href="?month={{$nextMonth}}" @else href="?month=1" @endif>Volgende maand</a>
    <form method="post">
	<table class="responstable">
        {{--*/ $month = Input::get('month') * 4/*--}} <!-- Hier word bepaald met welk maand er geloopt word en hoeveel weken er in een maand worden opgehaald. Huidige is 0. Volgende maand 1. etc -->
        {{--*/ $endmonth = 3 + $month /*--}} <!-- Hier bepaal je wanneer het eind van de maand is in weken. -->
        {{--*/ $startmonth = 0 + $month /*--}} <!-- Hier bepaal je vanaf welke week de kalender moet beginnen. -->
    	@for($x=$startmonth; $x <= $endmonth; $x++)
    	<tr>
    	{{--*/ $w = 7 * $x /*--}} <!-- $w is wanneer het begin in dagen is 7 * (aantal weken) = aantal dagen. -->
    	{{--*/ $k = $w + 7 /*--}} <!-- $k laat zien hoeveel dagen er in een week zitten en ervoor zorgt dat de loop per row 7 dagen ophaald.-->
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
                <td @if($status == 1 && !isset($unavailable))style="background: green; color: black"@elseif(isset($unavailable) && $unavailable == 1)style="background: red"@else style="background: white"@endif>
                    <input type="text" class="date" id="date" name="date" value="{{Date::parse()->addDay($i)->format('Y-m-d')}}">
                    <input type="text" class="datename" id="datename" name="datename" value="{{Date::parse()->addDay($i)->format('l')}}">
                    <input type="text" class="status" id="status" name="status" value="{{$status}}">
                    <input type="text" class="planningid" id="planningid" name="planningid" value="@if($status == 1){{$plan->planning_id}}@endif">
                    <label for="day">Hele dag:</label>
                    <div class="time">
                        <input class="day" id="day" type="checkbox" @if(isset($day) && $day == 1 && $status == 1 && !isset($unavailable)) checked="checked"@endif name="day[]" value="1"><br>
                    </div>
                    <label for="notavailable">Niet beschikbaar:</label>
                    <div class="time">
                        <input class="unavailable" id="unavailable" type="checkbox" @if(isset($unavailable) && $unavailable == 1 && $status == 1)checked="checked"@endif name="unavailable[]" value="1"><br>
                    </div>
                    <label for="from">Van</label>
                    <div class="time">
                    <select class="from" id="from" name="from[]">
                        @for($u=10; $u <= 21; $u++)
                            @if($status == 0)
                                @if($u == 10)
                                    <option disabled value="0" selected>-- select --</option>
                                @endif
                                <option value="{{ $u }}">{{ $u }}:00</option>
                            @else
                                @if($u == 10)
                                    <option @if(isset($unavailable) && $unavailable == 1 && $status == 1) readonly @endif value="{{ $start }}" selected>{{ $start }}:00</option>
                                @endif
                                @if($start != $u)
                                <option value="{{ $u }}">{{ $u }}:00</option>
                                @endif
                            @endif
                        @endfor
                    </select>
                    </div>
                    <br />
                    <label for="untill">Tot</label>
                    <div class="time">
                        <select class="untill" name="untill[]" id="untill">
                            @for($u=10; $u <= 21; $u++)
                                @if($status == 0)
                                    @if($u == 10)
                                        <option disabled value="0" selected>-- select --</option>
                                    @endif
                                    <option value="{{ $u }}">{{ $u }}:00</option>
                                @else
                                    @if($u == 10)
                                    <option @if(isset($unavailable) && $unavailable == 1 && $status == 1) readonly @endif value="{{ $end }}" selected>{{ $end }}:00</option>
                                    @endif
                                    @if($end != $u)
                                    <option value="{{ $u }}">{{ $u }}:00</option>
                                    @endif
                                @endif
                            @endfor
                        </select>
                    </div>
                </td>
            @endfor
        </tr>
        @endfor
    </table>
	</form>
</div>

    <script type="text/javascript">
        $(function() {
            $('.responstable .time').change(function(e) {

                if ($(this).parent().find('select.from').val() !== null && $(this).parent().find('select.untill').val() !== null /*&& $(this).parent().find('select.from').val() < $(this).parent().find('select.untill').val()*/ || $(this).parent().find('#day').is(':checked') || $(this).parent().find('#unavailable').is(':checked')) {

                    if ($(this).parent().find('#day').is(':checked')){ var day = 1;}else{var day = 0;}
                    if ($(this).parent().find('#unavailable').is(':checked')){var unavailable = 1;}else{var unavailable = 0;}
                    $.ajax({
                        url: "beschikbaarheid",
                        type: "POST",
                        data: {
                            status: $(this).parent().find('#status').val(),
                            planningid: $(this).parent().find('#planningid').val(),
                            day: day,
                            unavailable: unavailable,
                            start: $(this).parent().find('select.from').val(),
                            datex: $(this).parent().find('#date').val(),
                            end: $(this).parent().find('select.untill').val(),
                            datename: $(this).parent().find('#datename').val()
                        }, 
                        dataType: 'json',
                        context: $(this)
                    }).done(function(data) {
                        console.log(data)
                        if(parseInt(data["status"]) == 1) { //success 
                            this.closest('td').fadeIn(5000).css({
                                'background' : '#00F900'
                            });
                        }
                    }).error(function(e){
                        console.log(e);
                    });
                    return;
                }
            });
        });
    </script>
@stop