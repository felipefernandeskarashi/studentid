@extends('layouts.app')

@section('content')

<div class="card" id="card">
  <div class="card-body" style="background-image: url({{asset('/logo-lavinia.png')}});" id="cardbody"> 		
  	<div class="media">
  		<img src="{{asset('storage/'. $s->photo)}}" class="align-self-start mr-3" id="cardphoto">
  		<div class="media-body">
  			<h5 class="card-title" id="cardtitle"><b>Município de Lavínia</b></h5>   
    		<h5 class="card-subtitle mb-1 " id="cardcity">
    			{{ mb_convert_case($s->city, MB_CASE_UPPER, 'UTF-8') }}
    		</h5>
    		<p class="card-text">
    			<b>{{ $s->name }}</b><br>
    			{{ $s->institution }}<br>
    			{{ $s->rg }}<br>
    			{{ $s->phone }}<br>
    			Validade:  {{ $s->study_begin->format('d/m/Y') }} até {{ $s->study_ends->format('d/m/Y') }}
    			<br>
    			<b id="cardobg">Obrigatório apresentação.</b>
    		</p>
    		
  		</div>
  	</div>

  </div>
</div>

@endsection