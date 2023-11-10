<?php
require_once("../helpers/banco.php");
class Aluno
{

  
    public User $user;
    public BD_Controller $bd;
    function __construct(){
    //   $this->user = new User($userName,$password);
    $this->user = new User();
      $this->bd = new BD_Controller();
    }
        
    
    public function addBook($idBook,$aluno)
    {
        $this->bd->registerBook($idBook[0]["livro"],$idBook[0]["id"],$aluno->user->id);
    }

    public function remove($book){
        $this->bd->removeBook($book);
       
    }
    function setData($id,$user, $password)
    {
        $this->user->id = $id;
        $this->user->userName = $user;
        $this->user->password = $password;
    }
}
class User
{   public $id = "";
    public  $userName = "";
    public  $password = "";

}
