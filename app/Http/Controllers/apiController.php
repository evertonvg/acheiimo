<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imovei;

class apiController extends Controller
{

    public function bairro($cidade)
    {
        $imovei=Imovei::where('cidade',$cidade)->get();

        return $imovei;
    }


    


    
}
