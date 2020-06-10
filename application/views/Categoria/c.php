<div class="container">

<h1>Nueva categoria</h1>
<a href="<?= base_url()?>categoria/r"><button>volver</button></a>
<form action="<?=base_url()?>categoria/cPost" method="post">

	<label for="idp-p">Nombre</label>
	<input id="idp-p" type="text" name="nombre"/>
	<br/>
	
	<br/>

	
	<input type="submit"/>
</form>

</div>