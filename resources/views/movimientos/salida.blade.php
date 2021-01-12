@extends('layouts.app')
@section('content')
<div class="container">
<h2>Registrar Salida a Lavandería</h2>
<form class="form" method="post" action="/salida/nueva">
	{{ csrf_field() }}
	<div class="form-group has-warning">
		<label class="label-form" for="fecha">Fecha Salida</label>
		<input name="fecha" id="fecha" class="form-control" type="date" required autofocus>
	</div>
	<div class="form-group has-warning">
		<label class="label-form" for="efector_id">Efector</label>
		<select class="form-control" name="efector_id" id="efector_id" required autofocus>
			<option value="">(seleccionar)</option>
			@foreach($efectores as $item)
				<option value="{{$item->id_api}}">{{$item->descripcion}}</option>
			@endforeach
		</select>	
	</div>
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
		<label class="label-form" for="concepto_id">Concepto</label>
		<select class="form-control" name="concepto_id" id="concepto_id" required autofocus>
			<option value="">(seleccionar)</option>
			@foreach($conceptos as $item)
				<option value="{{$item->id}}">{{$item->descripcion}}</option>
			@endforeach
		</select>	
	</div>
	<div class="form-group has-warning">
		<label class="label-form" for="bultos">Bultos</label>
		<input class="form-control" id="bultos" name="bultos" size="3" maxlength="3" type="number" onblur="valida_entero(this.id)" required min="1" max="99">
	</div>	
	<button class="form-control btn-primary" type="submit">Registrar</button>
</form>
</div>
@endsection
