<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Negotiation extends Model
{
    public function interessado()
    {
        return $this->belongsTo('App\Interessado','cliente_id');
    }
}
