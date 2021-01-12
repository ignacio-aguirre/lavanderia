@extends('layouts.app')
@section('content')
<div class="container">
<h2>Eliminar Concepto</h2>
<form class="form" method="post" action="/conceptos/eliminar_do">
	{{ csrf_field() }}
	{{ $concepto->descripcion }}<br>
	<p class="text-primary">Si no estás seguro de Eliminar este Concepto, presioná (atrás)</p>
	<p class="text-warning">Al presionar (Eliminar) se eliminará definitivamente este Concepto</p>
	
	<input hidden name="id" value="{{ $concepto->id }}">
	<button class="form-control btn-danger" type="submit">Eliminar</button>
</form>
</div>
@endsection