@extends('layouts.app')
@section('content')
<div class="container">
<h2>Agregar Feriado</h2>
{{ substr($fecha,-2)."/".substr($fecha,4,2)."/".substr($fecha,0,4) }}
<form class="form-inline" method="post" action="/feriados/agregar_do">
		{{ csrf_field() }}
	<div class="form_group has-warning">
		<label class="label-form">Descripción del Feriado</label>
		<input class="form-control" id="feriado_descripcion" name="feriado_descripcion" size="60" maxlength="60" autofocus required>
	</div>
	<input name="fecha" value="{{$fecha}}" hidden>
	<button class="btn btn-primary">Agregar Feriado</button>	
</form>	
</div>

@endsection