<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CondominionsCaracteristica extends Model
{
    protected $table = 'condominions_caracteristicas';
    public function imoveis()
    {
        
        return $this->belongsToMany('App\Imovei','caracteristicas_condominions');
    }
}
