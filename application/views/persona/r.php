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
		<th>password</th>
		<th>altura</th>
		<th>fnac</th>
		<th>foto</th>
		<th>Acción</th>
	</tr>
	
	
</table>

</div>

