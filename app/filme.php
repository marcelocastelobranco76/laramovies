<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class filme extends Model

{
    protected $fillable = ['id_genero','data_lancamento','titulo','ano','direcao','duracao','elenco','sinopse'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'filmes';

     public function generos()
    {
        
        return $this->belongsToMany(genero::class, 'generos');
    }
}
