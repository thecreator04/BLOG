
<main>

<form  action="<?php echo HOME_URI.'usuario/edited';?>" method ='POST'>
  <div class='form-group'>
    <label for='exampleFormControlInput1'>Nome</label>
    <input type='text' class='form-control' id='exampleFormControlInput1' name='nome' value=<?php echo $usuario->nome ?>>
  </div>
  <div class='form-group''>
    <label for='exampleFormControlInput1'>Email</label>
    <input type='email' class='form-control' id='exampleFormControlInput1' name='email' value=<?php echo $usuario->email ?>>
  </div>
  <div class='form-group''>
    <label for='exampleFormControlInput1'>Senha</label>
    <input type='password' class='form-control' id='exampleFormControlInput1' name='senha' value=<?php echo $usuario->senha ?>>
  </div>
  
 
  <button type='submit' class='btn btn-primary'>Salvar Alterações</button>
<a href="<?php echo HOME_URI.'inicio/index'?>"><button type='button' id = 'backHome' class='btn btn-primary'>Voltar á página Home</button></a>
</form>
<?php
 if(isset($_SESSION['password'])){
  if($_SESSION['password']=="abc123"){
      echo '<div class="alert alert-danger" role="alert">
     <p>você está usando a senha padrão do sistema, por favor, insira uma nova.</p>
     <p>É para sua segurança</p>
    </div>';}}


?>

    
    </main>
    </html>

