<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Interessado extends Model
{
    protected $rules = [
        'email' => 'email|unique:interessados,email',
        'fone' => 'unique:interessados,fone',
        'wpp' => 'unique:interessados,wpp',
    ];
}
