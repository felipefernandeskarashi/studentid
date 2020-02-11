<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<p style="margin-left: 20%; margin-top: 3%;"> 
	<b>Cidade:</b> {{$city}}
	<b>Instituição:</b> {{$institution}}
	<b>Ano:</b> {{$year}}
	<b>Semestre:</b> {{$semester}}
	<b>Total: </b> {{sizeof($students)}}
</p> 

                 	 
	<table class="table-bordered">
	<tr>
	  <th scope="col">Nome</th>
	  <th scope="col">Curso</th>
	  <th scope="col">RG</th>
	  <th scope="col">Celular</th>
	  <th scope="col">Data de Inicio</th>
	  <th scope="col">Dias</th>
	</tr>
	@foreach ($students as $s)
	<tr>
	  <td >{{$s->name}} </td>
	  <td> {{$s->course}} </td>
	  <td> {{$s->rg}} </td>
	  <td> {{$s->phone}} </td>
	  <td> {{$s->study_begin->format('d/m/Y')}} </td>
	  <td> {{$s->days}} </td>                      
	</tr>
	@endforeach
	</table>   
