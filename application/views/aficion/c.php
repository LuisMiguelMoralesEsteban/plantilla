<div class="container">

<h1>Nueva aficion</h1>
<a href="<?= base_url()?>aficion/r"><button>volver</button></a>
<form action="<?=base_url()?>aficion/cPost" method="post">

	<label for="idp-p">Nombre</label>
	<input id="idp-p" type="text" name="nombre"/>
	<br/>
	
	<br/>

	
	<input type="submit"/>
</form>

</div>