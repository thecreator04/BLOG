<?php

class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;

    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }
    public function setNome($nome){
        $this->nome=$nome;
    }
    
    public function getNome(){
        return $this->nome;
    }

    public function setEmail($email){
        $this->email=$email;
    }
    
    public function getEmail(){
        return $this->email;
    }

    public function setSenha($senha){
        $this->senha=$senha;
    }
    
    public function getSenha(){
        return $this->senha;
    }


    public function index(){
        $logado =  $_SESSION['logado'];
       
        
        if(isset($_SESSION['password'])){
            if($_SESSION['password']=="abc123"){
               
                $this->edit();
            }
            else{
        $this->listar();
            }
    }
}

    public function listar(){
        include HOME_DIR."view/paginas/usuarios/listar.php";
    }

    public function criar(){
        include HOME_DIR."view/paginas/usuarios/form_usuario.php";
    }

    public function inserir(){
        $conexao=Conexao::getInstance();
        if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['email']) && !empty($_POST['email'])){
           
           $nome = $_POST['nome'];
          $email = $_POST['email'];
          
          $senha=  "abc123";
    
          //echo $titulo." ,".$descricao." ,".$data." ,".$usuario_uid;
          
           /* ('".$titulo."', '".$descricao."', '".$data."', '".$usuario_uid."')";*/
          $sql = "INSERT INTO usuario (nome, email, senha) VALUES ('".$nome."', '".$email."', '".$senha."')";
           $sql=$conexao->prepare($sql);
          $sql->execute();

          $this->index();

        }
    }
    public function edit(){
        if(isset($_SESSION['logado'])){
            if($_SESSION['logado']==1){
                
        
                if(!isset($_SESSION['email'])){
                  $email = $_SESSION['userEmail'];
                    $conexao=Conexao::getInstance();
                    $sql = "SELECT * FROM usuario WHERE usuario.email ='".$email."'";
                    $sql = $conexao->query($sql);
                    $sql->execute();
                   if($sql->rowCount()>0){

                    $usuario=$sql->fetch(PDO::  FETCH_OBJ);
                   }
                }
            }
            if($_SESSION['logado']==0){
                echo"<h4 style='color:red'>*Você precisa estar logado em uma conta para poder criar e visualizar usuários</h4>";
            }
            
        }

        include HOME_DIR."view/paginas/usuarios/edit.php";

    }
    public function edited(){
        if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
            $Email = $_POST['email'];
            $Nome = $_POST['nome'];
            $Senha = $_POST['senha'];

            $conexao=Conexao::getInstance();
            $sql ='UPDATE usuario SET nome ="'.$Nome.'", email = "'.$Email.'", senha = "'.$Senha.'" 
            WHERE "'. $_SESSION['uid'].'"= usuario.id;';

        
            
           
            $sql = $conexao->prepare($sql);
            $sql->execute();
            
        }
         header("Location:".HOME_URI."usuario");
        

    }

    public function exibir(){
        echo $_SESSION['logado'];
            $usuario_uid = $_SESSION['uid'];
        if(isset($_SESSION['logado'])){
            if($_SESSION['logado']==1){
                echo"logado";
        
                if(!isset($_SESSION['email'])){
                    $conexao=Conexao::getInstance();
                    $sql = "SELECT * FROM usuario";
                    $sql = $conexao->prepare($sql);
                    $sql->execute();
                    while($linha = $sql->fetch(PDO::FETCH_ASSOC))
                    {
                        $uid = $linha['id'];
                   
                //   <a href='".HOME_URI."usuario/deletar'.$usuarios->id.'>X</a>";
                    echo "<tr><td>".$uid."</td><td>".$linha['nome']."</td><td> ".$linha['email']."</td><td>
                    <a href='".HOME_URI."usuario/delete?id=".$uid."'>X</a>";
             
        
                   
                      //<a href='".HOME_URI."usuario/deletar/'.$usuarios->id'>X</a>
                  /*    <a href='".HOME_URI."usuario/deletar/'.$usuarios->id'><button type='submit' name ='excluir' value'".$linha['id']."'>   x   </button></a>*/
                    
                    }
                }
            }
            if($_SESSION['logado']==0){
                echo"<h4 style='color:red'>*Você precisa estar logado em uma conta para poder criar e visualizar usuários</h4>";
            }
            
        }
        if(!isset($_SESSION['logado'])){
       
             echo"<h4 style='color:red'>*Você precisa estar logado em uma conta para poder criar e visualizar usuários</h4>";
        
        }
        
    }

    public function login(){
        $_SESSION['logado'] = 0;
        include HOME_DIR."view/paginas/usuarios/login.php";

    }
    public function delete(){
        $id = $_GET['id'];
        $conexao = Conexao::getInstance();
         $sql = 'DELETE FROM usuario WHERE id='.$id;
       $sql=$conexao->prepare($sql);
        $sql->execute();
$this->listar();

    }
    

public function autenticar(){

$_SESSION['logado'] = 0;
    
        
if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
   
  
     
   $email = addslashes($_POST['email']);
   $senha = addslashes($_POST['senha']);
   

$_SESSION['password'] = $senha;
$_SESSION['userEmail'] = $email;

echo $email." X ";
try{
    // $pdo = parent::getDB();
     $conexao=Conexao::getInstance();
   
    $sql="SELECT * FROM usuario WHERE email = :email AND senha = :senha";
    //$_SESSION['uid'] = ;

     $sql=$conexao->prepare($sql);
    // $user=$resultado->fetch(PDO::FETCH_OBJ);
     
     $sql->bindValue("email", $email);
     $sql ->bindValue("senha", $senha);
     $sql->execute();
    
     if($sql ->rowCount() > 0){
         $dado = $sql->fetch();
         $_SESSION['uid'] = $dado['id'];
        $_SESSION['nome'] = $dado['nome'];
        
         $_SESSION['logado'] = 1;
         $logado =  $_SESSION['logado'];
      
         header("Location:".HOME_URI."usuario");
           
        
     }
     else{
         header("Location:".HOME_URI."usuario/login");
         $_SESSION['logado'] = 0;
     }

    

    
 }
 catch(PDOException $e){
     echo "Erro: ".$e->getMessage();
 }
        
    }

else{
    $_SESSION['logado'] = 0;
    $erro = "Erro ao Logar";
    echo $erro;
    header("location:".HOME_URI."usuario/login");
   
    }
}}