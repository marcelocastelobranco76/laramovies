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
 
   class GeneroController extends Controller

{

      public function __construct() {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        /** Todos os generos **/
        $generos = genero::orderBy('titulo_genero')->paginate(5);;

        /** Carrega a visualizacao e mostra os generos **/
                return view('generos.index')
            ->with('generos', $generos);
    }

   

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('generos.create');

    }

  

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store()
    {
        /** Validação **/
        
        $regras = array(
            'titulo_genero' => 'required'
        );
        $validator = Validator::make(Input::all(), $regras);

        /** Processa **/
        if ($validator->fails()) {
            return Redirect::to('generos/create')
                ->withErrors($validator);
        } else {
            /** Salva **/
            $genero = new genero;
            $genero->titulo_genero=Input::get('titulo_genero');
            $genero->save();

            /** Redireciona **/
            Session::flash('message', 'Gênero cadastrado com sucesso ');
            return Redirect::to('generos');
        }
    }
   

    /**

     * Display the specified resource.

     *

     * @param  \App\genero  $genero

     * @return \Illuminate\Http\Response

     */

    

   

    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\genero  $genero

     * @return \Illuminate\Http\Response

     */

     public function edit($id)
    {
        /** Seleciono o gênero de acordo com o ID **/
        $genero = DB::select('select * from generos where id = :id', ['id' => $id]);


        /** Mostra o formulário de edição e passa o gênero que será editado **/
       return view('generos.edit', compact('genero'));    

 }

  

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\genero  $genero

     * @return \Illuminate\Http\Response

     */

     public function update($id)
    {
        /** Validação **/
       
        $regras = array(
            'titulo_genero'  => 'required'
        );
        $validator = Validator::make(Input::all(), $regras);

        /** Processa **/
        if ($validator->fails()) {
            return Redirect::to('generos/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            /** Salva **/
            $genero = DB::select('select * from generos where id = :id', ['id' => $id]);
            $genero[0]->titulo_genero=Input::get('titulo_genero');
          
	    $generoTitulo = $genero[0]->titulo_genero;			

            DB::update('update generos set titulo_genero = ? where id = ?',[$generoTitulo,$id]);

            /** Redireciona **/
            Session::flash('message', 'Gênero atualizado com sucesso');
            return Redirect::to('generos');
        }
    }

  

    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\genero  $genero

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

	$genero = DB::select('select * from generos where id = :id', ['id' => $id]);
        DB::delete('delete from generos where id = :id', ['id' => $id]);
  

        Session::flash('message', 'Gênero deletado com sucesso');
            return Redirect::to('generos');

    }

}
