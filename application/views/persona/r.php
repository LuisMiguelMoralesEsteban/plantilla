<div class="container">

<h1>Lista de personas</h1>

<?php if ($header['persona']->nombre=="admin"):?>
	<a href="<?=base_url()?>persona/c"><button>Nueva</button></a>
<?php endif;?>
	


<a href="<?=base_url()?>"><button>Volver</button></a>
<table border="1">
	<tr>
		<th>loginname</th>
		<th>nombre</th>
		<th>altura</th>
		<th>fnac</th>
		<th>foto</th>
	<th>nace</th>
		<th>accion</th>
		
	</tr>
	<?php foreach ($personas as $persona): ?>
		<tr>
		
			<td><?=
			$persona -> loginname;
			?></td>
			<td><?=
			$persona -> nombre;
			?></td>
			<td><?=
			$persona -> altura;
			?></td>
			<td><?=
			$persona -> fnac;
			?></td>
		<?php if ($persona ->foto!=null):?>
				<td>
				<img src="<?=base_url()?>assets\upload\persona-<?=
				$persona -> nombre;?>.<?=
			$persona -> foto;?>"  width="80" height="80">
			</td>
			<?php  else:?>
			
			<td>
		<img src="<?=base_url()?>assets\upload\noimagen.jpg"
					  width="80" height="80">
					  </td>
			<?php endif;?>
			<?php if ($persona ->nace!=null):?>
				<td><?=
				$persona ->nace->nombre
			?></td>
			<?php  else:?>
			<td>----</td>
			<?php endif;?>
			<td><form action="<?=base_url()?>persona/u" method="post">
				<input type="hidden" name="id" value="<?=$persona->id?>">
				<button onclick="submit()">
					<img src="<?=base_url()?>/assets/iconos/editar.png" height="20"
						width="20">
				</button>
			</form>
			
				
				<form action="<?=base_url()?>persona/d" method="post">
				<input type="hidden" name="id" value="<?=$persona->id?>">
				<?php if ($persona ->ventaencurso!=null):?>
				<input type="hidden" name="idventa" value="<?=$persona->ventaencurso->id?>">
				
				<?php endif;?>
				<button onclick="submit()">
					<img src="<?=base_url()?>/assets/iconos/basura.png" height="20"
						width="20">
				</button>
			</form>
		
		</td>
		<?php endforeach;?>
</table>

</div>

