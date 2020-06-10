<div class="container">

<h1>Lista de productos</h1>

<?php if ($header['persona']->nombre=="admin"):?>
	<a href="<?=base_url()?>producto/c"><button>Nueva</button></a>
<?php endif;?>
	


<a href="<?=base_url()?>"><button>Volver</button></a>
<table border="1">
	<tr>
	
		<th>nombre</th>
		<th>categoria</th>
		<th>accion</th>
		
	</tr>
	
	<?php foreach ($productos as $producto): ?>
		<tr>
		
			<td><?=
			$producto -> nombre;
			?></td>
				<td><?=
				$producto ->categoria->nombre
			?></td>
				
	
			<td><form action="<?=base_url()?>producto/u" method="post">
				<input type="hidden" name="id" value="<?=$producto->id?>">
				<button onclick="submit()">
					<img src="<?=base_url()?>/assets/iconos/editar.png" height="20"
						width="20">
				</button>
			</form>
			
			
				<form action="<?=base_url()?>producto/d" method="post">
				<input type="hidden" name="id" value="<?=$producto->id?>">
				<button onclick="submit()">
					<img src="<?=base_url()?>/assets/iconos/basura.png" height="20"
						width="20">
				</button>
			</form>
		
		</td>
	</tr>
	
	
	<?php endforeach;?>
	
</table>

</div>

