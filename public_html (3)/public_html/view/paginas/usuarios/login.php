<?php


?>
<main>

   <form action="<?php echo HOME_URI;?>usuario/autenticar" method='POST'>
	<div class='space'></div>
	<div class='form-group'>
	  <label for='exampleInputEmail1'>Endereço de Email</label>
	  <input type='email' name='email' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'>
	  <small id='emailHelp' class='form-text text-muted'>We'll never share your email with anyone else.</small>
	</div>
	<div class='form-group'>
	  <label for='exampleInputPassword1'>senha</label>
	  <input type='password' name='senha' class='form-control' id='exampleInputPassword1'>
	</div>
  
	<button type='submit' class='btn btn-primary'>Login</button>
<a href="<?php echo HOME_URI.'inicio/index'?>"><button type='button' id = 'backHome' class='btn btn-primary'>Voltar á página Home</button></a>
  </form>
</main>