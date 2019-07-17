   {{-- \resources\views\filmes\index.blade.php --}}

@extends('layouts.app')

@section('title', '| FILMES')

@section('content')
<div class="container">
			
		     
			    <div class="form-group">
				 <form action="{{ url('/filmes') }}" method="get">
                                {{ csrf_field() }}
                                <label class="control-label">Pesquisar</label>

                                <input type="search" class="form-control input-sm" name="titulo" value="">

                                <button type="submit" class="btn btn-primary btn-sm" title="Pesquisar">
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                </button>
                            </form>
			</div>
	</div>

<div class="container">



<h1>Todos os filmes</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
	    <td>Gênero</td>
            <td>Data de lançamento</td>
	     <td>Título</td>	
	   		
					
           
            <td>Ações</td>
        </tr>
    </thead>
    <tbody>
    @foreach($filmes as $key => $value)
        <tr>
            <td>{{ $value->id}}</td>
            <td>{{ $value->titulo_genero}}</td>
	    <td>{{ str_replace('00:00:00','',$value->data_lancamento)}}</td>
            <td> 
                <a class="btn btn-small btn-success" href="{{ URL::to('/filmes/' . $value->id) }}">{{$value->titulo}}</a></td>
	    							
            
            <!-- ações : deletar e atualizar filmes -->
            <td>

                <!-- deleta o filme (utiliza o método DESTROY /filmes/{id} -->
                {{ Form::open(array('url' => '/filmes/' . $value->id, 'class' => 'pull-left')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Apagar', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

               
                <!-- edita o filme (utiliza o método encontrado em GET /filmes/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('/filmes/' . $value->id . '/editar') }}">EDITAR</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $filmes->appends(['titulo' => $pesquisaFilme])->links() }}
</div>
@endsection

