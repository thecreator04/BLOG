<?php


class Noticia{
    private $id;
    private $titulo;
    private $descricao;
    private $comentarios;
    private $data;
    private $usuario;
   

    public function setId($id){
        $this->id=$id;
    }
    
    public function getId(){
        return $this->id;
    }

    public function setTitulo($titulo){
        $this->titulo=$titulo;
    }
    
    public function getTitulo(){
        return $this->titulo;
    }

    public function setDescricao($descricao){
        $this->descricao=$descricao;
    }
    
    public function getDescricao(){
        return $this->descricao;
    }

    public function setComentarios($comentarios){
        $this->comentarios=$comentarios;
    }
    
    public function getComentarios(){
        return $this->comentarios;
    }
    public function setData($data){
        $this->data=$data;
    }
    
        public function getData(){
        return $this->data;
    }
    public function setUsuario($usuario){
        $this->usuario=$usuario;
    }
    
    public function getUsuario(){
        return $this->usuario;
    }

    public function index(){
        
       
        $this->listar();
    }
    

  public function listar(){
    echo"<html><main>";
        $conexao=Conexao::getInstance();
        $sql="SELECT id, titulo, descricao, usuario_id, DATE_FORMAT(data, '%d/%m/%Y') AS data,
        (SELECT nome FROM usuario WHERE id=noticia.usuario_id)AS nome_usuario 
        FROM noticia
        ORDER BY id DESC LIMIT 5";
        
             
        
        $resultado=$conexao->query($sql);
        $noticias=null;
       

        echo "<div class='panel-heading'><h1>Notícias</h1></div>";
        if (isset($_SESSION["logado"])) {

            if($_SESSION['logado'] == 1){
            echo "<a href='noticia/criar' class='btn'><button type='button' class='btn btn-success'> + news</button></a><br>";
            } 
            else{
                
            }   
        } 
        while($noticia=$resultado->fetch(PDO::FETCH_ASSOC)){
            $id = $noticia['id'];
            $usuarioNot = $noticia['usuario_id'];
            
           
           // $uid = $noticia['id'];
             $usuario_uid = $_SESSION['uid'];
            
                  
        if(isset($_SESSION['logado'])){
           if($_SESSION['logado']==1 && $usuario_uid == $usuarioNot || $usuario_uid ==1){
           echo"<a href='".HOME_URI."noticia/delete?id=".$id."'>excluir</a> <a href='".HOME_URI."noticia/editar?id=".$id."'>editar</a>";
           }
        }

            echo"<div class='panel panel-primary'>
            <div class='panel-heading'><h2>".$noticia['titulo']."</h2></div> ".substr($noticia['descricao'],0,180)."...<a href=".HOME_URI."noticia/ver/".$noticia['id'].">Ler mais</a>
                <div class='data'><span class='label label-primary'>".$noticia['data']."</span><span class='label label-primary'> Por:".$noticia['nome_usuario']."</span></div>
            
            </div>";  
        }
        echo "</main></html>";
        
        include HOME_DIR."view/paginas/noticias/noticias.php";
    }

    public function ver($id){
        $conexao=Conexao::getInstance();
        $sql="SELECT id, titulo, descricao, DATE_FORMAT(data, '%d/%m/%Y') AS data,
        (SELECT nome FROM usuario WHERE id=noticia.usuario_id)AS nome_usuario 
        FROM noticia
        WHERE id=".$id;

        $resultado=$conexao->query($sql);
        $noticia=$resultado->fetch(PDO::FETCH_OBJ);
        include HOME_DIR."view/paginas/noticias/noticia.php";
    }
    public function criar(){
      

        
        if(isset($_SESSION['logado'])){
            if($_SESSION['logado']==1){ 
                
                include HOME_DIR."view/paginas/noticias/criar.php"; 
            
            }
            if($_SESSION['logado'] == 0 || $_SESSION['logado'] !=1){
                echo"você não tem acesso a essa página";   
            }
        }    
       
   

    }
    public function editar(){

        $id_noticia = $_GET['id'];

        echo $id_noticia;
        
        $conexao=Conexao::getInstance();
        $sql="SELECT * FROM noticia WHERE id=".$id_noticia;
         $sql = $conexao->query($sql);
         $sql->execute();
        if($sql->rowCount()>0){

         $noticia=$sql->fetch(PDO::  FETCH_OBJ);
        }

       

     


        include HOME_DIR."view/paginas/noticias/editar.php"; 


    }
    public function edited(){
        $id_noticia = $_GET['id'];
        echo $id_noticia;

       
       
        if(isset($_POST['titulo']) && !empty($_POST['titulo']) && isset($_POST['descricao']) && !empty($_POST['descricao'])){
            $setTitulo = $_POST['titulo'];
            $setDescricao = $_POST['descricao'];
            $usuario_uid = $_SESSION['uid'];
            $data = date("Y/m/d");
           
            echo $setTitulo;
            $conexao=Conexao::getInstance();
            $sql ='UPDATE noticia SET titulo ="'.$setTitulo.'", descricao = "'.$setDescricao.'", usuario_id = "'.$usuario_uid.'", data = "'.$data.'" 
            WHERE  noticia.id = '.$id_noticia.';';
          
           
            
           
            $sql = $conexao->prepare($sql);
            $sql->execute();
            
       
           // $_SESSION['userEmail'] =$setEmail;
           // $_SESSION['nome'] = $setNome;
           header("Location:".HOME_URI."noticia");
        }
       

        
       
    }
    public function coments(){
        $conexao=Conexao::getInstance();
        if(isset($_POST['coment']) && !empty($_POST['coment'])){
$comentario = $_POST['coment'];
$id_noticia = $_GET['id'];
$sql = "INSERT INTO comentario ( comentario,   ) VALUES ('".$titulo."', '".$descricao."', '".$data."', '".$usuario_uid."')";
$sql=$conexao->prepare($sql);
$sql->execute();



        }


    }
    public function inserir(){
        $conexao=Conexao::getInstance();
    if(isset($_POST['titulo']) && !empty($_POST['titulo']) && isset($_POST['descricao']) && !empty($_POST['descricao'])){
       
       $titulo = $_POST['titulo'];
      $descricao = $_POST['descricao'];
      $data = date("Y/m/d");
      $usuario_uid =  $_SESSION['uid'];

      //echo $titulo." ,".$descricao." ,".$data." ,".$usuario_uid;
      
       /* ('".$titulo."', '".$descricao."', '".$data."', '".$usuario_uid."')";*/
      $sql = "INSERT INTO noticia (titulo, descricao, data, usuario_id) VALUES ('".$titulo."', '".$descricao."', '".$data."', '".$usuario_uid."')";
       $sql=$conexao->prepare($sql);
      $sql->execute();

      $this->index();
  }

    }
    public function delete(){
        
        $conexao = Conexao::getInstance();
        $id = $_GET['id'];
$sql = "DELETE FROM comentario WHERE comentario.noticia_id = " .$id;
         
       $sql=$conexao->prepare($sql);
        $sql->execute();

 $sql = "DELETE FROM noticia WHERE noticia.id = " .$id;
 $sql=$conexao->prepare($sql);
 $sql->execute();

$this->listar();

    }
    


}


?>