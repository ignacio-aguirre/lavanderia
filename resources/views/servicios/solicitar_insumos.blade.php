@extends('layouts.app')
@section('content')
<div class="container">
	<h2>Solicitar Servicio Especial - Insumos</h2>
	<form class="form-inline" onsubmit="return valida()" method="post" action="/servicios/solicitar_insumos">
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
			<label class="label-form" for="fecha">Fecha</label>
			<input class="form-control" type="date" name="fecha" id="fecha" size="10" maxlength="10" required autofocus>
		</div>
		<hr>
  	    <div class="form-group has-warning">
			<label class="label-form" for="articulos">Artículos solicitados</label>
			<textarea class="form-control" name="articulos" id="articulos" rows="5" cols="80" maxlength="400" required autofocus placeholder="Producto, unidad de Medida o envase, cantidad"></textarea>
		</div>
		
  	    <input hidden id="estado" name="estado" value="4">	
		<input hidden id="ciclico" name="ciclico" value="0">
		<input hidden id="concepto_id" name="concepto_id" value="{{$concepto}}">	
		<hr>	
		<button class="form-control btn btn-primary" type="submit">Solicitar</button>
	</form>
</div>
<script type="text/javascript">
	function llenaproveedor(){
		document.getElementById('proveedor_id').innerHTML='<option value="">(seleccionar)</option>'
		+ejec_sq('/provefect/'+document.getElementById('efector_id').value);
	}
	
</script>
@endsection