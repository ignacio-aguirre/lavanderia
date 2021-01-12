@extends('layouts.app')
@section('content')
<div class="container">
<h2>Enviar Mensaje a Unidad de Servicio</h2>
<form class="form" method="post" action="/NPA/enviar">
	{{ csrf_field() }}
	<input name="pedido" id="pedido" value="{{$pedido->id}}" hidden required>
	<button class="btn btn-primary" type="submit">Enviar</button>
	<button class="btn btn-warning" onclick='navega("/pedidos/pendientes")'>Menú</button>
</form>
</div>
@endsection