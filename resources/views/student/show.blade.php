@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<a href="{{ action('StudentController@index') }}"><i class="far fa-list-alt" title="Lista"></i></a> &nbsp;&nbsp;&nbsp  
                	<a href="{{ action('StudentController@edit', $s->id) }}"><i class="fas fa-pencil-alt" title="Editar"></i> </a>             	
            	</div>

                <div class="card-body">                  	 
              		<div class="media">                    		
              			<img src="{{asset('storage/'. $s->photo)}}" style="width: 150px; height: 150px;" class="align-self-start mr-3">
              			<div class="media-body">
              				<h5 class="mt-1">{{ $s->name }}</h5>
		              		<p class="mb-0"><u>RG:</u> {{ $s->rg }}</p>
		             		<p class="mb-0"><u>Titulo de Eleitor:</u> {{ $s->voter_id }}</p>
		              		<p class="mb-0"><u>Telefone:</u> {{ $s->phone }}</p>
		              		<p class="mb-0"><u>Endereço:</u> {{ $s->address }}</p>
		              		<p class="mb-0"><u>Curso:</u> {{ $s->course }}</p>
		              		<p class="mb-0"><u>Instituição:</u> {{ $s->institution }}</p>
		              		<p class="mb-0"><u>Semestre:</u> {{ $s->semester }}</p>
		              		<p class="mb-0"><u>Cidade:</u> {{ $s->city }}</p>
		              		<p class="mb-0"><u>Período:</u> {{ $s->period }}</p>
		              		<p class="mb-0"><u>Dias:</u> {{ $s->days }}</p>
                      <p class="mb-0"><u>Profissão:</u> {{ $s->profession }}</p>
                      <p class="mb-0"><u>Empresa:</u> {{ $s->enterprise }}</p>
		              		<p class="mb-0"><u>Data de inicio:</u> {{ $s->study_begin->format('d/m/Y') }}</p>
		              		<p class="mb-0"><u>Data do fim:</u> {{ $s->study_ends->format('d/m/Y') }}</p>
              			</div>                 		
              		</div>              		         
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection