<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MensajeNuevoPedidoAutorizado;
use App\Pedidos;
use App\Uniser;

class MensajeNPAController extends Controller
{
    public function NuevoPedido($id){
        $pedido=Pedidos::find($id);
        return view('emails.crearNPA',compact('pedido'));
    }


    public function Send()
    {
        $pedido=Pedidos::find(request()->pedido);
        $uniser=Uniser::find($pedido->servicio_id);
        Mail::to($uniser->email)->send(new MensajeNuevoPedidoAutorizado(request()));
    	return redirect("/pedidos/pendientes");
    }
}
