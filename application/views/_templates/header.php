<div class="container">

 <?php if ($header['persona']!=null):?>

 <?=$header['persona']->nombre?>

	<a href="<?=base_url()?>hdu/user/logout">Logout</a>
	
<?php else:?>
<a href="<?=base_url()?>init">Registrar</a>
<a href="<?=base_url()?>hdu/anonymous/login">Login</a>


 
<?php endif;?>

       
	


</div>