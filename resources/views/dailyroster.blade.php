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
    <h3 class="box-title">Rooster voor Vandaag</h3>
  </div><!-- /.box-header -->

  
  <div class="box-body">
    <table class="pure-table">
    <thead>
        <tr>
            <th>Afdeling</th>
            <th>Medewerkers</th>

            <!-- Dit schrijft de dagen van de huidige week op -->
            <th>{{Date::parse()->format('l d F')}}</th>
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
                        <td>
                            {{ $user->name}}
                        </td>   
                        <td>
                            <div class="inplannenuren">
                                {{$plan->from}} - {{ $plan->untill}}
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
  </div><!-- /.box-body -->
</div><!-- /.box -->
@stop