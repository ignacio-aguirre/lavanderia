@extends('layouts.app')
@section('content')
<div class="container">
	<h2>Programar Servicio Puntual</h2>
	<form class="form-inline" onsubmit="return valida()" method="post" action="/servicios/nuevo_do">
	{{ csrf_field() }}
		<div class="form-group has-warning">
			<label class="label-form" for="efector_id">Efector</label>
			<select class="form-control" name="efector_id" id="efector_id" required autofocus onblur='llenaproveedor()'>
				<option value="">(seleccionar)</option>
				@foreach($efectores as $item)
					<option value="{{$item->id_api}}">{{$item->descripcion}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group has-warning">
			<label class="label-form" for="proveedor_id">Proveedor</label>
			<select class="form-control" name="proveedor_id" id="proveedor_id" required autofocus>
				
			</select>
		</div>
		
		<div class="form-group has-warning">
			<label class="label-form" for="concepto_id">Concepto</label>
			<select class="form-control" name="concepto_id" id="concepto_id" required autofocus>
				<option value="">(seleccionar)</option>
				@foreach($conceptos as $item)
					<option value="{{$item->id}}">{{$item->descripcion}}</option>
				@endforeach
			</select>
		</div>
		<hr>
		<div class="form-group has-warning">
			<label class="label-form" for="fecha">Fecha</label>
			<input class="form-control" type="date" name="fecha" id="fecha" size="10" maxlength="10" required autofocus>
		</div>
		<div class="form-group has-warning">
			<label class="label-form" for="personas">Cantidad Personas</label>
			<input class="form-control" name="personas" id="personas" size="2" maxlength="2" required autofocus onblur="valida_entero(this.id)">
		</div>
		<div class="form-group has-warning">
			<label class="label-form" for="hora_desde_lav">Desde las</label>
			<input class="form-control" type="time" name="hora_desde" id="hora_desde" size="5" maxlength="5" required autofocus>
		</div>
		<div class="form-group has-warning">
			<label class="label-form" for="hora_hasta">Hasta las</label>
			<input class="form-control" type="time" name="hora_hasta" id="hora_hasta" size="5" maxlength="5" required autofocus onblur='calculahoras()'>
		</div>
		<div class="form-group has-warning">
			<label class="label-form" for="horas_lav">Horas</label>
			<input class="form-control" name="horas" id="horas" size="4" maxlength="4" required autofocus onblur="valida_decimal(this.id)">
		</div>	
  	    <input hidden id="estado" name="estado" value="1">	
		<input hidden id="ciclico" name="ciclico" value="0">	
		<hr>	
		<button class="form-control btn btn-primary" type="submit">Programar</button>
	</form>
</div>
<script type="text/javascript">
	function llenaproveedor(){
		document.getElementById('proveedor_id').innerHTML='<option value="">(seleccionar)</option>'
		+ejec_sq('/provefect/'+document.getElementById('efector_id').value);
	}
	function validafechas(){
		if(fsql(document.getElementById("fecha_hasta").value)<fsql(document.getElementById("fecha_desde").value)){
			document.getElementById("fecha_hasta").value=document.getElementById("fecha_desde").value;
			alert("fecha hasta fue corregida");
		};
		return true;
	};
	function calculahoras(){
		personas=parseInt(document.getElementById('personas').value);
		if(personas>0){
			h_d=document.getElementById("hora_desde").value;
			h_h=document.getElementById("hora_hasta").value;
			if(h_h<=h_d){ alert("hora hasta debe ser mayor que hora desde");return false;};
			m_d=parseInt(izq(h_d,2))*60+parseInt(der(h_d,2));
			m_h=parseInt(izq(h_h,2))*60+parseInt(der(h_h,2));
			hs=(m_h-m_d)/60;
			document.getElementById("horas").value=hs;
		}
		else{
			document.getElementById("hora_desde").value="00:00";
			document.getElementById("hora_hasta").value="00:00";
			document.getElementById("horas").value="";
		};	
		return true;
	}
	function valida(){
		valida_entero("personas");
		calculahoras();
		return true;	
	}
</script>
@endsection