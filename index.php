<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca ConectaLivros</title>
    <?php require("./css/css.php"); ?>
</head>

<body>
    <div id="main">
        <form action="./funcoes/tratamento.php" method="get">
            <h2>Login</h2>
            <p>

                <?php
                if (isset($_SESSION["erros"])) {
                    echo $_SESSION["erros"];
                    session_destroy();
                }

                ?>
            </p>
            <p>

                <?php if (isset($_SESSION["user"])) {
                    echo $_SESSION["user"];
                    session_destroy();
                }

                ?>
            </p>
            <label for="" class="label">Username:<br>
                <input type="text" name="username">
            </label>
            <label for="" class="label">Password:<br>
                <input type="password" name="password">
            </label>
            <label for="" class="label">
                <input type="submit" value="Logar" id="btn-submit">
            </label>
            <p>Não tem uma conta? <a href="funcoes/cadastro.php">Cadastre-se</a></p>
        </form>
    </div>

</body>

</html>