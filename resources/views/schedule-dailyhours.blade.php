@extends('master')

@section('title', 'Dagelijkse Uren Bevestigen')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Beheer</li>
        <li class="active">Dagelijkse Uren Bevestigen</li>
    </ol>
@stop

@yield('custom.js')

@section('content')
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Dagelijkse Uren Bevestigen</h3>
  </div><!-- /.box-header -->

  
  <div class="box-body">
  	<h3>Bevestig uren van: {{Date::parse()->format('l d F')}}</h3>
    <table class="pure-table">
    <thead>
        <tr>
            <th>Afdeling</th>
            <th>Medewerkers</th>
            <th>Start</th>
            <th>Pauzes</th>
            <th>Eind</th>

            <th>Wijzigen</th>
            <th>Bevestig</th>
        </tr>
    </thead>
<tbody>     


<!-- Deze variable zorgt ervoor det er geen td's ontbreken -->
{{--*/ $planningfound = false /*--}}

<form method="post">
<!-- Door alle afdelingen heen loopen -->
@foreach ($divisions as $division)

    <!-- Mederwerks per afdeling bekijken -->
    @foreach ($users as $user)
        <!-- Controleert of deze medewerker bij deze afdeling hoort -->
        @if($user->division_id == $division->division_id)
            <tr>  
            <!-- Voor elke dag de planning ophalen van de medewerker -->
                @foreach($planning as $plan)
                    @if(($user->id == $plan->user_id) && (Date::parse()->format('Y-m-d') ==  $plan->date))
                        {{--*/ $planningfound = true /*--}}
                        <td>
                            {{ $division->division}}
                        </td>
                        <td>{{ $user->name}}</td> 
                        <td>
                            <div class="inplannenuren">
                                    {{$plan->from}}
                            </div>
                        </td>

                         <td>
                            <div class="inplannenuren">
                                    {{$plan->break}} Min
                            </div>
                        </td>

                        <td>
                            <div class="inplannenuren">
                                    {{$plan->untill}}
                            </div>
                        </td>
                        <td>
                            <a href="/dagelijkseuren-bevestigen/{{$plan->planning_id}}/edit">Wijzig</a>
                        </td>
                        <td>
                            <div class="inplannenuren">
                                    <button type="button" class="bevestigknopuren" id="planningid{{ $plan->planning_id }}" name="planningid" value="{{ $plan->status }}" planningid="{{ $plan->planning_id }}" onclick="postScheduleHoursConfirmed(this, {{ $plan->planning_id }})" >
                            </div>
                        </td>
                    @endif
                @endforeach
            </tr>

        @endif
    @endforeach
@endforeach

</form>
</tbody>

</table>
<div class="kleur4"><span>Bevestigd (status = 4)</span></div>
  </div><!-- /.box-body -->
</div><!-- /.box -->




<script type="text/javascript"> 

	function postScheduleHoursConfirmed(obj, planning_id){

		$.ajax({
          url: "dagelijkseuren-bevestigen",
          type: "POST",
          data: {_planningid: planning_id},
          dataType: 'json'
        }).success(function(data){
            //Json checkt welke kleur een knop krijgt
            if(data.result == 4){
                $(obj).css("background-color","#ccc");
            }
            else{
                $(obj).css("background-color","#a3c338");
            }
        });
    }

</script>









@stop


