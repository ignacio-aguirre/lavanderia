<?php

namespace App\Http\Controllers;

use App\Conceptos;
use Illuminate\Http\Request;

class ConceptosController extends Controller
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
        $conceptos=Conceptos::orderBy('descripcion','ASC')->get();
        return view('conceptos/index',compact('conceptos'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('conceptos/create');
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
        $concepto=Conceptos::create($request->all());
        return redirect('/conceptos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Conceptos  $conceptos
     * @return \Illuminate\Http\Response
     */
    public function show(Conceptos $conceptos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Conceptos  $conceptos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $concepto=Conceptos::find($id);
        return view('conceptos/edit',compact('concepto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Conceptos  $conceptos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $concepto=Conceptos::find($request->id);
        $concepto->update(["descripcion" => $request->descripcion]);
        return redirect('/conceptos');
    }
    public function eliminar($id)
    {
        //
        $concepto=Conceptos::find($id);
        return view('conceptos/eliminar',compact('concepto'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conceptos  $conceptos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        Conceptos::find($request->id)->delete();
        return redirect('/conceptos/');
    }
}
