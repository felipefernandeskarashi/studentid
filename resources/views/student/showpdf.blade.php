
<div class="container" style="margin-left: 10%;">

    <div class="card-body">                  	 
  		<div class="media">                    		
  			<img src="{{asset('storage/'. $student->photo)}}" style="width: 150px; height: 150px;" class="align-self-start mr-3">
  			<div class="media-body">
  				<h2 class="mt-1">{{ $student->name }}</h2>
          		<p class="mb-0"><b>RG:</b> {{ $student->rg }}</p>
         		<p class="mb-0"><b>Titulo de Eleitor:</b> {{ $student->voter_id }}</p>
          		<p class="mb-0"><b>Telefone:</b> {{ $student->phone }}</p>
          		<p class="mb-0"><b>Endereço:</b> {{ $student->address }}</p>
          		<p class="mb-0"><b>Curso:</b> {{ $student->course }}</p>
          		<p class="mb-0"><b>Instituição:</b> {{ $student->institution }}</p>
          		<p class="mb-0"><b>Semestre:</b> {{ $student->semester }}</p>
          		<p class="mb-0"><b>Cidade:</b> {{ $student->city }}</p>
          		<p class="mb-0"><b>Período:</b> {{ $student->period }}</p>
          		<p class="mb-0"><b>Dias:</b> {{ $student->days }}</p>
          		<p class="mb-0"><b>Profissão:</b> {{ $student->profession }}</p>
          		<p class="mb-0"><b>Empresa:</b> {{ $student->enterprise }}</p>
          		<p class="mb-0"><b>Data de inicio:</b> {{ $student->study_begin->format('d/m/Y') }}</p>
          		<p class="mb-0"><b>Data do fim:</b> {{ $student->study_ends->format('d/m/Y') }}</p>
  			</div>                 		
  		</div>              		         
                                    
</div>
