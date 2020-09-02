<?php
include "classes/Conexao.php";
session_start();

$_SESSION['logado'] = 0;
//$_SESSION['password'] = 0;
//$_SESSION['password'] = 0;

   



if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
     $_SESSION['logado'] = 1;
    require "classes/Usuario.php";   
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    

$_SESSION['password'] = $senha;
$_SESSION['userEmail'] = $email;

            $conexao=Conexao::getInstance();
            $sql = "SELECT * FROM usuario u WHERE u.email = '$email' ";
            $sql = $conexao->prepare($sql);
            $sql->execute();
            
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            
$_SESSION['uid'] = $row['id'];

    $user = new Usuario();
    $user->SetEmail($email);
    $user->SetSenha($senha);
    
    if($user->login()):
        header("Location:index.php");
    else:
        $erro = "Erro ao Logar";
    endif;
}
else{
header("location:ope.php");
$erro = "Erro ao Logar";
echo $erro;
}
if (isset($_POST['csenha']) && !empty($_POST['csenha'])){
    require "classes/Usuario.php";
   
    $email = addslashes($_POST['email']);
     $senha = addslashes($_POST['senha']);
    $count = new Usuario();
    $count->Setchangepassword($csenha);
}
?>