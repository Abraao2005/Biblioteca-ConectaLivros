<?php
require_once("../funcoes/recuperaAluno.php");
require_once("../classes/biblioteca.php");
$arr = $aluno->bd->selectBD('livro_aluno','aluno_id',$aluno->user->id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca ConectaLivros</title>
    <style>
        .acao {
            margin-top: 5px;
            padding: 0.5em;
            background-color: #333;
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
            align-self: flex-end;
            display: inline-block;
            /* Torna o link um bloco em linha para adicionar estilos */
            border-radius: 4px;
            /* Cantos arredondados */
            transition: background-color 0.3s ease;
            /* Transição suave da cor de fundo */
            border: 1px solid gray;
        }

        .acao:hover {
            background-color: #555;
            /* Cor de fundo ao passar o mouse */
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #333;
            color: white;
            padding: 1em;
            text-align: right;
        }

        section {
            flex: 1;
            padding: 2em;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 1em;
            border: 1px solid #ddd;
            padding: 1em;
            background-color: #f9f9f9;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .acao-link {
            margin-top: 5px;
            padding: 0.5em;
            background-color: #333;
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
            align-self: flex-end;
        }

        .esconder {
            display: none;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 1em;
            text-align: center;
            width: 100%;
        }
    </style>
</head>

<body>

<header>
        <h1>Lista de Livros</h1>
        <p>Usuário: <strong><?php echo $aluno->user->userName; ?></strong></p>
        <a class="acao" href="main.php">HomePage</a>
    </header>


    <section>
        <h2>Livros Adquiridos</h2>
        <p>
            <?php if(isset($_SESSION["sucessDev"])):?>
                <?php echo $_SESSION["sucessDev"]; unset($_SESSION["sucessDev"])?>
            <?php endif;?>
        </p>
        <ul>
            <?php foreach($arr as $item):?>
            <li>
                <strong>Livro: 
                    <?php echo $item['livro']; ?>
                </strong>
                <a class="acao-link " href="../funcoes/devolveLivro.php?id_aluno=<?php echo $item['aluno_id']?>&id_biblioteca=<?= $item["biblioteca_id"]?>&id=<?=$item['id']?>">Devolver</a>
            </li>

            <?php  endforeach;?>


        </ul>
    </section>

    <footer>
        <p> &copy; 2023</p>
    </footer>

</body>

</html>