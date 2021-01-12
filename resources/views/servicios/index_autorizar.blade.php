@extends('layouts.app')
@section('content')
<div class="container">
<h2>Servicios a Autorizar</h2>
<div class="table-responsive">
<table class="table">
	<thead>
		<tr class="bg-primary" style="font-size: .8em"><th>Id</th><th>Proveedor</th><th>Efector</th><th>Fecha</th><th>Horario</th><th>Concepto</th><th>Observaciones</th><th>Acciones</th></tr>
	</thead>
	<tbody>	
@foreach($servicios as $item)
 	<tr style="font-size: .8em">
 		<td>
 		@if($item->ciclico==1)
 			{{ $item->id }} - {{$item->servicio_id}}
 		@else
 			{{ $item->id }}
 		@endif	
 		</td>
 		<td>{{ $item->proveedor }}</td>
 		<td>{{ $item->efector}}</td> 
 		<td>{{substr($item->fecha,-2)."/".substr($item->fecha,5,2)."/".substr($item->fecha,0,4)}}</td>
 		<td>{{substr($item->hora_desde,0,5)."-".substr($item->hora_hasta,0,5)}}</td><td>{{$item->descripcion}}</td>
 		
 		
    <td style='font-size:.8em'>{{$item->articulos}}&nbsp;{{$item->observaciones}}
 	</td><td>
 		@if ($item->estado==1)
 		<a class="btn btn-sm btn-primary" title="Editar" href="/servicios/editar/{{ $item->id }}">Editar</a>&nbsp;
 		@endif
 		
 		@if ($item->estado==4)
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