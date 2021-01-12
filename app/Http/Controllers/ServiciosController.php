<?php

namespace App\Http\Controllers;

use App\Servicios;
use App\Proveedores;
use App\Conceptos;
use App\UserEfec;
use App\Efectores;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    public function create()
    {
        //
        $conceptos=Conceptos::orderBy('descripcion')->get();        
        $efectores=Efectores::orderBy('estructura_id','ASC')->
        orderBy('descripcion','ASC')->get();
        return view('servicios/programar',compact('efectores','conceptos'));
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
        $servicio=Servicios::create($request->all());
        return redirect('/servicios/fechas/'.$servicio->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */

    public function create_puntual()
    {
        //
        
        $conceptos=Conceptos::orderBy('descripcion')->get();        
        $efectores = Efectores::orderBy('estructura_id','ASC')->
        orderBy('descripcion','ASC')->get();
        return view('servicios/create',compact('efectores','conceptos'));
    }

    public function store_puntual(Request $request)
    {
        //
        $servicio=new Servicios;
        $servicio->proveedor_id=$request->proveedor_id;
        $servicio->efector_id=$request->efector_id;
        $servicio->fecha_desde=$request->fecha;
        $servicio->fecha_hasta=$request->fecha;
        $servicio->concepto_id=$request->concepto_id;
        $servicio->hora_desde_lav=$request->hora_desde;
        $servicio->hora_hasta_lav=$request->hora_hasta;
        $servicio->horas_lav=$request->horas;
        $servicio->personas_lav=$request->personas;
        $servicio->hora_desde_sab='00:00:00';
        $servicio->hora_hasta_sab='00:00:00';
        $servicio->horas_sab=0;
        $servicio->personas_sab=0;
        $servicio->hora_desde_dom='00:00:00';
        $servicio->hora_hasta_dom='00:00:00';
        $servicio->horas_dom=0;
        $servicio->personas_dom=0;
        $servicio->feriados=0;
        $servicio->estado=1;
        $servicio->ciclico=0;
        $servicio->save();
        return redirect('/servicios/fecha_puntual/'.$servicio->id);
    }

    public function solicitar()
    {
        //
        $estructura=auth()->user()->estructura_id;
        $usuario=auth()->user()->id;
        $efectores=Efectores::leftJoin('user_efecs',function($join){
                $idusuario=auth()->user()->id;
                $join->on('user_efecs.estructura_id','=','efectores.id_api')->where('user_efecs.usuario_id',$idusuario);
            })
        ->whereNotNull('user_efecs.id')->get();
        $conceptos=Conceptos::orderBy('descripcion')->get();        
        return view('servicios/solicitar',compact('efectores','conceptos'));
    }

    public function store_solicitar(Request $request)
    {
        //
        $servicio=new Servicios;
        $servicio->proveedor_id=$request->proveedor_id;
        $servicio->efector_id=$request->efector_id;
        $servicio->fecha_desde=$request->fecha;
        $servicio->fecha_hasta=$request->fecha;
        $servicio->concepto_id=$request->concepto_id;
        $servicio->hora_desde_lav=$request->hora_desde;
        $servicio->hora_hasta_lav=$request->hora_hasta;
        $servicio->horas_lav=$request->horas;
        $servicio->personas_lav=$request->personas;
        $servicio->hora_desde_sab='00:00:00';
        $servicio->hora_hasta_sab='00:00:00';
        $servicio->horas_sab=0;
        $servicio->personas_sab=0;
        $servicio->hora_desde_dom='00:00:00';
        $servicio->hora_hasta_dom='00:00:00';
        $servicio->horas_dom=0;
        $servicio->personas_dom=0;
        $servicio->feriados=0;
        $servicio->estado=4;
        $servicio->ciclico=0;
        $servicio->save();
        return redirect('/servicios/fecha_puntual/'.$servicio->id);
    }
    
    public function solicitar_insumos()
    {
        //
        $estructura=auth()->user()->estructura_id;
        $usuario=auth()->user()->id;
        $concepto=Conceptos::whereRaw("descripcion like '%insumos%'")->select('id')->get();        
        $efectores=Efectores::leftJoin('user_efecs',function($join){
                $idusuario=auth()->user()->id;
                $join->on('user_efecs.estructura_id','=','efectores.id_api')->where('user_efecs.usuario_id',$idusuario);
            })
        ->whereNotNull('user_efecs.id')->get();
        return view('servicios/solicitar_insumos',compact('efectores'))->with(['concepto' => $concepto[0]->id]);
    }

    public function store_solicitar_insumos(Request $request)
    {
        //
        $servicio=new Servicios;
        $servicio->proveedor_id=$request->proveedor_id;
        $servicio->efector_id=$request->efector_id;
        $servicio->fecha_desde=$request->fecha;
        $servicio->fecha_hasta=$request->fecha;
        $servicio->concepto_id=$request->concepto_id;
        $servicio->hora_desde_lav="00:00:00";
        $servicio->hora_hasta_lav="00:00:00";
        $servicio->horas_lav=0;
        $servicio->personas_lav=0;
        $servicio->hora_desde_sab='00:00:00';
        $servicio->hora_hasta_sab='00:00:00';
        $servicio->horas_sab=0;
        $servicio->personas_sab=0;
        $servicio->hora_desde_dom='00:00:00';
        $servicio->hora_hasta_dom='00:00:00';
        $servicio->horas_dom=0;
        $servicio->personas_dom=0;
        $servicio->feriados=0;
        $servicio->estado=4;
        $servicio->ciclico=0;
        $servicio->articulos=$request->articulos;
        $servicio->save();
        return redirect('/servicios/fecha_puntual/'.$servicio->id);
    }
    public function show(Servicios $servicios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicios $servicios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicios $servicios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicios $servicios)
    {
        //
    }
}
