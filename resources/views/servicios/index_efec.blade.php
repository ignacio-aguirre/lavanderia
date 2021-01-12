@extends('layouts.app')
@section('content')
<div class="container">
<h2>Servicios Programados</h2>
<h4>Efector {{$efector}} - Desde {{ffec($fecha_desde)}} - Hasta {{ffec($fecha_hasta)}}</h4>

<div class="table-responsive">
<table class="table">
	<thead>
		<tr class="bg-primary"><th>Id</th><th>Proveedor</th><th>Fecha</th><th>Horario</th><th>Concepto</th><th>Estado</th><th>Observaciones</th><th>Acciones</th></tr>
	</thead>
	<tbody>	
@foreach($servicios as $item)
 	<tr>
 		<td>
 		@if($item->ciclico==1)
 			{{ $item->id }} - {{$item->servicio_id}}
 		@else
 			{{ $item->id }}
 		@endif	
 		</td>
 		<td>{{ $item->proveedor }}</td>
 		<td>{{ ffec($item->fecha)}}</td><td>{{substr($item->hora_desde,0,5)."-".substr($item->hora_hasta,0,5)}}</td><td>{{$item->descripcion}}</td><td>
 		@if($item->estado==1)
 			@if($item->dias>0)
 			 Programado
 			@else
 			 Realizado
 			@endif 
 		@endif
		@if($item->estado==2)
 			Observado
 		@endif
 		@if($item->estado==3)
 			Cancelado
 		@endif
 		@if($item->estado==4)
 			Solicitado
 		@endif
 		
 		
    </td><td style='font-size:.8em'>{{$item->articulos}}&nbsp;{{$item->observaciones}}
 	</td><td>
 		@if ($item->estado==1 && $item->dias>0 && $tipousuario>1)
 		<a class="btn btn-sm btn-primary" title="Editar" href="/servicios/editar/{{ $item->id }}">Editar</a>&nbsp;
 		@endif
 		@if ($item->estado==1 && $item->dias<=0)
 		<a class="btn btn-sm btn-warning" title="Observar" href="/servicios/observar/{{ $item->id }}">Observar</a>&nbsp;
 		@endif
 		@if ($item->estado==4 && $item->dias>0 && $tipousuario>1)
 		<a class="btn btn-sm btn-success" title="Autorizar" href="/servicios/autorizar/{{ $item->id }}">Autorizar</a>&nbsp;
 		@endif
 		
 	</td></tr>
@endforeach
</tbody>
</table>
</div>
</div>
<?php 
  function ffec($fecha){
        return substr($fecha,-2)."/".substr($fecha,5,2)."/".substr($fecha,0,4);
  }
 ?>
@endsection