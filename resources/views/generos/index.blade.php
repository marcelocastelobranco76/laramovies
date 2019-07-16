   {{-- \resources\views\generos\index.blade.php --}}

@extends('layouts.app')

@section('title', '| GÊNEROS')

@section('content')

<div class="container">



<h1>Todos os gêneros</h1>

<!-- Aqui mostra todas as mensagens -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Gênero</td>
           
            <td>Ações</td>
        </tr>
    </thead>
    <tbody>
    @foreach($generos as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->titulo_genero}}</td>
            
            <!-- ações : deletar e atualizar gênero -->
            <td>

                <!-- deleta o gênero (utiliza o método DESTROY /generos/{id} -->
                {{ Form::open(array('url' => 'generos/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Apagar', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

               
                <!-- edita o gênero (utiliza o método encontrado em GET /generos/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('generos/' . $value->id . '/editar') }}">EDITAR</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $generos->links() }}
</div>
@endsection

