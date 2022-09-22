<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProizvodCollection;
use App\Http\Resources\ProizvodResource;
use App\Models\Proizvod;
//use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProizvodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proizvodi = Proizvod::all();

        return new ProizvodCollection($proizvodi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'ime' => 'required|String|max:255',
            'cena' => 'required|between:0,100000',
            'proizvodjac_id' => 'required',
            'tip_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $proizvod = new Proizvod;
        $proizvod->ime = $request->ime;
        $proizvod->cena = $request->cena;
        $proizvod->proizvodjac_id= $request->proizvodjac_id;
        $proizvod->tip_id= $request->tip_id;

        if($proizvod->save()){
            return response()->json(['Proizvod je uspesno sacuvan!', new ProizvodResource($proizvod)]);
        }

        return response()->json('Proizvod nije sacuvan..', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proizvod  $proizvod
     * @return \Illuminate\Http\Response
     */
    public function show(Proizvod $proizvod)
    {
        return new ProizvodResource($proizvod);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proizvod  $proizvod
     * @return \Illuminate\Http\Response
     */
    public function edit(Proizvod $proizvod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proizvod  $proizvod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proizvod $proizvod)
    {
        //
    }

    /**
     * Remove the specified resource from storage
     * 
     *
     * @param  \App\Models\Proizvod  $proizvod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proizvod $proizvod)
    {
        if($proizvod->delete()){
            return response()->json('Proizvod je uspesno obrisan!');
        }

        return response()->json('Proizvod nije obrisan..', 500);
    }
}
