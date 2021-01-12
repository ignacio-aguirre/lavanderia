@extends('layouts.app')
@section('content')
<div class="container">
<h2>Efectores asociados a Usuario {{$usuario->name}}</h2>
<div class="responsive-table">
	<table class="table">
		<tr class="bg-primary"><th>Efector</th><th>Acciones</th></tr>
			@foreach ($efectores as $item) 
			  <tr><td>{{ $item->descripcion }}</td>
			  	<?php
			   	$boton="<button class='btn btn-success' onclick='asignar(".$item->id_api.",".$usuario->id.")'>Asignar</button>";
			  	foreach($userefects as $asignado) {
			  		
			  		if($asignado->estructura_id==$item->id_api) {$boton="<button class='btn btn-danger' onclick='desasignar(".$asignado->id.")'>DesAsignar</button>";};
			  	}
			  	echo "<td>".$boton."</td>";
			  	?>
			  	
			  </tr>					
		    @endforeach
	</table>
	</div>	    
		
</div>
<script>
function asignar(estructura,usuario){
	navega('/usuarios/asignar/'+usuario+'/'+estructura);
}
function desasignar(id){
	navega('/usuarios/desasignar/'+id);
}
</script>
@endsection