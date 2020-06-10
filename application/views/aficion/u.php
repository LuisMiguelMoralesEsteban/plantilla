<div class="container">

<h1>Actualizar aficion</h1>
<a href="<?= base_url()?>aficion/r"><button>volver</button></a>
<form action="<?=base_url()?>aficion/uPost" method="post">

	<label for="idp-p">Nombre antiguo</label>
	<input id="idp-p" type="text"value=<?= $aficion->nombre?> name="nombre" readonly/>
	<input id="idp-m" type="hidden" value=<?= $aficion->id?> name="id"/>
	<br/>
		<label for="idp-m">Nombre nuevo</label>
	<input id="idp-m" type="text" name="nombrenuevo"/>
	<br/>
	
	<br/>

	
	<input type="submit"/>
</form>

</div>
