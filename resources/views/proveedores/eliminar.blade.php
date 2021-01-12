@extends('layouts.app')
@section('content')
<div class="container">
<h2>Eliminar Proveedor</h2>
<form class="form" method="post" action="/proveedores/eliminar_do">
	{{ csrf_field() }}
	{{ $proveedor->descripcion }}<br>
	<p class="text-primary">Si no estás seguro de Eliminar este Proveedor, presioná (atrás)</p>
	<p class="text-warning">Al presionar (Eliminar) se eliminará definitivamente este Proveedor</p>
	
	<input hidden name="id" value="{{ $proveedor->id }}">
	<button class="form-control btn-danger" type="submit">Eliminar</button>
</form>
</div>
@endsection