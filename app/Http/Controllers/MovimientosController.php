<?php

namespace App\Http\Controllers;

use App\Movimientos;
use App\Efectores;
use App\UserEfec;
use App\ProvEfects;
use App\Conceptos;
use Illuminate\Http\Request;

class MovimientosController extends Controller
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
    public function salida()
    {
        $proveedores=ProvEfects::join('proveedores','proveedor_id','=','proveedores.id')->
        select('proveedores.id','proveedores.descripcion','efector_id')->
        whereRaw('efector_id in (select user_efecs.estructura_id from user_efecs where usuario_id='.auth()->user()->id.")")->orderBy('proveedores.descripcion','ASC')->get();
        $efectores=UserEfec::join('efectores','user_efecs.estructura_id','=','efectores.id_api')->
        where('usuario_id',auth()->user()->id)->select('efectores.id_api','efectores.descripcion')->orderBy('efectores.descripcion','ASC')->get();
        $conceptos=Conceptos::orderBy('descripcion')->get();
        return view('movimientos/salida',compact('proveedores','efectores','conceptos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salida_store(Request $request)
    {
        $movimiento=new Movimientos;
        $movimiento->fecha=$request->fecha;
        $movimiento->efector_id=$request->efector_id;
        $movimiento->proveedor_id=$request->proveedor_id;
        $movimiento->tipo_movimiento="Salida";
        $movimiento->bultos=$request->bultos;
        $movimiento->devueltos=0;
        $movimiento->usuario_id=auth()->user()->id;
        $movimiento->concepto_id=$request->concepto_id;
        $movimiento->save();
        return redirect('/home');
    }

    public function entrada()
    {
        $proveedores=ProvEfects::join('proveedores','proveedor_id','=','proveedores.id')->
        select('proveedores.id','proveedores.descripcion','efector_id')->
        whereRaw('efector_id in (select user_efecs.estructura_id from user_efecs where usuario_id='.auth()->user()->id.")")->orderBy('proveedores.descripcion','ASC')->get();
        $efectores=UserEfec::join('efectores','user_efecs.estructura_id','=','efectores.id_api')->
        where('usuario_id',auth()->user()->id)->select('efectores.id_api','efectores.descripcion')->orderBy('efectores.descripcion','ASC')->get();
        return view('movimientos/entrada',compact('proveedores','efectores'));
    }

    public function entrada_detalle(Request $request)
    {
        $salidas=Movimientos::where('proveedor_id',$request->proveedor_id)->
        where('efector_id',$request->efector_id)->
        where('tipo_movimiento','Salida')->whereRaw('devueltos<bultos')->
        join('conceptos','concepto_id','=','conceptos.id')->
        select('movimientos.*','conceptos.descripcion as concepto')->
        orderBy('fecha','ASC')->get();
        if(count($salidas)==0){return redirect('/home');};
        return view('movimientos/entrada_detalle',compact('salidas'))->with(['proveedor_id'=>$request->proveedor_id,'efector_id'=>$request->efector_id,'fecha'=>$request->fecha,'remito'=>$request->remito]);
    }

    public function entrada_store(Request $request)
    {
        
        $movimiento_origen=Movimientos::find($request->movimiento_origen);
        $concepto=$movimiento_origen->concepto_id;
        $movimiento_origen->devueltos=$movimiento_origen->devueltos+$request->bultos;
      
        $movimiento_origen->save();
        $movimiento=new Movimientos;
        $movimiento->fecha=$request->fecha;
        $movimiento->efector_id=$request->efector_id;
        $movimiento->proveedor_id=$request->proveedor_id;
        $movimiento->tipo_movimiento="Entrada";
        $movimiento->bultos=$request->bultos;
        $movimiento->devueltos=0;
        $movimiento->usuario_id=auth()->user()->id;
        $movimiento->movimiento_origen=$request->movimiento_origen;
        $movimiento->remito=$request->remito;
        $movimiento->concepto_id=$concepto;
        $movimiento->save();
        $salidas=Movimientos::where('proveedor_id',$request->proveedor_id)->
        where('efector_id',$request->efector_id)->
        where('tipo_movimiento','Salida')->whereRaw('devueltos<bultos')->
        join('conceptos','concepto_id','=','conceptos.id')->
        select('movimientos.*','conceptos.descripcion as concepto')->
        orderBy('fecha','ASC')->get();
        if(count($salidas)==0){return redirect('/home');};
        return view('movimientos/entrada_detalle',compact('salidas'))->with(['proveedor_id'=>$request->proveedor_id,'efector_id'=>$request->efector_id,'fecha'=>$request->fecha,'remito'=>$request->remito]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Movimientos  $movimientos
     * @return \Illuminate\Http\Response
     */
    public function show(Movimientos $movimientos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movimientos  $movimientos
     * @return \Illuminate\Http\Response
     */
    public function edit(Movimientos $movimientos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movimientos  $movimientos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movimientos $movimientos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movimientos  $movimientos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movimientos $movimientos)
    {
        //
    }
}
