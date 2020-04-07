<div class="container">

<h1>Nueva persona</h1>
<a href="<?= base_url()?>persona/r"><button>volver</button></a>
<form action="<?=base_url()?>persona/cPost" method="post"   enctype="multipart/form-data">

<label for="idp-l">loginname</label>
	<input id="idp-l" type="text" name="loginname"/>
	<br/>
	<label for="idp-n">Nombre</label>
	<input id="idp-n" type="text" name="nombre"/>
	<br/>
	
	<label for="id-pwd">password</label>
	<input id="id-pwd" type="password" name="pwd"/>
	<br/>
 	<label for="id-pwd">altura</label>
	<input id="id-pwd" type="number" name="altura" min="1" max="400"/>
	<br/>
   <label for="idp-f">fnac</label>
	<input id="idp-f" value="0/0/0" type="date" name="fnac"/>
	<br/>
	 <label for="idp-fo">foto</label>
	<input id="idp-fo"   type="file"  name="foto"/>
	 nace
     <select name="idnace">
      
       <?php foreach ($paises as $pais):?>
		<option  value="<?=$pais->id?>"><?=$pais->nombre?></option>
		<?php endforeach;?>
     </select>
<br/>
	<input type="submit"/>
</form>

</div>