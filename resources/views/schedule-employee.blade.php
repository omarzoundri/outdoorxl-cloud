@extends('master')

@section('title', 'Medewerkers')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li></i>Beheer</li>
        <li class="active">Medewerkers</li>
    </ol>
@stop

@yield('custom.js')

@section('content')
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Medewerkers Inplannen</h3>
  </div><!-- /.box-header -->

  
  <div class="box-body">
    <table class="pure-table">
    <thead>
        <tr>
            <th>Afdeling</th>
            <th>Medewerkers</th>

            <!-- Dit schrijft de dagen van de huidige week op -->
            @for($i=0; $i < 7; $i++)
                <th>{{Date::parse($today)->addDay($i)->format('l d F')}}</th>
            @endfor
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
                <td>
                    {{ $division->division}}
                </td>
                <td>{{ $user->name}}</td>   
            <!-- Voor elke dag de planning ophalen van de medewerker -->
            @for($i=0; $i < 7; $i++)
                @foreach($planning as $plan)
                    @if(($user->id == $plan->user_id) && (Date::parse($today)->addDay($i)->format('Y-m-d') ==  $plan->date))
                        {{--*/ $planningfound = true /*--}}
                        <td>
                            <div class="inplannenuren">
                                    <button type="button" class="planningid" name="planningid" value="{{ $plan->status }}" onclick="postScheduleEmployee(this,{{ $plan->planning_id }})" >
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
        @endif
    @endforeach
@endforeach
</form>
</tbody>

</table>
    <div class="kleur1"><span>Ingeplanned (status = 1)</span></div>
  </div><!-- /.box-body -->
</div><!-- /.box -->
@stop

<script type="text/javascript">
    //Als de pagina geladen is
    $(document).ready(function(){
        //Voor elke button met de class planningid
        $("button.planningid").each(function() {
            //als de waarde van de planning id status 1 heeft dan knop groen maken
            if(this.value == 1)
                $(this).css("background-color","#00B16A");
            });
        }
    );

    //Als op een een tijdstip klikt word deze functie aangeroepen
    function postScheduleEmployee(obj, planningid){
        //Veranderen de status van de knop
        if(obj.value == 0){obj.value = 1}else{obj.value=0};
        //HomeController wordt aangeroepen met nieuwe status
        $.ajax({
          url: "medewerkers-inplannen",
          type: "POST",
          data: {_planningid: planningid,_status: obj.value},
          dataType: 'json'
        }).success(function(data){
            //Json checkt welke kleur een knop krijgt
            if(data.result == 1){
                $(obj).css("background-color","#00B16A");
            }
            else{
                $(obj).css("background-color","#f4f4f4");
            }
        });
    }
</script>