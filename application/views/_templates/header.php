<div class="container">

 <?php if ($header['persona']!=null):?>

 <?=$header['persona']->nombre?>

	
	
<?php else:?>
 <a href="<?=base_url()?>hdu/anonymous/login">Login</a>
<?php endif;?>

       
	

<a href="<?=base_url()?>hdu/user/logout">Logout</a>

</div>