<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class emailController extends Controller
{

    public function email(request $r)
    {
        $dados['nome'] = $r->input('nome');
        $dados['email'] = $r->input('email');
        $dados['telefone'] = $r->input('telefone');
        $dados['mensagem'] = $r->input('mensagem');
        $dados['assunto'] = $r->input('assunto');
        $r->session()
            ->flash('msg', 'Mensagem enviada com sucesso!');
        return redirect(url()
            ->previous());
    }

}
