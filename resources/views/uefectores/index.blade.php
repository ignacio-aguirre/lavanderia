@extends('layouts.app')
@section('content')
<div class="container">
<h2>Efectores por Usuario</h2>
<button class="btn btn-primary" onclick="navega('/usuarios_efectores/nuevo')">Nuevo</button><br><br>
<div class="table-responsive">
<table class="table">
	<thead>
		<tr class="bg-primary"><th>Usuario</th><th>Efector</th><th>Acciones</th></tr>
	</thead>
	<tbody>	
@foreach($uefectores as $item)
 	<tr><td>{{ $item->usuario }}</td><td>{{ $item->efector }}</td><td><a class="btn btn-danger" title="Eliminar" href="usuarios_efectores/eliminar/{{ $item->id }}">Eliminar</a></td></tr>
@endforeach
</tbody>
</table>
</div>
</div>
@endsection