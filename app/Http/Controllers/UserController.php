<?php

namespace App\Http\Controllers;



use App\User;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
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
         $client = new Client([
        'base_uri' => 'http://efectores.dgnya.com.ar/api/',]);
        $response = $client->request('GET', 'estructuras?api_token=LSSg1vxGkrn0QnMGWWzzgUZMwTAgGSYpL7XRuX4ogdsLvB2E5szKcpf8JsDsXY0HZh7TBPxTWFP2o3Zj',['verify' => false,'Content-type' => 'application/json']);
       $estructuras = json_decode($response->getBody());
       $usuarios=DB::table('users')->
        select('users.*')->orderBy('name')->get();
        return view('users/index',compact('usuarios','estructuras'));
    }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       $usuario=User::find($id);
       $client = new Client([
        'base_uri' => 'http://efectores.dgnya.com.ar/api/',]);
        $response = $client->request('GET', 'estructuras?api_token=LSSg1vxGkrn0QnMGWWzzgUZMwTAgGSYpL7XRuX4ogdsLvB2E5szKcpf8JsDsXY0HZh7TBPxTWFP2o3Zj',['verify' => false,'Content-type' => 'application/json']);
       $estructuras = json_decode($response->getBody());
       return view('users/edit',compact('usuario','estructuras'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        User::where('id',$request->id)->update(["name" => $request->name,"email" => $request->email,"password" => bcrypt($request->password),"cuil" => $request->cuil, "tipo" => $request->tipo, "estructura_id" => $request->estructura_id]);
        return redirect('/usuarios/');
   
    }

    public function eliminar($id){
        $usuario=User::find($id);
        return view("users/eliminar",compact('usuario'));
    }

    public function destroy(Request $request)
    {
        //
        User::find($request->id)->delete();
        return redirect('/usuarios/');
    }
    //revisar si está en uso la siguiente función
    public function tipodeusuario(){
        $idusuario=auth()->user()->id;
        return User::find($idusuario)->tipo;
    }
}
