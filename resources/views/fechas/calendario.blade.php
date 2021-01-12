@extends('layouts.app')
@section('content')
<script type="text/javascript">
function renavega(){
		anio=document.getElementById("anio").value;
		mes=document.getElementById("mes").value;
		navega("/feriados/"+anio+"/"+mes);
	}
</script>	
<div class="container">
<h2>Calendario de Feriados</h2>
Año <select class='has-warning' id='anio' onchange='renavega()'><option value="2021">2021</option><option value="2022">2022</option></select>
&nbsp; Mes <select class='has-warning' id='mes' onchange='renavega()'>
	<option value="1" {{si($aniomes[0]->mes==1,' selected','')}}>Enero</option>   
	<option value="2" {{si($aniomes[0]->mes==2,' selected','')}}>Febrero</option>   
	<option value="3" {{si($aniomes[0]->mes==3,' selected','')}}>Marzo</option>   
	<option value="4" {{si($aniomes[0]->mes==4,' selected','')}}>Abril</option>   
	<option value="5" {{si($aniomes[0]->mes==5,' selected','')}}>Mayo</option>   
	<option value="6" {{si($aniomes[0]->mes==6,' selected','')}}>Junio</option>   
	<option value="7" {{si($aniomes[0]->mes==7,' selected','')}}>Julio</option>   
	<option value="8" {{si($aniomes[0]->mes==8,' selected','')}}>Agosto</option>   
	<option value="9" {{si($aniomes[0]->mes==9,' selected','')}}>Septiembre</option>   
	<option value="10" {{si($aniomes[0]->mes==10,' selected','')}}>Octubre</option>   
	<option value="11" {{si($aniomes[0]->mes==11,' selected','')}}>Noviembre</option>   
	<option value="12" {{si($aniomes[0]->mes==12,' selected','')}}>Diciembre</option>   
</select>
<div class="row">
	<div class="col-sm-1">Lun</div>
	<div class="col-sm-1">Mar</div>
	<div class="col-sm-1">Mié</div>
	<div class="col-sm-1">Jue</div>
	<div class="col-sm-1">Vie</div>
	<div class="col-sm-1">Sáb</div>
	<div class="col-sm-1">Dom</div>
</div>
<div class="row">
@foreach ($fechas as $fecha) 
	<div class="col-sm-1" id="11">
		@if((integer) substr($fecha->fecha,5,2)== (integer)$aniomes[0]->mes)
			{{substr($fecha->fecha,-2)}}<br> 
			@if($fecha->feriado==1)
				<p class="text-danger">
				{{$fecha->feriado_descripcion}}
				</p>
				<button class='btn btn-sm btn-danger' onclick="navega('/feriadosquitar/{{$fecha->fecha}}')">Eliminar</button>
			@else
				<button class='btn btn-sm btn-warning' onclick="navega('/feriadosagregar/{{$fecha->fecha}}')">Marcar como <br>Feriado</button>
			@endif
		@endif
	</div>	
	@if($fecha->diasemana=="Domingo")
	 </div><div class='row'>
	@endif 	
	
@endforeach
</div>
<?php function si($condicion,$verdadero,$falso){
	if($condicion) return $verdadero;
	return $falso;
}
?>
@endsection