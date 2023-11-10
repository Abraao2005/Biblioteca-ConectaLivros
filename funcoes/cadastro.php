<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca ConectaLivros</title>
    <?php require("../css/css.php") ?>
</head>

<body>
    <div id="main">
        <form action="../funcoes/tratamento.php" method="post">
            <h2>Cadastro</h2>
            <p>
                <?php
                if (isset($_SESSION["erro"])) {
                    echo $_SESSION["erro"];
                    session_destroy();
                }
                ?>
            </p> 
            <p>
                <?php
                if (isset($_SESSION["user"])) {
                    echo $_SESSION["user"];
                    session_destroy();
                }
                ?>
            </p>
            <label for="" class="label">Username:<br>
                <input type="text" name="usernameC">
            </label>
            <label for="" class="label">Password:<br>
                <input type="password" name="passwordC">
            </label>
            <label for="" class="label">
                <input type="submit" style="width:80px" value="Cadastrar" id="btn-submit">
            </label>
        </form>
    </div>

</body>

</html>