<!DOCTYPE html>
<?php


?>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="<?php echo HOME_URI?>view/tema/css/style.css"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	
	

	<title>Criação de Sites</title>
</head>
<body>
	<header>
	
	<div class="login"><a  href="<?php  echo HOME_URI?>usuario/login"><img id ="imgLogin" src="<?php echo HOME_URI?>view/tema/imagens/login.png"/></a></div>
	

	
	<?php                                                          

		if(isset($_SESSION['logado'])){
			if($_SESSION['logado']==1){
			    
				//echo "<div id='edit'><a href='".HOME_URI."usuario/changepassword'><img  src='".HOME_URI."view/tema/imagens/ed.png' style='width:100%'/></div></a><br>";
				
			//echo "<div id='exit'><a  href='https://testehosting03.000webhostapp.com/ope.php'><img src='".HOME_URI."view/tema/imagens/exit.png' style='width:100%'/></a></div>";
		}
		}
	?>
	

		<div id="h-logo"><img src="<?php echo HOME_URI  ?>view/tema/imagens/logo.png" style="height:75px"/></div>
		
		<?php                                                          

		if(isset($_SESSION['logado'])){
			if($_SESSION['logado']==1){
			    
			
				
		echo "<a href='".HOME_URI."usuario/edit'<div id='editLogo'><img src='".HOME_URI."view/tema/imagens/edit.png' style='width:06%'/></div></a>";
			echo "<a href='".HOME_URI."usuario/edit'<div id='exitLogo'><img src='".HOME_URI."view/tema/imagens/exit.png' style='width:04%'/></div></a>";
		}
		}
	?>
		
		
		<div id='h-center'>
			<div id="icon-menu">
				<a id="link-icon-menu" href="#"><img src="<?php echo HOME_URI  ?>view/tema/imagens/icon-menu.png" style="height:75px"/></a>
			</div>
			<div id="icon-close-menu">
				<a id="link-icon-close-menu" href="#"><img src="<?php echo HOME_URI  ?>view/tema/imagens/icon-close.png" /></a>
			</div>
		</div>
		<div id='h-user'>
			
			<?php 
			if(isset($_SESSION['user'])){

				echo "<a href='#' id='user-show'><i class='fas fa-user-check' style='font-size:24px'></i></a>";
				echo "<div id='user-info' class='hide' >
						<ul>
						<li>"
					.$_SESSION['user']['name'].
						"</li>
						<li>
					<a href='".HOME_URI."/user/logout'><i class=' fas fa-sign-out-alt' style='font-size:24px'></i></a>
					</li>
				</div>";
				}else{
				echo "<a href='".HOME_URI."/user/login'><i class=' fas fa-sign-in-alt' style='font-size:24px'></i></a>";
			}
			?>
		</div>
	</header>
	