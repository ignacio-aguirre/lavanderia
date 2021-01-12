@extends('layouts.app')
@section('content')
<div class="container">
	<h2>Observar servicio</h2>
	Proveedor <strong>{{$servicio[0]->proveedor}}</strong><br>
	Fecha <strong>{{ ffec($fechaservicio->fecha) }}</strong><br>
	Efector <strong>{{$efector}}</strong><br>
	Concepto <strong>{{$servicio[0]->concepto}}</strong><br>
	Horario <strong>{{substr($fechaservicio->hora_desde,0,5)."-".substr($fechaservicio->hora_hasta,0,5)}}</strong><br>
	Horas <strong>{{$fechaservicio->horas}}</strong><br>
	Personas <strong>{{$fechaservicio->personas}}</strong><br>
	Artículos <strong>{{ $fechaservicio->articulos}}</strong>
	
	
	<hr>
	<form class="form-inline" method="post" action="/servicios/observar">
	 {{ csrf_field() }}
			
		
		<div class="form-group has-warning">
			<label class="label-form" for="observaciones">Motivo de Observación</label>
			<input class="form-control" name="observaciones" id="observaciones" size="150" maxlength="400" required autofocus>
		</div>
		<input hidden id="servicio_id" name="servicio_id" value="{{$fechaservicio->servicio_id}}">
		<input hidden id="id" name="id" value="{{$fechaservicio->id}}">
						
		<hr>	
		<button class="form-control btn btn-warning" type="submit">Observar</button>
	</form>
</div>
<?php
function ffec($fecha){
  return substr($fecha,-2)."/".substr($fecha,5,2)."/".substr($fecha,0,4);
}
?>
@endsection