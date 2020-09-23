<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cliente extends Model
{
    protected $rules = [
        'email' => 'email|unique:clientes,email',
        'fone' => 'unique:clientes,fone',
        'wpp' => 'unique:clientes,wpp',
    ];
}
