@extends('layouts.app')
@section('content')
<div class="container">
<h2>Nuevo Concepto</h2>
<form class="form" method="post" action="nuevo_do">
	{{ csrf_field() }}
	<div class="form-group has-warning">
		<label class="label-form" for="descripcion">Descripción</label>
		<input class="form-control" size="200" maxlength="200" name="descripcion" id="descripcion" required autofocus>
	</div>
	<button class="form-control btn-primary" type="submit">Crear</button>
</form>
</div>
@endsection
