<div class="container">
<h2>Editar Dirección</h2>
<form class="form" method="post" action="/infra/public/direcciones/editar_do" onsubmit="return valida()">
	{{ csrf_field() }}
	<div class="form-group has-warning">
		<label class="label-form" for="descripcion">Descripción</label>
		<input class="form-control" size="60" maxlength="60" name="descripcion" id="descripcion" value="<?php echo $direccion["descripcion"];?>">
	</div>
	<input hidden name="id" value="<?php echo $direccion['id'];?>">
	<button class="form-control btn-primary" type="submit">Modificar</button>
</form>
<script type="text/javascript">
	document.getElementById("descripcion").focus();
	function valida(){
		if(document.getElementById("descripcion").value==""){status("descripcion es un campo obligatorio");return false;};
		status("");
		return true;
	}
</script>
</div>
