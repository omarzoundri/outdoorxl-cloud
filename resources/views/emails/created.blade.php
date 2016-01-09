<html><body>
<table rules="all" style="border-color: #666;" cellpadding="10">
<tr style='background: #eee;'><td><strong>Name:</strong></td><td> {{ $request->name }} </td></tr>
<tr><td><strong>Email:</strong></td><td> {{ $request->email }}</td></tr>
<tr><td><strong>Functie:</strong></td><td> @if($request->rank_id == 0) Medewerker @elseif($request->rank_id == 1) Stagiare @elseif($request->rank_id == 2) Beheerder @endif</td></tr>
<tr><td><strong>Afdeling:</strong></td><td> @foreach($division as $div){{ $div->division }} @endforeach</td></tr>
<tr><td><strong>Ervaring:</strong></td><td>@if($request->experience_id == 0) Junior @elseif($request->experience_id == 1) Ervaren @elseif($request->experience_id == 2) Heel Ervaren @endif </td></tr>
<tr><td><strong>Wachtwoord:</strong></td><td>{{ $password }} </td></tr>
</table>
</body></html>