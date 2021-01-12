@extends('layouts.app')
@section('content')
<div class="container">
<h2>Editar Concepto</h2>
<form class="form" method="post" action="/conceptos/editar_do">
	{{ csrf_field() }}
	<div class="form-group has-warning">
		<label class="label-form" for="descripcion">Descripción</label>
		<input class="form-control" size="200" maxlength="200" name="descripcion" id="descripcion" value="{{ $concepto->descripcion }}" required autofocus>
	</div>
	<input hidden name="id" value="{{ $concepto->id }}">
	<button class="form-control btn-primary" type="submit">Modificar</button>
</form>
</div>
@endsection