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
        <tr>
            @for($i=0; $i < 7; $i++)
                <th>{{Date::parse($monday)->addDay($i)->format('l d F')}}</th>
            @endfor
        </tr>
        {{--*/ $planningfound = false /*--}}
        @foreach ($users as $user)
        <tr>
            @for($i=0; $i < 7; $i++)
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
                    <td></td>
                @else
                    {{--*/ $planningfound = false /*--}}
                @endif
            @endfor 
            </tr>
        @endforeach

        <tr>
            @for($i=7; $i < 14; $i++)
                <th>{{Date::parse($monday)->addDay($i)->format('l d F')}}</th>
            @endfor
        </tr>
            <tr>
            @for($i=7; $i < 14; $i++)
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
                    <td></td>
                @else
                    {{--*/ $planningfound = false /*--}}
                @endif
            @endfor 
            </tr>

        <tr>
            @for($i=14; $i < 21; $i++)
                <th>{{Date::parse($monday)->addDay($i)->format('l d F')}}</th>
            @endfor
        </tr>

            <tr>
            @for($i=14; $i < 21; $i++)
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
                    <td></td>
                @else
                    {{--*/ $planningfound = false /*--}}
                @endif
            @endfor 

            </tr>

        <tr>
            @for($i=21; $i < 28; $i++)
                <th>{{Date::parse($monday)->addDay($i)->format('l d F')}}</th>
            @endfor
        </tr>
            <tr>
            @for($i=21; $i < 28; $i++)
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
                    <td></td>
                @else
                    {{--*/ $planningfound = false /*--}}
                @endif
            @endfor 
            </tr>
    </thead>
<tbody>     

  </div><!-- /.box-body -->
</div><!-- /.box -->

@stop
