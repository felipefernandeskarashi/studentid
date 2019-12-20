@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<a href="{{ action('StudentController@index') }}"><i class="far fa-list-alt" title="Lista"></i></a>
                  <br><br>
                  <form action="{{ action('StudentController@report') }}" method="POST">
                    @csrf
                    <div class="form-row">
                      <div class="col">                        
                        <label for="cityInput">Cidade</label>
                        <select class="form-control" id="cityInput" name="city">   
                          <option>Selecione..</option>                       
                          @foreach ($cities as $c)
                            <option>{{$c->city}}</option>
                          @endforeach
                        </select> 
                      </div>
                      <div class="col" >
                        <label for="yearInput">Ano</label>
                        <input type="number" min="2000" name="year" class="form-control" id="yearInput">
                      </div>
                      <div class="col">
                        <label for="institutionInput">Instituição</label>
                        <select class="form-control" id="institutionInput" name="institution">
                          <option>Selecione..</option>
                          @foreach ($institutions as $i)
                            <option>{{$i->institution}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Gerar Relatório</button>
                  </form>
            	</div>
                <p> 
                  Total: {{sizeof($students)}}
                  Cidade: {{$city}}

                </p> 
                <div class="card-body">                  	 
                  <table class="table table-bordered table-hover" style="text-align: center">
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
                </div>

            </div>
        </div>
    </div>
</div>
@endsection