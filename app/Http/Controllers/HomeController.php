<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserEfec;

use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        	return view('home');
    }
    public function index_tablas()
    {
        $usuario=auth()->user()->id;
        $usua=User::find($usuario);
        return view('home_tablas',compact('usua'));  
    }
    public function index_servicios()
    {    return view('home_servicios');
    }
         
}