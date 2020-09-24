<?php

?>

<main>
   
  <?php
   if(isset($_SESSION['logado'])){
       if($_SESSION['logado']==1){ 
           
           echo  "<a href='usuario/criar' class='btn'>ADD</a>";
       
       }
       if($_SESSION['logado'] == 0 || $_SESSION['logado'] !=1){
           echo"você não tem acesso a essa página";   
       }
   }   
   ?> 
    
   <table class="table">
   
   <thead>
       <tr><td>#</td><td>Nome</td><td>Email</td><td>   </td></tr>
   <?php
   
   $usuarios = new Usuario();
   
  $usuarios->exibir();
   ?>
   
   </thead>
   
   </table>
   </main>