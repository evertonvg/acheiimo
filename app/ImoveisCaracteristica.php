<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ImoveisCaracteristica extends Model
{
    protected $table = 'imoveis_caracteristicas';
    public function imoveis()
    {
        
        return $this->belongsToMany('App\Imovei','caracteristicas_imoveis');
    }
}
