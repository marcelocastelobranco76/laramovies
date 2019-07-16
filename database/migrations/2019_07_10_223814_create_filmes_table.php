<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmes', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('id_genero')->unsigned()->index();
           $table->dateTime('data_lancamento');
           $table->char('titulo',150);
	   $table->char('ano',4);
	   $table->char('direcao',150);
	   $table->char('duracao',100);
           $table->text('elenco');
	   $table->text('sinopse');
           
           
           $table->foreign('id_genero')->references('id')->on('generos');

           $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filmes');
    }
}
