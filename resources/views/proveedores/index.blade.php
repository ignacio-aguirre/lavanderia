@extends('layouts.app')
@section('content')
<div class="container">
<h2>Proveedores</h2>

<button class="btn btn-primary" onclick="navega('proveedores/nuevo')">Nuevo</button><br><br>
<div class="table-responsive">
<table class="table">
	<thead>
		<tr class="bg-primary"><th>Descripcion</th><th>CUIT</th><th>Acciones</th></tr>
	</thead>
	
	<tbody>	
    @foreach($proveedores as $item)
	  <tr><td>{{ $item->descripcion }}</td><td>{{ $item->cuit }}</td><td><a class="btn btn-warning" title="Editar" href="/proveedores/editar/{{ $item->id}}">Editar</a>&nbsp;
	  	<a class="btn btn-success" title="Efectores" href="/proveedores/efectores/{{ $item->id}}">Efectores</a>&nbsp;<a class="btn btn-danger" title="Eliminar" href="/proveedores/eliminar/{{ $item->id}}">Eliminar</a></td></tr>
    @endforeach
</tbody>
</table>
</div>
</div>
@endsection
