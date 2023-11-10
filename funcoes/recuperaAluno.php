<?php
require_once("../classes/alunos.php");
session_name();
session_start();
$dados = isset($_SESSION["aluno"]) ? $_SESSION["aluno"]:null;
recuperaAluno();
function recuperaAluno()
{
    global $aluno;
    global $dados;
    $aluno = unserialize($dados);
}
?>