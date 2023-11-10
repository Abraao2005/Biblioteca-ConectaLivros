<?php
require_once("../helpers/banco.php");
class Biblioteca
{
    private BD_Controller $bd;
    
    function __construct()
    {
        $this->bd = new BD_Controller();
     
    }
    public function retirada(int $livroD, Aluno $aluno)
    {
        $arr =$this->bd->selectBD('biblioteca','id',$livroD);
        $livrosColetados = $this->bd->selectBD("livro_aluno","aluno_id",$aluno->user->id);  
        if(count($livrosColetados) <=2){
            $this->bd->updateBD('biblioteca','disponivel',0,"id",$livroD);
            $aluno->addBook($arr,$aluno);
            $_SESSION["sucess"] = "Parabéns pelo livro adquirido";
            header("location:../paginas/main.php");
    
        }else{
            $_SESSION["erro"] = "Não é possivel pegar mais de três livros";
            header("location:../paginas/main.php");
        }
 
    
       
    
 
    }
    public function devolucao(String $idBiblioteca){
        $this->bd->updateBD('biblioteca','disponivel',1,"id",$idBiblioteca);
    

   }
   public function showBooks() : array {

    $livros=$this->bd->selectBD('biblioteca','disponivel',true,"livro");
    return $livros;
   }
}


