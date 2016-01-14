@extends('master')

@section('title', 'Home')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Dashboard</li>
        <li class="active">Mijn Rooster</li>
    </ol>
@stop

@section('content')

<div class="box">
  <div class="box-header with-border">
    <a href="/mijnrooster" class="box-title"></a>
    <h3 class="box-title">Mijn Rooster</h3>
  </div><!-- /.box-header -->
  <div class="box-body">

    <div class="box-body">
    <table class="pure-table">
    <thead>
        @for($x=0; $x <= 3; $x++)
            {{--*/ $w = 7 * $x /*--}} <!-- $w is wanneer het begin in dagen is 7 * (aantal weken) = aantal dagen. -->
            {{--*/ $k = $w + 7 /*--}} <!-- $k laat zien hoeveel dagen er in een week zitten en ervoor zorgt dat de loop per row 7 dagen ophaald.-->
            <tr>
                @for($i=$w; $i < $k; $i++)
                    <th>{{Date::parse($monday)->addDay($i)->format('l d F')}}</th>
                @endfor
            </tr>
            {{--*/ $planningfound = false /*--}}
            @foreach ($users as $user)
            <tr>
                @for($i=$w; $i < $k; $i++)
                    @foreach($planning as $plan)
                        @if(($user->id == $plan->user_id) && (Date::parse($monday)->addDay($i)->format('Y-m-d') ==  $plan->date))
                            {{--*/ $planningfound = true /*--}}
                            <td>
                                <div class="mijnrooster">
                                        {{$plan->from}} - {{ $plan->untill}}
                                </div>
                            </td>
                        @endif
                    @endforeach

                    @if($planningfound == false)
                        <td>x</td>
                    @else
                        {{--*/ $planningfound = false /*--}}
                    @endif
                @endfor
                </tr>
            @endforeach
        @endfor
<tbody>

  </div><!-- /.box-body -->
</div><!-- /.box -->

@stop
