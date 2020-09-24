
<main>

<form  action="<?php echo HOME_URI.'usuario/inserir';?>" method ='POST'>
  <div class='form-group''>
    <label for='exampleFormControlInput1'>Nome</label>
    <input type='text' class='form-control' id='exampleFormControlInput1' name='nome' placeholder='Insira o título'>
  </div>
  <div class='form-group''>
    <label for='exampleFormControlInput1'>Email</label>
    <input type='email' class='form-control' id='exampleFormControlInput1' name='email' placeholder='Insira o título'>
  </div>
  
  
 
  <button type='submit' class='btn btn-primary'>Criar usuário</button>
<a href="<?php echo HOME_URI.'inicio/index'?>"><button type='button' id = 'backHome' class='btn btn-primary'>Voltar á página Home</button></a>
</form>

    
    </main>
    </html>

