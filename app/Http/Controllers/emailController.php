<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

class emailController extends Controller
{

    public function email(request $r)
    {
        $dados['nome'] = $r->input('nome');
        $dados['email'] = $r->input('email');
        $dados['telefone'] = $r->input('telefone');
        $dados['mensagem'] = $r->input('mensagem');
        $dados['assunto'] = $r->input('assunto');

        // $emailsend = Mail::send('email.email', ['email' => $dados['email'], 
        //     'assunto' => $dados['assunto'], 'telefone' => $dados['telefone'], 
        //     'nome' => $dados['nome'],'mensagem' => $dados['mensagem']], 
        //     function ($message) use ($dados){
        //         $message->from($dados['email'], $dados['nome']);
        //         $message->replyTo($dados['email'], $dados['nome']);
        //         $message->to('evertoniee@yahoo.com.br');
        //         $message->subject($dados['assunto']);
        //     }
        // );


        $r->session()
            ->flash('msg', 'Mensagem enviada com sucesso!');
        return redirect(url()
            ->previous());
    }

}
