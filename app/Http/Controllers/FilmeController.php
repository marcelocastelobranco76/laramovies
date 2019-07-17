<?php

namespace App\Http\Controllers;

use App\filme;
use App\genero;
use Illuminate\Http\Request;

use Auth;
use Session;
Use DB;
Use Validator;
Use Input;
Use Redirect;
Use View;

class FilmeController extends Controller
{

	 public function __construct() {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   	public function index(Request $request)
    {
	$pesquisaFilme = $request->get('titulo');

	if(!$pesquisaFilme) {
	 	$filmes = DB::table('filmes')->join('generos', 'filmes.id_genero', '=', 'generos.id')->select('filmes.*', 'generos.titulo_genero')->paginate(1);
	}

	if($pesquisaFilme) {
	   	$filmes = DB::table('filmes')->join('generos', 'filmes.id_genero', '=', 'generos.id')->select('filmes.*', 'generos.titulo_genero')->orwhere('filmes.titulo', 'like',  '%' . $pesquisaFilme .'%')->paginate(1);

	  }
        /**Carrega a visualização e mostra os filmes **/
          return view('filmes.index', compact('filmes', 'pesquisaFilme'));
     

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**Carrega no select drop down todos os gêneros cadastrados **/

	$generos = genero::pluck('titulo_genero', 'id')->all();
        return view('filmes.create')->with(compact('generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   
    {
        /** Validação **/
        
        $regras = array(
	'id_genero' => 'required',            
	'data_lancamento' => 'required',
	'titulo' => 'required',
	'ano' => 'required',
	'direcao' => 'required',
	'duracao' => 'required',
	'elenco' => 'required',
	'sinopse' => 'required'
        );
        $validator = Validator::make(Input::all(), $regras);

        /** Processa as informações **/

        if ($validator->fails()) {
            return Redirect::to('filmes/create')
                ->withErrors($validator);
        } else {

            /** Cria o objeto filme, pega as informações vindas da tela de cadastro e salva **/

            $filme = new filme; 
	    $filme->id_genero  = Input::get('id_genero');	
            $filme->data_lancamento  = Input::get('data_lancamento');
	   
	    $filme->data_lancamento = date('Y-m-d', strtotime($filme->data_lancamento)); 	
		
	    $filme->titulo  = Input::get('titulo');
	    $filme->ano  = Input::get('ano');
	    $filme->direcao  = Input::get('direcao');	
	    $filme->duracao  = Input::get('duracao');
	    $filme->elenco  = Input::get('elenco');
	    $filme->sinopse  = Input::get('sinopse');
	    	    
	    				 	
            $filme->save();

            /** Mostra mensagem de sucesso e redireciona para a index **/
            Session::flash('message', 'Filme cadastrado com sucesso ');
            return Redirect::to('filmes');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\filme  $filme
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

	$genero = DB::table('generos')
            ->join('filmes', 'filmes.id_genero', '=', 'generos.id')
            ->select('generos.*', 'generos.titulo_genero')
            ->get();	

	/** Encontra o filme pelo id **/
        $filme = DB::select('select * from filmes where id = :id', ['id' => $id]); 
        

          return view('filmes.show', compact('filme','genero'));  
    }

     /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\filme  $filme

     * @return \Illuminate\Http\Response

     */

     public function edit($id)
    {
        
	$generos = genero::pluck('titulo_genero', 'id')->all();

	
	
	/** Encontra o filme pelo id **/
        $filme = DB::select('select * from filmes where id = :id', ['id' => $id]);
	

       /** Mostra o formulário de edição e passa o filme que será editado **/
       return view('filmes.edit', compact('filme','generos'));  

 }

  

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\filme  $filme

     * @return \Illuminate\Http\Response

     */

     public function update($id)
    {
        /** Regras de validação **/
       
         $regras = array(
	'id_genero' => 'required',            
	'data_lancamento' => 'required',
	'titulo' => 'required',
	'ano' => 'required',
	'direcao' => 'required',
	'duracao' => 'required',
	'elenco' => 'required',
	'sinopse' => 'required'
        );
        $validator = Validator::make(Input::all(), $regras);

        /** Processa **/
        if ($validator->fails()) {
            return Redirect::to('filmes/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            /**Salva **/
            $filme = DB::select('select * from filmes where id = :id', ['id' => $id]);
            $filme[0]->id_genero  = Input::get('id_genero');	
            $filme[0]->data_lancamento  = Input::get('data_lancamento');
	   
	    $filme[0]->data_lancamento = date('Y-m-d', strtotime($filme[0]->data_lancamento)); 	
		
	    $filme[0]->titulo  = Input::get('titulo');
	    $filme[0]->ano  = Input::get('ano');
	    $filme[0]->direcao  = Input::get('direcao');
	    $filme[0]->duracao  = Input::get('duracao');
	    $filme[0]->elenco  = Input::get('elenco');
	    $filme[0]->sinopse  = Input::get('sinopse');
	    
            $filmeTitulo = $filme[0]->titulo;
            $filmeAno = $filme[0]->ano;
	    $filmeDirecao = $filme[0]->direcao;
	    $filmeDuracao = $filme[0]->duracao;
	    $filmeElenco = $filme[0]->elenco;
	    $filmeSinopse = $filme[0]->sinopse;
	    $filmeDataLancamento = $filme[0]->data_lancamento;			

	    $idGenero = $filme[0]->id_genero;			

	    $idFilme = $filme[0]->id;		

            DB::update('update filmes set titulo = ?, ano = ?, direcao = ?, duracao = ?, elenco = ?, sinopse = ?, data_lancamento = ? , id_genero = ? where id = ?',[$filmeTitulo,$filmeAno,$filmeDirecao,$filmeDuracao,$filmeElenco,$filmeSinopse,$filmeDataLancamento,$idGenero,$idFilme]);

            // redireciona
            Session::flash('message', 'Filme atualizado com sucesso');
            return Redirect::to('filmes');
        }
    }

  

    /**

     * Remove the specified resource from storage.

     *

     * @param  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

	$filme = DB::select('select * from filmes where id = :id', ['id' => $id]);
        DB::delete('delete from filmes where id = :id', ['id' => $id]);
  

        Session::flash('message', 'Filme deletado com sucesso');
            return Redirect::to('filmes');

    }

}
