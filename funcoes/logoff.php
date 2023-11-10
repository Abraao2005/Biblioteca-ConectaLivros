<?php
require_once("recuperaAluno.php");
$aluno= null;
session_destroy();
header("location: ../index.php");