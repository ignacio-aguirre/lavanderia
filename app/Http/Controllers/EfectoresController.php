<?php

namespace App\Http\Controllers;

use App\Efectores;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class EfectoresController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $client = new Client([
        'base_uri' => 'http://efectores.dgnya.com.ar/api/',]);
        $response = $client->request('GET', 'efectores?api_token=LSSg1vxGkrn0QnMGWWzzgUZMwTAgGSYpL7XRuX4ogdsLvB2E5szKcpf8JsDsXY0HZh7TBPxTWFP2o3Zj',['verify' => false,'Content-type' => 'application/json']);
        $efectores = json_decode($response->getBody());
        $anteriores=Efectores::all();
        foreach($anteriores as $item){
            $item->delete();
        };
        foreach($efectores as $item){
            $efector=New Efectores;
            $efector->id_api=$item->id;
            $efector->descripcion=$item->descripcion;
            $efector->estructura_id=$item->estructura_id;
            $efector->save();
        }
        return redirect('/home/tablas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Efectores  $efectores
     * @return \Illuminate\Http\Response
     */
    public function show(Efectores $efectores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Efectores  $efectores
     * @return \Illuminate\Http\Response
     */
    public function edit(Efectores $efectores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Efectores  $efectores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Efectores $efectores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Efectores  $efectores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Efectores $efectores)
    {
        //
    }
}
