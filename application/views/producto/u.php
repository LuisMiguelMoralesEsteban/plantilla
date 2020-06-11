<div class="container">

<h1>actualizar producto</h1>
<a href="<?= base_url()?>producto/r"><button>volver</button></a>
<form action="<?=base_url()?>producto/uPost" method="post"   enctype="multipart/form-data">
 <fieldset>
  <legend>datos anteriores:</legend>
  <input id="idp-l" type="hidden"value=<?= $producto->id ?> name="idproducto" />

<label for="idp-p">Nombre antiguo</label>
	<input id="idp-p" type="text"value=<?= $producto->nombre?> name="nombrea" readonly/>
	<br/>
	
	<label for="id-pwd">stock antiguo</label>
	
	<input id="idp-pwd" type="text"value=<?= $producto->stock?> name="stocka" readonly/>
	<br/>
 	<label for="id-pwd">precio antiguo</label>
	
	<input id="idp-pwd" type="text"value=<?= $producto->precio?> name="precio" readonly/>
	<br/>
  
	<br/>
	 <label for="idp-fo">foto antiguo</label>
	
	 <input id="idp-pwd" type="text"value=<?= "producto-".$producto->nombre.".png"?> name="fotoa" readonly/>
	 <br/>
	 categoria antigua
	 	 <?php if ($producto ->categoria!=null):?>
   <input id="idp-p" type="text"value=<?= $producto->categoria->nombre?> name="categoriaa" readonly/>
   <?php  else:?>
			  <input id="idp-p" type="text"value="-----" name="categoriaa" readonly/>
			<?php endif;?>
<br/>
</fieldset>
 <fieldset>
  <legend>datos nuevos:</legend>
<label for="idp-p">Nombre </label>
	<input id="idp-p" type="text" name="nombre" />
	<br/>
	
	<label for="id-pwd">stock </label>
	
	<input id="idp-pwd" type="number" name="stock" />
	<br/>
 	<label for="id-pwd">precio </label>
	
	<input id="idp-pwd" type="number" name="precio" />
	<br/>
  

	 <label for="idp-fo">foto</label>
	<input id="idp-fo"   type="file"  name="foto" accept="image/x-png,image/gif,image/jpeg" />
	
	 categoria
     <select name="idcategoria">
   
       <?php foreach ($categorias as $categoria):?>
		<option  value="<?=$categoria->id?>"><?=$categoria->nombre?></option>
		<?php endforeach;?>
		
     </select>

</fieldset>
<br/>
	<input type="submit"/>
	
</form>

</div>
