@extends('layouts.app')
@section('content')
<div class="container">
	<h2>Programar servicios</h2>
	<form class="form-inline" onsubmit="return valida()" method="post" action="/servicios/programar_do">
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
			<label class="label-form" for="fecha_desde">Fecha Desde</label>
			<input class="form-control" type="date" name="fecha_desde" id="fecha_desde" size="10" maxlength="10" required autofocus>
		</div>

		<div class="form-group has-warning">
			<label class="label-form" for="fecha_hasta">Fecha Hasta</label>
			<input class="form-control" type="date" name="fecha_hasta" id="fecha_hasta" size="10" maxlength="10" onblur='validafechas()' required autofocus>
		</div>
		<hr>
		LaV
		<div class="form-group has-warning">
			<label class="label-form" for="personas_lav">Cantidad Personas</label>
			<input class="form-control" name="personas_lav" id="personas_lav" size="2" maxlength="2" required autofocus onblur="valida_entero(this.id)">
		</div>
		<div class="form-group has-warning">
			<label class="label-form" for="hora_desde_lav">Desde las</label>
			<input class="form-control" type="time" name="hora_desde_lav" id="hora_desde_lav" size="5" maxlength="5" required autofocus>
		</div>
		<div class="form-group has-warning">
			<label class="label-form" for="hora_hasta_lav">Hasta las</label>
			<input class="form-control" type="time" name="hora_hasta_lav" id="hora_hasta_lav" size="5" maxlength="5" required autofocus onblur='calculahoras_lav()'>
		</div>
		<div class="form-group has-warning">
			<label class="label-form" for="horas_lav">Horas</label>
			<input class="form-control" name="horas_lav" id="horas_lav" size="4" maxlength="4" required autofocus onblur="valida_decimal(this.id)">
		</div>	
		<hr>
		Sáb
		<div class="form-group has-warning">
			<label class="label-form" for="personas_sab">Cantidad Personas</label>
			<input class="form-control" name="personas_sab" id="personas_sab" size="2" maxlength="2" required autofocus onblur="valida_entero(this.id)">
		</div>
		<div class="form-group has-warning">
			<label class="label-form" for="hora_desde_sab">Desde las</label>
			<input class="form-control" type="time" name="hora_desde_sab" id="hora_desde_sab" size="5" maxlength="5" required autofocus>
		</div>
		<div class="form-group has-warning">
			<label class="label-form" for="hora_hasta_sab">Hasta las</label>
			<input class="form-control" type="time" name="hora_hasta_sab" id="hora_hasta_sab" size="5" maxlength="5" required autofocus onblur='calculahoras_sab()'>
		</div>
		<div class="form-group has-warning">
			<label class="label-form" for="horas_sab">Horas</label>
			<input class="form-control" name="horas_sab" id="horas_sab" size="4" maxlength="4" required autofocus onblur="valida_decimal(this.id)">
		</div>	
		<hr>
		Dom
		<div class="form-group has-warning">
			<label class="label-form" for="personas_dom">Cantidad Personas</label>
			<input class="form-control" name="personas_dom" id="personas_dom" size="2" maxlength="2" required autofocus onblur="valida_entero(this.id)">
		</div>
		<div class="form-group has-warning">
			<label class="label-form" for="hora_desde_dom">Desde las</label>
			<input class="form-control" type="time" name="hora_desde_dom" id="hora_desde_dom" size="5" maxlength="5" required autofocus>
		</div>
		<div class="form-group has-warning">
			<label class="label-form" for="hora_hasta_dom">Hasta las</label>
			<input class="form-control" type="time" name="hora_hasta_dom" id="hora_hasta_dom" size="5" maxlength="5" required autofocus onblur='calculahoras_dom()'>
		</div>
		<div class="form-group has-warning">
			<label class="label-form" for="horas_dom">Horas</label>
			<input class="form-control" name="horas_dom" id="horas_dom" size="4" maxlength="4" required autofocus onblur="valida_decimal(this.id)">
		</div>
		<hr>
		<div class="form-group has-warning">
			<label class="label-form" for="feriados">Se realiza días No Laborables</label>
			<select class="form-control" id="feriados" name="feriados" required autofocus>
				<option value="2">No</option>
				<option value="1">Sí</option>
			</select>
		</div>	
		<input hidden id="estado" name="estado" value="1">	
		<input hidden id="ciclico" name="ciclico" value="1">	
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
	function calculahoras_lav(){
		personas=parseInt(document.getElementById('personas_lav').value);
		if(personas>0){
			h_d=document.getElementById("hora_desde_lav").value;
			h_h=document.getElementById("hora_hasta_lav").value;
			if(h_h<=h_d){ alert("hora hasta debe ser mayor que hora desde");return false;};
			m_d=parseInt(izq(h_d,2))*60+parseInt(der(h_d,2));
			m_h=parseInt(izq(h_h,2))*60+parseInt(der(h_h,2));
			hs=(m_h-m_d)/60;
			document.getElementById("horas_lav").value=hs;
		}
		else{
			document.getElementById("hora_desde_lav").value="00:00";
			document.getElementById("hora_hasta_lav").value="00:00";
			document.getElementById("horas_lav").value="0";
		};	
		return true;
	}
	function calculahoras_sab(){
		personas=parseInt(document.getElementById('personas_sab').value);
		if(personas>0){
			h_d=document.getElementById("hora_desde_sab").value;
			h_h=document.getElementById("hora_hasta_sab").value;
			if(h_h<=h_d){ alert("hora hasta debe ser mayor que hora desde");return false;};
			m_d=parseInt(izq(h_d,2))*60+parseInt(der(h_d,2));
			m_h=parseInt(izq(h_h,2))*60+parseInt(der(h_h,2));
			hs=(m_h-m_d)/60;
			document.getElementById("horas_sab").value=hs;
		}
		else{
			document.getElementById("hora_desde_sab").value="00:00";
			document.getElementById("hora_hasta_sab").value="00:00";
			document.getElementById("horas_sab").value="0";
		};	
		return true;
	}
	function calculahoras_dom(){
		personas=parseInt(document.getElementById('personas_dom').value);
		if(personas>0){
			h_d=document.getElementById("hora_desde_dom").value;
			h_h=document.getElementById("hora_hasta_dom").value;
			if(h_h<=h_d){ alert("hora hasta debe ser mayor que hora desde");return false;};
			m_d=parseInt(izq(h_d,2))*60+parseInt(der(h_d,2));
			m_h=parseInt(izq(h_h,2))*60+parseInt(der(h_h,2));
			hs=(m_h-m_d)/60;
			document.getElementById("horas_dom").value=hs;
		}
		else{
			document.getElementById("hora_desde_dom").value="00:00";
			document.getElementById("hora_hasta_dom").value="00:00";
			document.getElementById("horas_dom").value="0";
		};	
		return true;
	}
	function valida(){
		valida_entero("personas_lav");
		valida_entero("personas_sab");
		valida_entero("personas_dom");
		calculahoras_lav();
		calculahoras_sab();
		calculahoras_dom();
		return true;	
	}
</script>
@endsection