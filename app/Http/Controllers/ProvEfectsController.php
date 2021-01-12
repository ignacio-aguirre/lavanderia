<?php

namespace App\Http\Controllers;

use App\ProvEfects;
use App\Proveedores;
use App\Efectores;
use Illuminate\Http\Request;


class ProvEfectsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create($proveedor_id)
    {
        //
        $proveedor=Proveedores::find($proveedor_id);
        $efectores = Efectores::orderBy('estructura_id','ASC')->
        orderBy('descripcion','ASC')->get();
        $provefects=provEfects::where('proveedor_id','=',$proveedor_id)->get();
       return view('pefectores/create',compact('efectores','provefects','proveedor'));
    }
    public function asignar($proveedor,$efector){
        ProvEfects::create(['proveedor_id' => $proveedor,'efector_id' => $efector]);
        return redirect('/proveedores/efectores/'.$proveedor);
    }
    /**
    
    /*
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
     * @param  \App\ProvEfects  $provEfects
     * @return \Illuminate\Http\Response
     */
    public function show($efector)
    {
       $provefects=ProvEfects::join('proveedores','prov_efects.proveedor_id','=','proveedores.id')->where('efector_id',$efector)->orderBy('descripcion','ASC')->select('proveedor_id','descripcion')->get();
       $opciones="";
       foreach($provefects as $item){
        $opciones=$opciones."<option value='".$item->proveedor_id."'>".$item->descripcion."</option>";
       }
        return $opciones;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProvEfects  $provEfects
     * @return \Illuminate\Http\Response
     */
    public function edit(ProvEfects $provEfects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProvEfects  $provEfects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProvEfects $provEfects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProvEfects  $provEfects
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provefec=ProvEfects::find($id);
        $proveedor=$provefec->proveedor_id;
        $provefec->delete();
        return redirect('/proveedores/efectores/'.$proveedor);
    }
}
