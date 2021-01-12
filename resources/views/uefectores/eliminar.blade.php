@extends('layouts.app')
@section('content')
<div class="container">
<h2>Eliminar Efector de un Usuario</h2>
<form class="form" method="post" action="/usuarios_efectores/eliminar_do">
	{{ csrf_field() }}
	Usuario&nbsp;{{ $usuario->name }}<br>
	Efector&nbsp;{{ $efector->descripcion }}<br>
	<p class="text-primary">Si no estás seguro de Eliminar este Efector del Usuario, presioná (atrás)</p>
	<p class="text-warning">Al presionar (Eliminar) se eliminará definitivamente este Efector del Usuario</p>
	<input hidden name="id" value="{{ $uefector->id }}">
	<button class="form-control btn-danger" type="submit">Eliminar</button>
</form>
</div>
@endsection