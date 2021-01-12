<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Pedidos;
use App\Efectores;

class MensajeNuevoPedidoAutorizado extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        //
        $this->pedido=$request->pedido;
        $this->asunto=$request->asunto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $dpedido=Pedidos::find($this->pedido);
        $efector=Efectores::find($dpedido->efector_id);
        if($dpedido->rubro==1){$drubro="Falta de Agua";};
        if($dpedido->rubro==2){$drubro="Baños";};
        if($dpedido->rubro==3){$drubro="Calefacción";};
        if($dpedido->rubro==4){$drubro="Electricidad";};
        if($dpedido->rubro==5){$drubro="Puertas";};
        if($dpedido->rubro==6){$drubro="Refrigeración";};
        if($dpedido->rubro==7){$drubro="Vidrios";};
        if($dpedido->rubro==8){$drubro="Gas";};
        if($dpedido->rubro==9){$drubro="Filtraciones y Humedad";};
        if($dpedido->rubro==10){$drubro="Otros";};
        $contenido=["Nuevo Pedido Autorizado (".$this->pedido.")",
        "Efector: ".$efector->descripcion,
        "Domicilio: ".$efector->domicilio,
        "Descripcion: ".$dpedido->descripcion,
        "Rubro: ".$drubro];
        if($dpedido->foto!=""){
            return $this->subject($this->asunto)->attach(public_path()."/storage/".$dpedido->foto)->view('emails.mensaje-enviado')->with(['contenido' => $contenido,]);
        } 
        else{
       return $this->subject($this->asunto)->view('emails.mensaje-enviado')->with(['contenido' => $contenido,]);
            
        }   
    }
}
