@extends('layouts.app')
@section('content')
<div class="container">
	<h2>Consultar Horas de Servicios por Proveedor</h2>
	<form class="form-inline" method="post" action="/servicios/horas_proveedor">
	{{ csrf_field() }}
		<div class="form-group has-warning">
			<label class="label-form" for="proveedor_id">Proveedor</label>
			<select class="form-control" name="proveedor_id" id="proveedor_id" required autofocus>
				<option value="">(seleccionar)</option>
				@foreach($proveedores as $item)
					<option value="{{$item->id}}">{{$item->descripcion}}</option>
				@endforeach
			</select>
		</div>
		
		<div class="form-group has-warning">
			<label class="label-form" for="fecha_desde">Fecha Desde</label>
			<input class="form-control" type="date" name="fecha_desde" id="fecha_desde" size="10" maxlength="10" required autofocus>
		</div>

		<div class="form-group has-warning">
			<label class="label-form" for="fecha_hasta">Fecha Hasta</label>
			<input class="form-control" type="date" name="fecha_hasta" id="fecha_hasta" size="10" maxlength="10" onblur='validafechas()' required autofocus>
		</div>
		<button class="form-control btn btn-primary" type="submit">Consultar</button>
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
</script>
@endsection