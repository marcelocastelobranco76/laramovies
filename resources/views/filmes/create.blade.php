{{-- \resources\views\filmes\create.blade.php --}}
@extends('layouts.app')

@section('title', '| CADASTRAR FILME')

@section('content')

<div class="container">


<h1>Cadastrar filme</h1>

<!-- se existir algum erro de cadastro, vai aparecer aqui -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'filmes')) }}

    <div class="form-group">

	{{ Form::label('id_genero', 'Gênero') }}
        {!! Form::select('id_genero', $generos, null, ['class' => 'form-control']) !!}

        {{ Form::label('data_lancamento', 'Data lançamento') }}
        {{ Form::text('data_lancamento', Input::old('data_lancamento'), array('class' => 'form-control')) }}
    
	{{ Form::label('titulo', 'Título') }}
        {{ Form::text('titulo', Input::old('titulo'), array('class' => 'form-control')) }}

	{{ Form::label('ano', 'Ano') }}
        {{ Form::text('ano', Input::old('ano'), array('class' => 'form-control')) }}

	{{ Form::label('direcao', 'Dirigo por') }}
        {{ Form::text('direcao', Input::old('direcao'), array('class' => 'form-control')) }}

	{{ Form::label('duracao', 'Duração') }}
        {{ Form::text('duracao', Input::old('duracao'), array('class' => 'form-control')) }}
	
	{{ Form::label('elenco', 'Elenco') }}
        {{ Form::text('elenco', Input::old('elenco'), array('class' => 'form-control')) }}

	{{ Form::label('sinopse', 'Sinopse') }}
        {!! Form::textarea('sinopse', null, ['id' => 'sinopse', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}
    

    </div>

    

    {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>

@endsection
