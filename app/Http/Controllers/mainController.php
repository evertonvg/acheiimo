<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImoveisTipo;
use App\Imovei;
use TCG\Voyager\Traits\Resizable;

class mainController extends Controller
{
    public function index(){

        $ImoveisTipo = ImoveisTipo::all();
        $imoveis = Imovei::all();
        $imoveisdestaque = Imovei::where('destaque',true)->where('publicar',true)->with('tipo')->limit(5)->get();
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
            'maxvalue'=>(int)$r->input('maxvalue').'00',
            'minvalue'=>(int)$r->input('minvalue').'00'
        ];
        // return $dados;
        $imoveis = Imovei::where('publicar',true)->with('tipo')->with('caracteristicas')->whereBetween('valor_venda_float',[$dados['minvalue'],$dados['maxvalue']])->where('dormitorios','>=',$dados['dormitorios']);
        $dados['maxvalue']=substr($dados['maxvalue'],0,-2);
        $dados['minvalue']=substr($dados['minvalue'],0,-2);
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

        return view('pesquisa',compact('dados','imoveis','imoveisall','ImoveisTipo'));
    }

    public function imovel($id){
        // $type = 'contato';
        $imovel = Imovei::with('tipo')->with('caracteristicas')->with('iptu')->find($id);
        if($imovel){
            return view('imovel',compact('imovel'));
        }
        else{
            return view('notfound');
        }
    }

    public function contato(){
        $type = 'Fale Conosco';
        return view('contato',compact('type'));
    }
    public function anuncie(){
        $type = 'Anuncie';
        return view('contato',compact('type'));
    }
    public function imobiliaria(){
        return view('imobiliaria');
    }
}
