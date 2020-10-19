<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class Imovei extends Model
{
    protected $table = 'imoveis';

    use Resizable;
    
    public function status()
    {
        return $this->belongsTo('App\ImoveisStatus','status_id');
    }
    public function proprietario()
    {
        return $this->belongsTo('App\Cliente','cliente_id');
    }
    public function finalidade()
    {
        return $this->belongsTo('App\Finalidade','finalidade_id');
    }
    public function tipo()
    {
        return $this->belongsTo('App\ImoveisTipo','tipo_id');
    }
    public function iptu()
    {
        return $this->belongsTo('App\Iptus','iptu_id');
    }
    public function solar()
    {
        return $this->belongsTo('App\PosicoesSolare','solar_id');
    }
    public function caracteristicas()
    {
        return $this->belongsToMany('App\ImoveisCaracteristica','caracteristicas_imoveis');
    }

    public function caracteristicascond()
    {
        return $this->belongsToMany('App\CondominionsCaracteristica','caracteristicas_condominions');
    }
    public function corretor()
    {
        return $this->belongsTo('App\User','user_id');
    }

    protected $casts = [
        // 'valor_venda' => 'float',
        // 'valor_aluguel' => 'float',
    ];
    
}
