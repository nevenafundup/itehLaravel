<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProizvodResource;
use App\Models\Proizvod;
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
        return ProizvodResource::collection(Proizvod::all());
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
        $validator = Validator::make($request->all(), [
            'naziv' => 'required|string|max:15',
            'opis' => 'required|string|max:100',
            'cena' => 'required', 
            'kategorija' => 'required',
             
             
        ]);

        if ($validator->fails()) 
            return response()->json($validator->errors());
        $p = Proizvod::create([
            'naziv' => $request->naziv, 
            'opis' => $request->opis, 
            'cena' => $request->cena,
            'kategorija' => $request->kategorija, 

        ]);
        $p->save();
        return response()->json(['Proizvod je  kreiran', new ProizvodResource($p)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proizvod  $proizvod
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ProizvodResource(Proizvod::find($id));
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
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'naziv' => 'string|max:15',
            'opis' => 'string|max:100',
            'cena' => '', 
            'kategorija' => '',
             
             
        ]);

        if ($validator->fails()) 
            return response()->json($validator->errors());
        $p = Proizvod::find($id);
        if($p){
            $p->naziv=$request->naziv;
            $p->opis=$request->opis;
            $p->cena=$request->cena;
            $p->kategorija=$request->kategorija;
            $p->save();
            return response()->json( ["Uspesno izmenjeno!",new ProizvodResource($p)]);
        }else{
            return response()->json("Objekat ne postoji u bazi");
        }
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proizvod  $proizvod
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Proizvod::find($id);
        if($p){
            $p->delete();
            return response()->json("Objekat uspesno obrisan");
        }else{
            return response()->json("Objekat ne postoji u bazi");
        }
    }
}
