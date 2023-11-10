<?php
$username = null;
$password = null;
require_once("../classes/alunos.php");







if (isset($_GET["password"]) && isset($_GET["username"]) && !empty($_GET["password"]) && !empty($_GET["username"])) {
    login();
} else {
    session_start();
    $_SESSION["erros"] = "Campo login/senha vazios";
    header("location:../index.php");
}
if (isset($_POST["passwordC"]) && isset($_POST["usernameC"]) && !empty($_POST["passwordC"]) && isset($_POST["usernameC"])) {
    register();
}

function register()
{
    session_destroy();
    $username = $_POST["usernameC"];
    $password = $_POST["passwordC"];
    if(strlen($password) >= 8){
        $aluno = new Aluno();
        $aluno->user->password = $password;
        $aluno->user->userName = $username;
        $aluno->bd->registerUser($aluno->user);
        session_start();
        $_SESSION["user"] = "Usuario cadastrado com sucesso, logue-se por favor!";
        header("location: ../index.php");
    }else{
        session_start();
        $_SESSION["erro"] = "A senha tem que ter pelo menos 8 caracteres";
        header("location: ../funcoes/cadastro.php");
    }
  
  
 
}
function login()
{

    $username = $_GET["username"];
    $password = $_GET["password"];
    $aluno = new Aluno();
    $retur = $aluno->bd->selectBD("aluno", "username", $username);
    if (!empty($retur)) {

        if ($retur[0]["senha"] == $password) {
            session_start();
            $aluno = new Aluno();
            $aluno->user->userName = $retur[0]["username"];
            $aluno->user->id = $retur[0]["id"];
            $aluno->user->password = $retur[0]["senha"];
            $_SESSION['aluno'] = serialize($aluno);
            header("location:../paginas/main.php");
        } else {
            session_start();
            $_SESSION["erros"] = "Senha incorreta";
            header("location:../index.php");
        }
    } else {
        session_start();
        $_SESSION["erros"] = "Usuario não encontrado";
        header("location: ../index.php");
    }
}
