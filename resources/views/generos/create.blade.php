{{-- \resources\views\generos\create.blade.php --}}
@extends('layouts.app')

@section('title', '| CADASTRAR GÊNERO')

@section('content')

<div class="container">



<h1>Cadastrar gênero</h1>

<!-- se existir algum erro de cadastro, vai aparecer aqui -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'generos')) }}

    <div class="form-group">
        {{ Form::label('titulo_genero', 'Gênero') }}
        {{ Form::text('titulo_genero', Input::old('titulo_genero'), array('class' => 'form-control')) }}
    </div>

    

    {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>

@endsection
