
 <?php
        
        
        $_SESSION['noticiaId'] = $noticia->id ;
        include HOME_DIR."classes/Comentario.php";
     
      

?>
<html>
<main>
  
<div class="panel-heading"><h1>Notícias</h1></div>
<div class="panel panel-primary">

<div class="panel-heading"><h1><?php echo $noticia->titulo ?></h1></div>

   <?php echo $noticia->descricao?>
   
   <div class='data'>
       <span class="label label-primary"><?php echo $noticia->data ?></span>
       <span class="label label-primary"><?php echo "Por:".$noticia->nome_usuario ?></span>
   </div>
 
   </div>
       
      <div class="media">
 

</div>
<?php


$conexao=Conexao::getInstance();
           $sql = "SELECT comentario FROM comentario WHERE noticia_id = '$noticia->id'";
           $sql = $conexao->prepare($sql);
           $sql->execute();
           while($linha = $sql->fetch(PDO::FETCH_ASSOC))
           {
           echo "<div class='panel panel-primary'><div class='panel-heading'>
           <h5 class='panel-title'>Comentarios</h5>
       </div><tr><td>&nbsp &nbsp".$linha['comentario']."</td><td> "."</li></br></br></br></div>";
           }
           $comentario = new Comentario();
?>
 <?php
    if (isset($_SESSION["logado"])) {
       if($_SESSION['logado']==1){
       ?>
   <div class="panel panel-primary">

       <div class="panel-heading">
           <h5 class="panel-title">Comentarios</h5>
       </div>
       
      
      
       
       <div class="coments">
           <p class="nome-user"><?php echo $comentario->getUsuario()?></p>
           <p class="coment-user"><?php echo $comentario->getComentario()?></p>
       </div>
      
      

        <form class="form" method="POST" action= "<?php echo HOME_URI?>comentario/newComent"  ?>   
           <div class="form-group">
           <input type="text" class="form-control" placeholder="Adicione um comentário" name="coment">
           <div class="input-form">
           <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
           </div>
           </div>      
           
       </form>
       <?php
       
    }
    if($_SESSION['logado']!=1){

        echo "<h4>você precisa estar logado para poder comentar as postagens, clique <a href='".HOME_URI."usuario/login'>aqui</a> para efetuar login no sistema  </h4>";
    }
}

 if (!isset($_SESSION["logado"])) {
       echo "<h4>você precisa estar logado para poder comentar as postagens, clique <a href='".HOME_URI."usuario/login'>aqui</a> para efetuar login no sistema  </h4>";
     
     
 }
   

       ?>
      

   </div>

   

</div>
   

</main>
</html>