<?php
require_once('../funcoes/recuperaAluno.php');
require_once('../classes/biblioteca.php');

$biblioteca = new Biblioteca();
if(isset($_GET['id_biblioteca'])&&isset($_GET['id'])){

$aluno->remove($_GET['id']);
$biblioteca->devolucao($_GET['id_biblioteca']);
session_start();
$_SESSION['sucessDev'] = 'O livro foi devolvido com sucesso';
header("location:../paginas/alunoLivros.php");
}