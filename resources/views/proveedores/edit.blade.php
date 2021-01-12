@extends('layouts.app')
@section('content')
<div class="container">
<h2>Editar Proveedor</h2>
<form class="form" method="post" action="/proveedores/editar_do">
	{{ csrf_field() }}
	<div class="form-group has-warning">
		<label class="label-form" for="descripcion">Descripción</label>
		<input class="form-control" size="200" maxlength="200" name="descripcion" id="descripcion" value="{{ $proveedor->descripcion }}" required autofocus>
	</div>
	<div class="form-group has-warning">
		<label class="label-form" for="cuit">CUIT</label>
		<input class="form-control" size="11" maxlength="11" name="cuit" id="cuit" value="{{ $proveedor->cuit }}" required|autofocus onblur='vCuit(this.id)'>
	</div>
	<input hidden name="id" value="{{ $proveedor->id }}">
	<button class="form-control btn-primary" type="submit">Modificar</button>
</form>
</div>
@endsection