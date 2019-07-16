<!-- app/views/filmes/show.blade.php -->

@extends('layouts.app')

@section('title', '| FILMES')

@section('content')
<div class="container">



<h1>INFORMAÇÕES SOBRE O FILME</h1>

    <div class="jumbotron text-center">
        <h2>{{ $filme[0]->titulo }} ({{$filme[0]->ano}})</h2>
        <p>
           
            <strong>Data de lançamento:</strong> {{str_replace('00:00:00','',$filme[0]->data_lancamento) }}<br>
	    <strong>Duração:</strong> {{ $filme[0]->duracao }}<br>
	    <strong>Dirigido por:</strong> {{ $filme[0]->direcao }}<br>
	    <strong>Gênero:</strong> {{ $genero[0]->titulo_genero }}<br>
	    <strong>Elenco:</strong> {{ $filme[0]->elenco }}<br>
	    <strong>Sinopse:</strong> {{ $filme[0]->sinopse }}<br>

        </p>
    </div>

</div>
@endsection
