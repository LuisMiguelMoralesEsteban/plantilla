<div class="container">

<h1>Actualizar categorias</h1>
<a href="<?= base_url()?>categoria/r"><button>volver</button></a>
<form action="<?=base_url()?>categoria/uPost" method="post">

	<label for="idp-p">Nombre antiguo</label>
	<input id="idp-p" type="text" value=<?= $categoria->nombre?> name="nombre" readonly/>
	<input id="idp-m" type="hidden" value=<?= $categoria->id?> name="id"/>
	<br/>
		<label for="idp-m">Nombre nuevo</label>
	<input id="idp-m" type="text" name="nombrenuevo"/>
	<br/>
	
	<br/>

	
	<input type="submit"/>
</form>

</div>
