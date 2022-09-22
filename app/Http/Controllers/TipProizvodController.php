<?php

namespace App\Http\Controllers;

use App\Models\Proizvod;
use Illuminate\Http\Request;

class TipProizvodController extends Controller
{
    public function index($tip_id) {
        $proizvodi = Proizvod::get()->where('tip_id', $tip_id);

        if(is_null($proizvodi)){
            return response()->json('Data not found', 404);
        }

        return response()->json($proizvodi);
        //return new ProizvodCollection($proizvodi);

    }
}
