<?php

namespace App\Http\Controllers;

use App\ServiciosEstados;
use App\FechasServicios;
use App\Servicios;
use Illuminate\Http\Request;

class ServiciosEstadosController extends Controller
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
    public function create($id)
    {
        //
        $estado=Servicios::find($id)->estado;
        $tipousuario=auth()->user()->tipo;
        $servicios=FechasServicios::where('servicio_id',$id)->get();
        foreach($servicios as $item){
            $servestado=new ServiciosEstados;
            $servestado->servicio_id=$item->id;
            $servestado->usuario_id=auth()->user()->id;
            $servestado->estado=$estado;
            $servestado->save();
        };
        if($tipousuario==1) {return redirect('/home');};
        return redirect('/home/servicios');
    }

    public function create_individual($idfs,$estado){
        $tipousuario=auth()->user()->tipo;
        $servicio=FechasServicios::where('id',$idfs)->get();
        $servestado=new ServiciosEstados;
        $servestado->servicio_id=$idfs;
        $servestado->usuario_id=auth()->user()->id;
        $servestado->estado=$estado;
        $servestado->save();
        if($tipousuario==1) {return redirect('/home');};
        return redirect('/home/servicios');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiciosEstados  $serviciosEstados
     * @return \Illuminate\Http\Response
     */
    public function show(ServiciosEstados $serviciosEstados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiciosEstados  $serviciosEstados
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiciosEstados $serviciosEstados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiciosEstados  $serviciosEstados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiciosEstados $serviciosEstados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiciosEstados  $serviciosEstados
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiciosEstados $serviciosEstados)
    {
        //
    }
}
