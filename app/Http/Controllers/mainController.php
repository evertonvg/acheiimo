<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ImoveisTipo;
use App\Imovei;

class mainController extends Controller
{
    public function index(){

        $ImoveisTipo = ImoveisTipo::all();
        $imoveis = Imovei::all();
        $imoveisdestaque = Imovei::where('destaque',true)->where('publicar',true)->get();
        // return $imoveisdestaque;
        $dados = [
            'width'=>300,
            'height'=>500,
            'hw'=>600,
        ];
        return view('index',compact('dados','ImoveisTipo','imoveis','imoveisdestaque'));
    }
}
