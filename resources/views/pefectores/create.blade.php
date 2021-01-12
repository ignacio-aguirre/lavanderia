@extends('layouts.app')
@section('content')
<div class="container">
<h2>Efectores asociados a Proveedor {{$proveedor->descripcion}}</h2>
<div class="responsive-table">
	<table class="table">
		<tr class="bg-primary"><th>Efector</th><th>Acciones</th></tr>
			@foreach ($efectores as $item) 
			  <tr><td>{{ $item->descripcion }}</td>
			  	<?php
			   	$boton="<button class='btn btn-success' onclick='asignar(".$proveedor->id.",".$item->id_api.")'>Asignar</button>";
			  	foreach($provefects as $asignado) {
			  		
			  		if($asignado->efector_id==$item->id_api) {$boton="<button class='btn btn-danger' onclick='desasignar(".$asignado->id.")'>DesAsignar</button>";};
			  	}
			  	echo "<td>".$boton."</td>";
			  	?>
			  	
			  </tr>					
		    @endforeach
	</table>
	</div>	    
		
</div>
<script>
function asignar(proveedor,efector){
	navega('/proveedores/asignar/'+proveedor+'/'+efector);
}
function desasignar(id){
	navega('/proveedores/desasignar/'+id);
}
</script>
@endsection