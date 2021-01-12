@extends('layouts.app')
@section('content')
<div class="container">
<h2>Registrar Entrada de Lavandería</h2>
<div class="table-responsive">
	<table class="table">
		<tr class="bg-primary"><th>Id</th><th>Fecha</th><th>Concepto</th><th>Bultos</th><th>Pendientes</th><th>Ingresan</th></tr>
		@foreach($salidas as $item)
			<tr><td>{{$item->id}}</td><td>{{$item->fecha}}</td><td>{{$item->concepto}}</td>
				<td>{{$item->bultos}}</td><td>{{$item->bultos-$item->devueltos}}</td>
				<td><form class="form" method="post" action="/entrada/nueva">
					{{ csrf_field() }}
					<input class="form-control" name="bultos" size="3" maxlength="3" type="number" min="1" max="{{$item->bultos-$item->devueltos}}">
					<input name="proveedor_id" value="{{$proveedor_id}}" hidden>
					<input name="efector_id" value="{{$efector_id}}" hidden>
					<input name="fecha" value="{{$fecha}}" hidden>
					<input name="movimiento_origen" value="{{$item->id}}" hidden>
					<input name="remito" value="{{$remito}}" hidden>
					
					<button class="btn-primary">Registrar</button>
				</form></td></tr>
		@endforeach	
	</table>
</div>
</div>
@endsection