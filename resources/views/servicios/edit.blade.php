@extends('layouts.app')
@section('content')
<div class="container">
	<h2>Editar servicio</h2>
	Proveedor <strong>{{$servicio[0]->proveedor}}</strong><br>
	Fecha <strong>{{ ffec($fechaservicio->fecha) }}</strong><br>
	Efector <strong>{{$efector}}</strong><br>
	Concepto <strong>{{$servicio[0]->concepto}}</strong><br>
	<hr>
	<form class="form-inline" method="post" action="/servicios/editar_do">
	 {{ csrf_field() }}
			
		<div class="form-group has-warning">
			<label class="label-form" for="hora_desde">Desde las</label>
			<input class="form-control" type="time" name="hora_desde" id="hora_desde" size="5" maxlength="5" required autofocus value="{{$fechaservicio->hora_desde}}">
		</div>
		<div class="form-group has-warning">
			<label class="label-form" for="hora_hasta">Hasta las</label>
			<input class="form-control" type="time" name="hora_hasta" id="hora_hasta" size="5" maxlength="5" required autofocus  value="{{$fechaservicio->hora_hasta}}" onblur='calculahoras()'>
		</div>
		<div class="form-group has-warning">
			<label class="label-form" for="horas">Horas</label>
			<input class="form-control" name="horas" id="horas" size="4" maxlength="4" required autofocus onblur="valida_decimal(this.id)" value="{{$fechaservicio->horas}}">
		</div>	
		
		<div class="form-group has-warning">
			<label class="label-form" for="personas">Cantidad Personas</label>
			<input class="form-control" name="personas" id="personas" size="2" maxlength="2" required autofocus onblur="valida_entero(this.id)" value="{{$fechaservicio->personas}}">
		</div>
		<hr>
		<div class="form-group has-warning">
			Aplicar los cambios a:<br>
			<label class="label-form" for="modo1">Este servicio únicamente </label>
			<input class="form-control" type="radio" name="modo" id="modo1" value="1" checked><br>
			<label class="label-form" for="modo2">También a los servicios futuros relacionados</label>
			<input class="form-control" type="radio" name="modo" id="modo2" value="2">
		</div>	
		<input hidden id="servicio_id" name="servicio_id" value="{{$fechaservicio->servicio_id}}">
		<input hidden id="id" name="id" value="{{$fechaservicio->id}}">
				
		<hr>	
		<button class="form-control btn btn-primary" type="submit">Actualizar</button>
	</form>
</div>
<script type="text/javascript">
	function validafechas(){
		if(fsql(document.getElementById("fecha_hasta").value)<fsql(document.getElementById("fecha_desde").value)){
			document.getElementById("fecha_hasta").value=document.getElementById("fecha_desde").value;
			alert("fecha hasta fue corregida");
		};
		return true;
	};
	function calculahoras(){
		h_d=document.getElementById("hora_desde").value;
		h_h=document.getElementById("hora_hasta").value;
		if(h_h<=h_d){ alert("hora hasta debe ser mayor que hora desde");return false;};
		m_d=parseInt(izq(h_d,2))*60+parseInt(der(h_d,2));
		m_h=parseInt(izq(h_h,2))*60+parseInt(der(h_h,2));
		hs=(m_h-m_d)/60;
		document.getElementById("horas").value=hs;
		return true;
	}
</script>
<?php
function ffec($fecha){
  return substr($fecha,-2)."/".substr($fecha,5,2)."/".substr($fecha,0,4);
}
?>
@endsection