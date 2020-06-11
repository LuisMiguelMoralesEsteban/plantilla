<script>
		$(document).on("ready", function(){
		   	enviardatos();
		});
        function enviardatos(){
			$("#frm").on("keyup",function(e){
				e.preventDefault();
				var frm=$(this).serialize();
				$.ajax({

					
                  "method":"POST",
               
				  "url":"http://localhost/ejercicios/LuismiguelCI/application/views/producto/warnig.php",
				
                  "data":frm
				}).done(function(info){
                        $("#mensaje").html(info);
				});

			});

		}
	
	</script>

<div class="container">

<h1>Nueva producto</h1>
<a href="<?= base_url()?>producto/r"><button>volver</button></a>
<form  id="frm" action="<?=base_url()?>producto/cPost" method="post"   enctype="multipart/form-data">


	<label for="idp-n">Nombre</label>
	<input id="idp-n" type="text"  name="nombre"/>
	<?php foreach ($productos as $producto):?>
	
	<input id="idp-n" type="hidden" value="<?= $producto->nombre?>"  name="p[]"/>
	

	 <span  id="mensaje"></span>
	 	
	<?php endforeach;?>
		
	   
       


	<br/>
	
	<label for="id-pwd">stock</label>
	<input id="id-pwd" type="number"  value="0" name="stock"/>
	<br/>
 	<label for="id-pwd">precio</label>
	<input id="id-pwd" type="number"   name="precio" />
	<br/>
  
	 <label for="idp-fo">foto</label>
	<input id="idp-fo"   type="file"  name="foto" accept="image/x-png,image/gif,image/jpeg" />
	 categoria
     <select name="categoria">
    <option  value="NULL">---</option>
       <?php foreach ($categorias as $categoria):?>
		<option  value="<?=$categoria->id?>"><?=$categoria->nombre?></option>
		<?php endforeach;?>

<br/>

	<input type="submit"/>
</form>

</div>