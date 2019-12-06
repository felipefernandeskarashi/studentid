@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ action('StudentController@index') }}">Estudantes</a>
                </div>

                <div class="card-body">
                <form action="{{ action('StudentController@store') }}" method="POST">
                @csrf

                    <div class="form-group">
                        <label><b>Nome</b></label>
                        <input type="" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label><b>RG</b></label>
                        <input type="" name="rg" class="form-control">
                    </div>
                    <div class="form-group">
                        <label><b>Titulo de Eleitor</b></label>
                        <input type="" name="voter_id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label><b>Celular</b></label>
                        <input type="" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label><b>Endereço</b></label>
                        <input type="" name="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label><b>Curso</b></label>
                        <input type="" name="course" class="form-control">
                    </div>
                    <div class="form-group">
                        <label><b>Instituição</b></label>
                        <input type="" name="institution" class="form-control">
                    </div>
                    <div class="form-group">
                        <label><b>Semestre</b></label>
                        <input type="number" name="semester" class="form-control">
                    </div>
                    <div class="form-group">
                        <label><b>Cidade que Estuda</b></label>
                        <input type="" name="city" class="form-control">
                    </div>
                    <div class="form-group">
                        <label><b>Período que Estuda: </b></label><br>
                        Manhã: <input type="checkbox" name="period" value="Manhã">&nbsp;&nbsp
                        Tarde: <input type="checkbox" name="period" value="Tarde">&nbsp;&nbsp
                        Noite: <input type="checkbox" name="period" value="Noite">
                    </div>
                    <div class="form-group">
                        <label><b>Dias da semana que estuda: </b></label><br>
                        Todos os dias: <input type="checkbox" name="days" value="Todos os dias">&nbsp;&nbsp
                        Segunda-Feira: <input type="checkbox" name="days" value="Segunda-Feira">&nbsp;&nbsp
                        Terça-Feira: <input type="checkbox" name="days" value="Terça-Feira">&nbsp;&nbsp
                        Quarta-Feira: <input type="checkbox" name="days" value="Quarta-Feira">&nbsp;&nbsp
                        Quinta-Feira: <input type="checkbox" name="days" value="Quinta-Feira">&nbsp;&nbsp
                        Sexta-Feira: <input type="checkbox" name="days" value="Sexta-Feira">&nbsp;&nbsp
                    </div>
                    <div class="form-group">
                        <label><b>Inicio do curso</b></label>
                        <input type="date" name="study_begin" class="input-group date">
                    </div>
                    <div class="form-group">
                        <label><b>Fim do curso</b></label>
                        <input type="date" name="study_ends" class="input-group date">
                    </div>
                    <div class="form-group">
                        <label><b>Foto</b></label>
                        <input type="file" name="photo">
                        
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Adicionar</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


 


