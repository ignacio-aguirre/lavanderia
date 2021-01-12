<?php
$mytime = Carbon\Carbon::now(); 
?>
<div class="container">
<h2>Pedidos a Asignar</h2>
<h4>Emitido <?php echo $mytime->toDateTimeString();?></h4>
<div class="table-responsive">
<table class="table">
	<thead>
		<tr class="bg-primary"><th>Fecha</th><th>Efector</th><th>Domicilio</th><th>Descripción</th><th>Rubro</th></tr>
	</thead>
	<tbody>	
<?php

foreach($pedidos as $item){
 if($item->rubro==1){$drubro="Falta de Agua";};
 if($item->rubro==2){$drubro="Baños";};
 if($item->rubro==3){$drubro="Calefacción";};
 if($item->rubro==4){$drubro="Electricidad";};
 if($item->rubro==5){$drubro="Puertas";};
 if($item->rubro==6){$drubro="Refrigeración";};
 if($item->rubro==7){$drubro="Vidrios";};
 if($item->rubro==8){$drubro="Gas";};
 if($item->rubro==9){$drubro="Filtraciones y Humedad";};
 if($item->rubro==10){$drubro="Otros";};
 
 echo "<tr><td>".ffec($item->fecha)."</td><td>".$item->efector."</td><td>".$item->domicilio."</td><td>".$item->descripcion." ".$item->comentarios."</td><td>".$drubro."</td></tr>";
 
};
function ffec($fecha)

{

if(gettype($fecha)=="NULL") {return "";} else return substr($fecha,8,2)."/".substr($fecha,5,2)."/".substr($fecha,0,4);

}
?>
</tbody>
</table>
</div>
</div>
