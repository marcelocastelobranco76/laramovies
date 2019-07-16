<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class genero extends Model
{
    protected $fillable = ['titulo_genero'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'generos';

    public function filmes()
    {
        return $this->hasMany(filme::class);
    }
}
