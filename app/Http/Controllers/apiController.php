<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imovei;

class apiController extends Controller
{

    // public function bairro($cidade)
    // {
    //     $imovei=Imovei::where('cidade',$cidade)->get();

    //     return $imovei;
    // }

    public function imoveistipos()
    {
        $tipos = ImoveisTipo::all();
        return $tipos;
    }

    public function cidades()
    {
        $cidades = Imovei::where('estado', 'RS')->orderBy('cidade')
            ->get();
        return $cidades;
    }

    public function corretores()
    {
        $user = User::all();
        return $user;
    }

    public function bairro($cidade)
    {
        $bairros = Imovei::where('cidade', $cidade)->select('bairro')->distinct()->orderBy('bairro')
            ->get();
        return $bairros;
    }


    


    
}
