{{-- \resources\views\generos\edit.blade.php --}}
@extends('layouts.app')

@section('title', '| EDITAR GÊNERO')


@section('content')
<div class="container">



<h1>Editar gênero</h1>


{{ HTML::ul($errors->all()) }}

{{ Form::model($genero, array('url' => array('/generos', $genero[0]->id), 'method' => 'PATCH')) }}

    <div class="form-group">
        {{ Form::label('titulo_genero', 'Gênero') }}
        {{ Form::text('titulo_genero', $genero[0]->titulo_genero, array('class' => 'form-control')) }}
    </div>

   
   

    {{ Form::submit('Enviar', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>

@endsection
