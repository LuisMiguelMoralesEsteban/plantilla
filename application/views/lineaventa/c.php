<div class="container">

<h1>Nueva lineadeventa</h1>
<a href="<?= base_url()?>lineaventa/r"><button>volver</button></a>
<form action="<?=base_url()?>lineaventa/cPost" method="post">

	<label for="idp-p">cantidad</label>
	<input id="idp-p" type="number" name="cantidad"/>
	<br/>
	
	<br/>
 producto
     <select name="idproducto">
    <option  value="NULL">---</option>
       <?php foreach ($productos as $producto):?>
		<option  value="<?=$producto->id?>"><?=$producto->nombre?></option>
		<?php endforeach;?>
     </select>
<br/>
venta
     <select name="idventa">
    <option  value="NULL">---</option>
       <?php foreach ($ventas as $venta):?>
		<option  value="<?=$venta->id?>"><?=$venta->fecha?></option>
		<?php endforeach;?>
     </select>
     </br>	
	<input type="submit"/>
</form>

</div>