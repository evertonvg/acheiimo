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
        $imoveisdestaque = Imovei::where('destaque',true)->where('publicar',true)->with('tipo')->get();
        return view('index',compact('dados','ImoveisTipo','imoveis','imoveisdestaque')); 
    }

    public function imoveis(request $r){
        $ImoveisTipo = ImoveisTipo::all(); 
        $imoveisall = Imovei::all();
        $dados = [
            'id'=>$r->input('id'),
            'tipos'=>$r->input('tipos'),
            'cidade'=>$r->input('cidade'),
            'bairros'=>$r->input('bairros'),
            'dormitorios'=>$r->input('dormitorios'),
            'garagens'=>$r->input('garagens'),
            'maxvalue'=>$r->input('maxvalue'),
            'minvalue'=>$r->input('minvalue')
        ];
        // return $dados;
        $imoveis = Imovei::where('publicar',true)->with('tipo')->whereBetween('valor_venda_float',[$dados['minvalue'],$dados['maxvalue']])->where('dormitorios','>=',$dados['dormitorios']);

        if($dados['id']!=null){
            $imoveis = $imoveis->where('id','LIKE','%'.$dados['id'].'%');
        }
        if($dados['tipos']!=null){
            $imoveis = $imoveis->whereIn('tipo_id',$dados['tipos']);
        }
        if($dados['cidade']!=null){
            $imoveis = $imoveis->where('cidade',$dados['cidade']);
        }
        if($dados['bairros']!=null){
            $imoveis = $imoveis->whereIn('bairro',$dados['bairros']);
        }
        if($dados['garagens']!=null){
            if($dados['garagens']=='sim'){
                $imoveis = $imoveis->where('garagens','>=',1);
            }elseif($dados['garagens']=='não'){
                $imoveis = $imoveis->where('garagens',0);
            }        
        }
        $imoveis = $imoveis->paginate(9);
        // return $imoveis;
        return view('pesquisa',compact('dados','imoveis','imoveisall','ImoveisTipo'));
    }

    public function contato(){
        $type = 'contato';
        return view('contato',compact('type'));
    }
    public function anuncie(){
        $type = 'anuncie';
        return view('contato',compact('type'));
    }
}
