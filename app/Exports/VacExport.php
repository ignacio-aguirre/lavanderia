<?php
namespace App\Exports;
use App\Pedidos;
use App\User;
use DB;
use Carbon\Carbon;     


use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class VacExport implements FromView
{
    public function view():View
    {
        $uniser=User::find(auth()->user()->id)->servicio_id;
      	$pedidos=DB::table('pedidos')
            ->leftjoin('efectores', 'efectores.id', '=', 'efector_id')
            ->select('pedidos.fecha_programada', 'efectores.descripcion as efector','efectores.domicilio as domicilio','pedidos.comentarios','pedidos.estado','pedidos.descripcion','pedidos.rubro','agentes','agente_recibe','franja_horaria')
            ->whereNull('pedidos.deleted_at')
            ->whereIn('pedidos.estado',[4])
            ->where('pedidos.servicio_id',$uniser)
            ->orderBy('fecha_programada','ASC')
            ->get();
      	return view('exports.visitas_aconfirmar', ['pedidos' => $pedidos ]);
  		
    }
        public function dHoy(){
        $hoy=Carbon::today()->toDateString();
        return str_replace('-','',$hoy);
    }

}
?>