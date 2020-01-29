@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ action('StudentController@index') }}"><i class="far fa-list-alt" title="Lista"></i></a>
                </div>

                <div class="card-body">
                <form action="{{ action('StudentController@update', $s->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')                    
                @csrf

                    <div class="form-group">
                        <label><b>Nome</b></label>
                        <input type="" name="name" class="form-control" value="{{ $s->name ?? old('name') }}">
                        @error('name') <p style="color: red;">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label><b>RG</b></label>
                        <input type="" name="rg" class="form-control" value="{{ $s->rg ?? old('rg') }}" id="rg">
                        @error('rg') <p style="color: red;">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label><b>Titulo de Eleitor</b></label>
                        <input type="" name="voter_id" class="form-control" value="{{ $s->voter_id ?? old('voter_id') }}">
                        @error('voter_id') <p style="color: red;">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label><b>Celular</b></label>
                        <input type="" name="phone" class="form-control" value="{{ $s->phone ?? $s->name ?? old('phone') }}" id="phone">
                        @error('phone') <p style="color: red;">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label><b>Endereço</b></label>
                        <input type="" name="address" class="form-control" value="{{ $s->address ?? old('address') }}">
                        @error('address') <p style="color: red;">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label><b>Curso</b></label>
                        <input type="" name="course" class="form-control" value="{{ $s->course ?? old('course') }}">
                        @error('course') <p style="color: red;">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label><b>Instituição</b></label>
                        <input type="" name="institution" class="form-control" value="{{ $s->institution ?? old('institution') }}">
                        @error('institution') <p style="color: red;">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label><b>Semestre</b></label>
                        <input type="number" name="semester" class="form-control" value="{{ $s->semester ?? old('semester') }}">
                        @error('semester') <p style="color: red;">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label><b>Cidade que Estuda</b></label>
                        <input type="" name="city" class="form-control" value="{{ $s->city ?? old('city') }}">
                        @error('city') <p style="color: red;">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label><b>Período que Estuda: </b></label><br>
                        Manhã: <input type="checkbox" name="period[]" value="Manhã" 
                        <?php if(strpos($s->period, 'Manhã') !== false) echo 'checked'; ?>>&nbsp;&nbsp
                        Tarde: <input type="checkbox" name="period[]" value="Tarde" 
                        <?php if(strpos($s->period, 'Tarde') !== false) echo 'checked'; ?>>&nbsp;&nbsp
                        Noite: <input type="checkbox" name="period[]" value="Noite" 
                        <?php if(strpos($s->period, 'Noite') !== false) echo 'checked'; ?>>
                        @error('period') <p style="color: red;">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label><b>Dias da semana que estuda: </b></label><br>
                        Todos os dias: <input type="checkbox" name="days[]" value="Todos os dias"
                        <?php if(strpos($s->days, 'Todos os dias') !== false) echo 'checked'; ?>>&nbsp;&nbsp
                        Segunda-Feira: <input type="checkbox" name="days[]" value="Segunda-Feira"
                        <?php if(strpos($s->days, 'Segunda-Feira') !== false) echo 'checked'; ?>>&nbsp;&nbsp
                        Terça-Feira: <input type="checkbox" name="days[]" value="Terça-Feira"
                        <?php if(strpos($s->days, 'Terça-Feira') !== false) echo 'checked'; ?>>&nbsp;&nbsp
                        Quarta-Feira: <input type="checkbox" name="days[]" value="Quarta-Feira"
                        <?php if(strpos($s->days, 'Quarta-Feira') !== false) echo 'checked'; ?>>&nbsp;&nbsp
                        Quinta-Feira: <input type="checkbox" name="days[]" value="Quinta-Feira"
                        <?php if(strpos($s->days, 'Quinta-Feira') !== false) echo 'checked'; ?>>&nbsp;&nbsp
                        Sexta-Feira: <input type="checkbox" name="days[]" value="Sexta-Feira"
                        <?php if(strpos($s->days, 'Sexta-Feira') !== false) echo 'checked'; ?>>&nbsp;&nbsp
                        @error('days') <p style="color: red;">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label><b>Inicio do Semestre</b></label>
                        <input type="text" name="study_begin" class="input-group" value="{{ $s->study_begin->format('d/m/Y') ?? old('study_begin') }}" autocomplete="off" id="study_begin">
                        @error('study_begin') <p style="color: red;">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label><b>Fim do Semestre</b></label>
                        <input type="text" name="study_ends" class="input-group" value="{{ $s->study_ends->format('d/m/Y') ?? old('study_ends') }}" autocomplete="off" id="study_ends">
                        @error('study_ends') <p style="color: red;">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label><b>Profissão</b></label>
                        <input type="" name="profession" class="form-control" value="{{ $s->profession ?? old('profession') }}">
                        @error('profession') <p style="color: red;">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label><b>Empresa</b></label>
                        <input type="" name="enterprise" class="form-control" value="{{ $s->enterprise ?? old('enterprise') }}">
                        @error('enterprise') <p style="color: red;">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label><b>Foto</b></label>                        
                        <input type="file" name="photo" class="input-group" id="photo" style="color: transparent;" >
                        <input type="hidden" name="oldphoto" value="{{ $s->photo }}" >
                        <p id="hide">Imagem: <?php echo $s->photo; ?></p>
                        @error('photo') <p style="color: red;">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Atualizar</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

