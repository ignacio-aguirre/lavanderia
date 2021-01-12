@extends('layouts.app')
@section('content')
<div class="container">
	<h2>Autorizar o Cancelar Servicio Solicitado por Efector</h2>
	Proveedor <strong>{{$servicio[0]->proveedor}}</strong><br>
	Fecha <strong>{{ ffec($fechaservicio->fecha) }}</strong><br>
	Efector <strong>{{$efector}}</strong><br>
	Concepto <strong>{{$servicio[0]->concepto}}</strong><br>
	Horario <strong>{{substr($fechaservicio->hora_desde,0,5)."-".substr($fechaservicio->hora_hasta,0,5)}}</strong><br>
	Horas <strong>{{$fechaservicio->horas}}</strong><br>
	Personas <strong>{{$fechaservicio->personas}}</strong><br>
	Artículos <strong>{{ $fechaservicio->articulos}}</strong>
	
	<hr>
	<form class="form-inline" method="post" action="/servicios/autorizar">
	 {{ csrf_field() }}
			
		
		<div class="form-group has-warning">
			<label class="label-form" for="estado">Acción</label>
			<select class="form-control" name="estado" id="estado" onchange="boton()" required autofocus>
				<option value="">(Elegir)</option>
				<option value="1">Autorizar</option>
				<option value="3">Cancelar</option>
			</select>	
		</div>
		<p class="text-warning">En caso de Cancelar, indicar Motivo</p>
		<div class="form-group has-warning">
			<label class="label-form" for="observaciones">Motivo</label>
			<input class="form-control" name="observaciones" id="observaciones" size="150" maxlength="400" autofocus>
		</div>
		<input hidden id="servicio_id" name="servicio_id" value="{{$fechaservicio->servicio_id}}">
		<input hidden id="id" name="id" value="{{$fechaservicio->id}}">
						
		<hr>	
		<button id="aceptar" class="form-control btn btn-success" type="submit">Aceptar</button>
	</form>
</div>
<?php
function ffec($fecha){
  return substr($fecha,-2)."/".substr($fecha,5,2)."/".substr($fecha,0,4);
}
?>
<script>
	function boton(){
		accion=document.getElementById("estado").value;
		if(accion==1){document.getElementById("aceptar").className="form-control btn btn-success";document.getElementById("aceptar").innerHTML="Autorizar";document.getElementById("observaciones").value="";};
		if(accion==3){document.getElementById("aceptar").className="form-control btn btn-danger";document.getElementById("aceptar").innerHTML="Cancelar";};
		return true;
	}	
</script>
@endsection
