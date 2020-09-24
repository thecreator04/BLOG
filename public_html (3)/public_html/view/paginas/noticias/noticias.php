<?php
/*
?>
<html>

<main>
    <?php
    
if (isset($_SESSION["logado"])) {

    if($_SESSION['logado'] == 1){
    echo "<a href='noticia/criar' class='btn'><button type='button' class='btn btn-success'> + news</button></a>";
    } 
    else{
        
    }   
} 
    
    ?>
  
   
    
   

<div class="panel-heading"><h1>Notícias</h1></div>


<?php
if(isset($noticias)){
     
    foreach($noticias AS $noticia){
         $noticia_id = $noticia->id;
         if (isset($_SESSION["logado"])) {

         if($_SESSION['logado']==1){
      
            echo"<a href='".HOME_URI."noticia/delete?id=".$noticia->id."'>excluir</a>";
         }
        }
            
      
        
        
    ?>
 
    <div class="panel panel-primary">
    <div class="panel-heading"><h2><?php echo $noticia->titulo; ?></h2></div>
        <?php echo substr($noticia->descricao,0,180)."..." ?><a href="<?php echo HOME_URI."noticia/ver/".$noticia->id;?>">Ler mais</a>
        <div class='data'><span class="label label-primary"><?php echo $noticia->data ?></span><span class="label label-primary"><?php echo "Por:".$noticia->nome_usuario ?></span></div>
    
    </div>
    <?php
 //   echo "<a><button>editar</button></a>"
    
    }
}
?>
    

</main>
</html>
*/
?>