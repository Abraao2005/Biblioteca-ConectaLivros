<?php
require_once("../funcoes/recuperaAluno.php");
require_once("../classes/biblioteca.php");
$biblioteca = new Biblioteca();
if(isset($_GET['id'])){
$idLivro = $_GET["id"];
$biblioteca->retirada($idLivro,$aluno);
}

?>
