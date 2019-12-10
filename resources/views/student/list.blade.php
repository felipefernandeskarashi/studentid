@extends('layouts/app')

@section('content')
<div class="container" style="float: right;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="float: right;">
                <div class="card-header">
                	<a href="{{ action('StudentController@create') }}"><i class="fas fa-user-plus"></i></a>
                </div>

                <div class="card-body">
				
					<table class="table table-bordered table-hover" style="text-align: center">
					<tr>
				      <th scope="col">Nome</th>
				      <th scope="col">Curso</th>
				      <th scope="col">RG</th>
				      <th scope="col">Celular</th>
				      <th scope="col">Data de Inicio</th>
				      <th scope="col">Dias</th>
				      <th scope="col">Visualizar</th>
				      <th scope="col">Remover</th>
				      <th scope="col">Carteirinha</th>

				    </tr>
						@foreach ($students as $s)
						<tr>
							<td >{{$s->name}} </td>
							<td> {{$s->course}} </td>
							<td> {{$s->rg}} </td>
							<td> {{$s->phone}} </td>
							<td> {{$s->study_begin}} </td>
							<td> {{$s->days}} </td>
							<td><a href="{{ action('StudentController@show', $s->id) }}"><i class="fas fa-search"></i></a></td>
							<td><a href="{{ action('StudentController@destroy', $s->id) }}"  onClick="remove()"><i class="fas fa-trash"></i></a></td>
							<td><a href="#"><i class="fas fa-id-card"></i></a></td>
						</tr>
					    @endforeach
					</table>
					{{ $students->links() }}
                </div>
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