<div class="container">

<h1>Registro de nuevo usuario</h1>

<form action="<?=base_url()?>hdu/anonymous/registrarPost" method="post">
	<label for="idp-l">loginname</label>
	<input id="idp-l" type="text" name="loginname" value="admin" readonly="readonly"/>
	<br/>
	<label for="idp-m">Nombre</label>
	<input id="idp-m" type="text" name="nombre"  value="admin" readonly="readonly"/>
	<br/>
	
	<label for="id-pwd">password</label>
	<input id="id-pwd" type="password" name="pwd"/>
	<br/>
 
	<label for="id-pwd">altura</label>
	<input id="id-pwd" type="number" name="altura" min="1" max="400"/>
	<br/>
   <label for="idp-f">fnac</label>
	<input id="idp" type="date" name="fnac"/>
	<br/>
	 <label for="idp-fo">foto</label>
	<input id="idp-fo" type="file" name="foto"/>
	<br/>
    <label for="idp-p">pais de nacimento</label>
	<input id="idp-p" type="text" name="idnace"/>
	<br/>
	
	<input type="submit"/>
</form>

</div>