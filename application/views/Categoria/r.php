<div class="container">

<h1>Lista de categorias</h1>

<?php if ($header['persona']->nombre=="admin"):?>
	<a href="<?=base_url()?>categoria/c"><button>Nuevo</button></a>
<?php endif;?>

<a href="<?=base_url()?>"><button>Volver</button></a>
<table border="1">
	<tr>
		
		<th>nombre</th>
	<th >cantidad productos</th>
		<th >accion</th>
		
	</tr>
	
	
	</tr>
	<?php foreach ($categorias as $categoria): ?>
		<tr>
		
			<td><?=
			$categoria -> nombre;
			?></td>
			
				
			<td>
			
		
		<?= R::count( 'producto' ,'categoria_id=?',[$categoria->id])?>
		
	
			</td>
			<td><form action="<?=base_url()?>categoria/u" method="post">
				<input type="hidden" name="id" value="<?=$categoria->id?>">
				<button onclick="submit()">
					<img src="<?=base_url()?>/assets/iconos/editar.png" height="20"
						width="20">
				</button>
			</form>
			
				<?php if (R::count( 'producto' ,'categoria_id=?',[$categoria->id])==0):?>	
				<form action="<?=base_url()?>categoria/d" method="post">
				<input type="hidden" name="id" value="<?=$categoria->id?>">
				<button onclick="submit()">
					<img src="<?=base_url()?>/assets/iconos/basura.png" height="20"
						width="20">
				</button>
			</form>
		<?php endif;?>
		</td>
	<?php endforeach;?>
	
	
	
</table>

</div>

