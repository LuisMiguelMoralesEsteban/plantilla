<div class="container">

	<h1>Aplicación P.A.P.</h1>
		
	<?php if ($header['persona']!=null):?>

	Hola <?=$header['persona']->nombre?><br>
<a href="<?= base_url()?>pais/r"><button>Pais</button></a>
	<a href="<?= base_url()?>persona/r"><button>Persona</button></a>
	
	
<?php else:?>
	Debes hacer login para entrar
<?php endif;?>
		
</div>
