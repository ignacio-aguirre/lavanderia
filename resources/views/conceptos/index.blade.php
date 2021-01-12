@extends('layouts.app')
@section('content')
<div class="container">
<h2>Conceptos</h2>

<button class="btn btn-primary" onclick="navega('conceptos/nuevo')">Nuevo</button><br><br>
<div class="table-responsive">
<table class="table">
	<thead>
		<tr class="bg-primary"><th>Descripcion</th><th>Acciones</th></tr>
	</thead>
	
	<tbody>	
    @foreach($conceptos as $item)
	  <tr><td>{{ $item->descripcion }}</td><td><a class="btn btn-warning" title="Editar" href="/conceptos/editar/{{ $item->id}}">Editar</a>&nbsp;<a class="btn btn-danger" title="Eliminar" href="/conceptos/eliminar/{{ $item->id}}">Eliminar</a></td></tr>
    @endforeach
</tbody>
</table>
</div>
</div>
@endsection
