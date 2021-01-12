@extends('layouts.app')
@section('content')

<div class="container">
<h2>Usuarios</h2>
<button class="btn btn-primary" onclick="navega('register')">Nuevo</button><br><br>
<div class="table-responsive">
<table class="table">
	<thead>
		<tr class="bg-primary"><th>Apellido y Nombre</th><th>CUIL</th><th>Tipo Usuario</th><th>Estructura</th><th>Acciones</th></tr>
	</thead>
	<tbody>	
    @foreach($usuarios as $item)
    <?php
     switch ($item->tipo) {
      case 1:
        $d_tipo="Efector";
        break;
      case 2:
        $d_tipo="Dirección";
        break;
      case 3:
        $d_tipo="Adm.Sistema";
        break; 
     };
     foreach($estructuras as $estru){
      if($estru->id==$item->estructura_id){$item->destructura=$estru->descripcion;};
     } ?>
     <tr><td>{{ $item->name }}</td><td>{{ $item->cuil }}</td><td>{{ $d_tipo }}</td><td>{{ $item->destructura }}</td><td><a class="btn btn-warning" title="Editar" href="usuarios/editar/{{ $item->id }}">Editar</a>&nbsp;<a class="btn btn-danger" title="Eliminar" href="usuarios/eliminar/{{ $item->id }}">Eliminar</a>&nbsp;<a class="btn btn-success" title="Efectores" href="usuarios/efectores/{{ $item->id }}">Efectores</a></td></tr>
@endforeach
</tbody>
</table>
</div>
</div>
@endsection