<?php

class Comentario{
    private $id;
    private $comentario;
    private $data;
    private $noticia;
    private $usuario;

    public function setId($id){
        $this->id=$id;
    }
    
    public function getId(){
        return $this->id;
    }

    public function setComentario($comentario){
        $this->comentario=$comentario;
    }
    
    public function getComentario(){
        return $this->comentario;
    }

    public function setDatad($data){
        $this->data=$data;
    }
    
    public function getData(){
        return $this->data;
    }

    public function setNoticia($noticia){
        $this->noticia=$noticia;
    }
    
    public function getNoticia(){
        return $this->noticia;
    }

    public function setUsuario($usuario){
        $this->usuario=$usuario;
    }
    
    public function getUsuario(){
        return $this->usuario;
    }
    public function exibir($id){
        $sql = "SELECT comentario FROM comentario WHERE noticia_id = '$noticia->id'";
        $sql = $conexao->prepare($sql);
        $sql->execute();
        while($linha = $sql->fetch(PDO::FETCH_ASSOC))
        {
        echo "<div class='panel panel-primary'><div class='panel-heading'>
        <h5 class='panel-title'>Comentarios</h5>
    </div><tr><td>&nbsp &nbsp".$linha['comentario']."</td><td> "."</li></br></br></br></div>";
    }
}

    public function newComent(){
            $noticia_id = $_SESSION['noticiaId'];
            
            echo $noticia_id;
            $conexao=Conexao::getInstance();
               
              if(isset($_POST['coment']) && !empty($_POST['coment'])){
                 
                 $coment = $_POST['coment'];
                
                
                 /* ('".$titulo."', '".$descricao."', '".$data."', '".$usuario_uid."')";*/
                $sql = "INSERT INTO comentario (comentario, noticia_id) VALUES ('".$coment."', '".$noticia_id."')";
                 $sql=$conexao->prepare($sql);
                $sql->execute();
                header("Location:".HOME_URI."noticia/ver/".$noticia_id);
        }
        
    
    }
}