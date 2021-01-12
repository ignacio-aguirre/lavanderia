<?php

namespace App\Http\Controllers;

use App\User;
use App\UserEfec;
use App\Efectores;
use Illuminate\Http\Request;


class UserEfecController extends Controller
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
    public function create($usuario_id)
    {
        //
        $usuario=User::find($usuario_id);
        $estructura=$usuario->estructura_id;
        $efectores=Efectores::where('estructura_id',$estructura)->orderBy('descripcion','ASC')->get();
        $userefects=UserEfec::where('usuario_id','=',$usuario_id)->get();
        return view('uefectores/create',compact('efectores','userefects','usuario'));
    }
    public function asignar($usuario,$estructura){
        UserEfec::create(['usuario_id' => $usuario,'estructura_id' => $estructura]);
        return redirect('/usuarios/efectores/'.$usuario);
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
     * @param  \App\UserEfec  $userEfec
     * @return \Illuminate\Http\Response
     */
    public function show(UserEfec $userEfec)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserEfec  $userEfec
     * @return \Illuminate\Http\Response
     */
    public function edit(UserEfec $userEfec)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserEfec  $userEfec
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserEfec $userEfec)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserEfec  $userEfec
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $userefec=UserEfec::find($id);
        $usuario=$userefec->usuario_id;
        $userefec->delete();
        return redirect('/usuarios/efectores/'.$usuario);
    }
}
