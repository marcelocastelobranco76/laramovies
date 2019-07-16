{{-- \resources\views\filmes\edit.blade.php --}}
@extends('layouts.app')

@section('title', '| EDITAR FILME')


@section('content')
<div class="container">



<h1>Editar filmes</h1>


{{ HTML::ul($errors->all()) }}

{{ Form::model($filme, array('url' => array('/filmes', $filme[0]->id), 'method' => 'PATCH')) }}

    <div class="form-group">

	{{ Form::label('id_genero', 'Gênero') }}
        {!! Form::select('id_genero', $generos, $filme[0]->id_genero, ['class' => 'form-control']) !!}	


        {{ Form::label('data_lancamento', 'Data lançamento') }}
        {{ Form::text('data_lancamento', $filme[0]->data_lancamento, array('class' => 'form-control')) }}


	{{ Form::label('titulo', 'Título') }}
        {{ Form::text('titulo', $filme[0]->titulo, array('class' => 'form-control')) }}
	
	{{ Form::label('ano', 'Ano') }}
        {{ Form::text('ano', $filme[0]->ano, array('class' => 'form-control')) }}

	{{ Form::label('direcao', 'Dirigido por') }}
        {{ Form::text('direcao', $filme[0]->direcao, array('class' => 'form-control')) }}
	
	{{ Form::label('duracao', 'Duração') }}
        {{ Form::text('duracao', $filme[0]->duracao, array('class' => 'form-control')) }}

	{{ Form::label('elenco', 'Elenco') }}
        {{ Form::text('elenco', $filme[0]->elenco, array('class' => 'form-control')) }}

	{{ Form::label('sinopse', 'Sinopse') }}
        {!! Form::textarea('sinopse', $filme[0]->sinopse, ['id' => 'sinopse', 'rows' => 20, 'cols' => 50, 'style' => 'resize:none']) !!}



    </div>

   
   

    {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>

@endsection
