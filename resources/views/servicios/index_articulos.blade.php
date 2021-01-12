@extends('layouts.app')
@section('content')
<div class="container">
<h2>Insumos Entregados o Programados</h2>
<h4>Proveedor {{$proveedor}} - Desde {{ffec($fecha_desde)}} - Hasta {{ffec($fecha_hasta)}}</h4>

<div class="table-responsive">
<table class="table">
	<thead>
		<tr class="bg-primary"><th>Efector</th><th>Artículos</th></tr>
	</thead>
	<tbody>	
@foreach($servicios as $item)
 	<tr><td>{{ $item->efector}}</td><td>{{$item->articulos}}</td></tr>
 	
@endforeach
</tbody>
</table>
</div>
</div>
<?php function ffec($fecha){
        return substr($fecha,-2)."/".substr($fecha,5,2)."/".substr($fecha,0,4);
    }?>
@endsection