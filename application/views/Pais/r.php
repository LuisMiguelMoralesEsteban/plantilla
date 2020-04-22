<div class="container">

<h1>Lista de paises</h1>

<?php if ($header['persona']->nombre=="admin"):?>
	<a href="<?=base_url()?>pais/c"><button>Nuevo</button></a>
<?php endif;?>

<a href="<?=base_url()?>"><button>Volver</button></a>
<table border="1">
	<tr>
		
		<th>nombre</th>
		<th>numero de personas</th>
		<th >accion</th>
		
	</tr>
	<?php foreach ($paises as $pais): ?>
		<tr>
		
			<td><?=
			$pais -> nombre;
			?></td>
			
				
			<td>
			
		
		<?= R::count( 'persona' ,'nace_id=?',[$pais->id])?>
		
	
			</td>
			<td><form action="<?=base_url()?>pais/u" method="post">
				<input type="hidden" name="id" value="<?=$pais->id?>">
				<button onclick="submit()">
					<img src="<?=base_url()?>/assets/iconos/editar.png" height="20"
						width="20">
				</button>
			</form>
			
				<?php if (R::count( 'persona' ,'nace_id=?',[$pais->id])==0):?>	
				<form action="<?=base_url()?>pais/d" method="post">
				<input type="hidden" name="id" value="<?=$pais->id?>">
				<button onclick="submit()">
					<img src="<?=base_url()?>/assets/iconos/basura.png" height="20"
						width="20">
				</button>
			</form>
		<?php endif;?>
		</td>
	</tr>
	
	
	<?php endforeach;?>
	

	
	
</table>

</div>

