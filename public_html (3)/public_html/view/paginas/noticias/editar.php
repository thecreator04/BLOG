
<main>

<form  action="<?php echo HOME_URI.'noticia/edited?id='.$_SESSION['noticiaId'];?>" method ='POST'>
  <div class='form-group''>
    <label for='exampleFormControlInput1'>titulo</label>
    <input type='text' class='form-control' id='exampleFormControlInput1' name='titulo' value = "<?php echo $noticia->titulo; ?>">
  </div>
  
  
  <div class='form-group' >
    <label for='exampleFormControlTextarea1'>descrição</label>
    <textarea class='form-control' id='exampleFormControlTextarea1' name='descricao' rows='8'> <?php echo $noticia->descricao ?></textarea>
  </div>
  <button type='submit' class='btn btn-primary'>Fazer alterações</button>
<a href="<?php echo HOME_URI.'inicio/index'?>"><button type='button' id = 'backHome' class='btn btn-primary'>Voltar á página Home</button></a>
</form>

    
    </main>
    </html>