@extends('layouts/app')

@section('content')
<div class="container" style="float: right;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="float: right;">
                <div class="card-header">
                	<a href="{{ action('StudentController@create') }}"><i class="fas fa-user-plus"></i></a>
                	&nbsp;&nbsp;&nbsp 
                	<a href="{{ action('StudentController@report') }}"><i class="far fa-chart-bar fa-lg"></i></a>
            		<form action="{{ action('StudentController@search') }}" method="POST" style="width: 500px; margin-left: 25%;">
						@csrf
						<input type="text" name="search" class="form-control" placeholder="Busca.." >
					</form>
					Quantidade : {{$students->total()}}
                </div>

				<table class="table table-bordered table-hover" style="text-align: center">
				<tr>
			      <th scope="col">Nome</th>
			      <th scope="col">Instituição</th>
			      <th scope="col">RG</th>
			      <th scope="col">Celular</th>
			      <th scope="col">Data de Inicio</th>
			      <th scope="col">Dias</th>
			      <th scope="col">Visualizar</th>
			      <th scope="col">Remover</th>
			      <th scope="col">Carteirinha</th>
			    </tr>
					@foreach ($students as $s)
					<tr class="{{ $s->study_ends < date('Y-m-d') ? 'table-danger' : ''}}">
						<td >{{$s->name}} </td>
						<td> {{$s->institution}} </td>
						<td> {{$s->rg}} </td>
						<td> {{$s->phone}} </td>
						<td> {{$s->study_begin->format('d/m/Y')}} </td>
						<td> {{$s->days}} </td>
						<td><a href="{{ action('StudentController@show', $s->id) }}"><i class="fas fa-search"></i></a></td>
						<td><a href="{{ action('StudentController@destroy', $s->id) }}"  onClick="remove()"><i class="fas fa-trash"></i></a></td>
						<td><a href="{{ action('StudentController@getIdCard', $s->id) }}"><i class="fas fa-id-card"></i></a></td>
					</tr>
				    @endforeach
				</table>
				{{ $students->links() }}                
            </div>
        </div>
    </div>
</div>

@stop

<script type="text/javascript">
	
function remove(){
	 alert("Estudante excluído com sucesso!");
}

</script>