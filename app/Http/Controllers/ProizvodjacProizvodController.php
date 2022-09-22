<?php

namespace App\Http\Controllers;

use App\Models\Proizvod;
use Illuminate\Http\Request;

class ProizvodjacProizvodController extends Controller
{
    public function index($proizvodjac_id) {
        $proizvodi = Proizvod::get()->where('proizvodjac_id', $proizvodjac_id);

        if(is_null($proizvodi)){
            return response()->json('Data not found', 404);
        }

        return response()->json($proizvodi);
        //return new ProizvodCollection($proizvodi);

    }
}
