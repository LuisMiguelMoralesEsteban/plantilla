<div class="container">

<h1>actualizar persona</h1>
<a href="<?= base_url()?>persona/r"><button>volver</button></a>
<form action="<?=base_url()?>persona/uPost" method="post"   enctype="multipart/form-data">
 <fieldset>
  <legend>datos anteriores:</legend>
  <input id="idp-l" type="hidden"value=<?= $persona->id ?> name="idpersona" />
<label for="idp-l">loginname antiguo</label>
	<input id="idp-l" type="text"value=<?= $persona->loginname ?> name="loginnamea" readonly/>
	<br/>
<label for="idp-p">Nombre antiguo</label>
	<input id="idp-p" type="text"value=<?= $persona->nombre?> name="nombrea" readonly/>
	<br/>
	
	<label for="id-pwd">password antiguo</label>
	
	<input id="idp-pwd" type="password"value=<?= $persona->password?> name="pwda" readonly/>
	<br/>
 	<label for="id-pwd">altura antiguo</label>
	
	<input id="idp-pwd" type="number"value=<?= $persona->altura?> name="alturaa" readonly/>
	<br/>
   <label for="idp-f">fnac antiguo</label>
	
	<input id="idp-pwd" type="date"value=<?= $persona->fnac?> name="fnaca" readonly/>
	<br/>
	 <label for="idp-fo">foto antiguo</label>
	
	 <input id="idp-pwd" type="text"value=<?= "persona-".$persona->nombre.".png"?> name="fotoa" readonly/>
	 <br/>
	 nace antiguo
	 	 <?php if ($persona ->nace!=null):?>
   <input id="idp-p" type="text"value=<?= $persona->nace->nombre?> name="nacea" readonly/>
   <?php  else:?>
			  <input id="idp-p" type="text"value="-----" name="nacea" readonly/>
			<?php endif;?>
<br/>
</fieldset>
 <fieldset>
  <legend>datos nuevos:</legend>
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
	<input id="id-pwd" type="number"  value ="100" name="altura" min="1" max="400"/>
	<br/>
   <label for="idp-f">fnac</label>
	<input id="idp-f" value="1901-01-01" type="date" name="fnac"/>
	<br/>
	 <label for="idp-fo">foto</label>
	<input id="idp-fo"   type="file"  name="foto"/>
	
	 nace
     <select name="idnace">
    <option  value="NULL">---</option>
       <?php foreach ($paises as $pais):?>
		<option  value="<?=$pais->id?>"><?=$pais->nombre?></option>
		<?php endforeach;?>
		
     </select>

</fieldset>
<br/>
	<input type="submit"/>
	
</form>

</div>
