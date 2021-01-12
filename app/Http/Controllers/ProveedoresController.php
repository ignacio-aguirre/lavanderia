<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedores;

class ProveedoresController extends Controller
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
        $proveedores=Proveedores::orderBy('descripcion','ASC')->get();
        return view('proveedores/index',compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores/create');
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
        $proveedor=Proveedores::create($request->all());
        return redirect('/proveedores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \projectName\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedores $proveedores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        //
        $proveedor=Proveedores::find($id);
        return view('proveedores/edit',compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \projectName\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $proveedor=Proveedores::find($request->id);
        $proveedor->update(["descripcion" => $request->descripcion,"cuit" => $request->cuit]);
        return redirect('/proveedores');
    }

    public function eliminar($id)
    {
        //
        $proveedor=Proveedores::find($id);
        return view('proveedores/eliminar',compact('proveedor'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \projectName\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        //
        Proveedores::find($request->id)->delete();
        return redirect('/proveedores/');
    }
}
