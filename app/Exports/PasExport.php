<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Pedidos;
use App\User;
use DB;

class PasExport implements FromView
{
    
    public function view():View
    {
        $uniser=User::find(auth()->user()->id)->servicio_id;
      	$pedidos=DB::table('pedidos')
            ->leftjoin('efectores', 'efectores.id', '=', 'efector_id')
            ->select('pedidos.fecha', 'efectores.descripcion as efector','efectores.domicilio as domicilio','pedidos.comentarios','pedidos.estado','pedidos.descripcion','pedidos.rubro')
            ->whereNull('pedidos.deleted_at')
            ->where('pedidos.estado','2')
            ->where('pedidos.servicio_id',$uniser)
            ->orderBy('fecha','DESC')
            ->get();
      	return view('exports.pedidos_aasignar',compact('pedidos'));
  		

    }
}
