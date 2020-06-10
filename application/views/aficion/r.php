<div class="container">

<h1>Lista de aficiones</h1>

<?php if ($header['persona']->nombre=="admin"):?>
	<a href="<?=base_url()?>aficion/c"><button>Nuevo</button></a>
<?php endif;?>

<a href="<?=base_url()?>"><button>Volver</button></a>
<table border="1">
	<tr>
		
		<th>nombre</th>
		
		<th >accion</th>
		
	</tr>
	
	<?php foreach ($aficiones as $aficion): ?>
		<tr>
		
			<td><?=
			$aficion -> nombre;
			?></td>
			
			
			<td><form action="<?=base_url()?>aficion/u" method="post">
				<input type="hidden" name="id" value="<?=$aficion->id?>">
				<button onclick="submit()">
					<img src="<?=base_url()?>/assets/iconos/editar.png" height="20"
						width="20">
				</button>
			</form>
			
				
				<form action="<?=base_url()?>aficion/d" method="post">
				<input type="hidden" name="id" value="<?=$aficion->id?>">
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

