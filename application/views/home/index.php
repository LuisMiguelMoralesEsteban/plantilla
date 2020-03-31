<div class="container">

	<h1>Aplicación P.A.P.</h1>
		
	<?php if ($header['persona']!=null):?>
		<?php if ($header['persona']->nombre=="admin"):?>
	estas conectado como <?=$header['persona']->nombre."(administrador)"?><br>
		
<?php else:?>
	estas conectado como <?=$header['persona']->nombre."(estandar)"?><br>
<?php endif;?>
	
<a href="<?= base_url()?>pais/r"><button>Pais</button></a>
	<a href="<?= base_url()?>persona/r"><button>Persona</button></a>
	
	
<?php else:?>
	Debes hacer login para entrar
<?php endif;?>
		
</div>
