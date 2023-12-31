<?php
require_once("../funcoes/recuperaAluno.php");
require_once("../classes/biblioteca.php");
$biblioteca = new Biblioteca();
    if($aluno->user->id== null || $aluno->user->userName == null){
     header("location:../index.php") ;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca ConectaLivros</title>
    <style>
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
        .acao {
            margin-top: 5px;
            padding: 0.5em;
            background-color: #333;
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
            align-self: flex-end;
            display: inline-block; /* Torna o link um bloco em linha para adicionar estilos */
            border-radius: 4px; /* Cantos arredondados */
            transition: background-color 0.3s ease; /* Transição suave da cor de fundo */
            border: 1px solid gray;
        }

        .acao:hover {
            background-color: #555; /* Cor de fundo ao passar o mouse */
        }
    </style>
</head>

<body>

    <header>
        <h1>Lista de Livros</h1>
        <p>Usuário: <strong><?php echo $aluno->user->userName; ?></strong></p>
        <a class="acao" href="alunoLivros.php">Meus livros</a>
        <a class="acao" href="../funcoes/logoff.php">Sair</a>
    </header>

    <section>
        <h2>Livros Disponíveis</h2>
        <p>
          <?php if(isset($_SESSION["erro"])):?>
          <?php echo $_SESSION['erro']; unset($_SESSION["erro"])?>
          <?php endif;?>
          <?php if(isset($_SESSION["sucess"])):?>
          <?php echo $_SESSION['sucess']; unset($_SESSION["sucess"])?>
          <?php endif;?>
        </p>
        <ul>
            <?php foreach ($biblioteca->showBooks() as $index => $item) : ?>
                <?php if ($item["disponivel"] == 1) : ?>
                    <li>
                        <strong>Livro: <?php echo $item['livro']; ?> </strong>
                        <a class="acao-link" href="../funcoes/pegarLivro.php?id=<?php echo $item['id'] ?>">Pegar da Biblioteca</a>
                        <a class="acao-link esconder" href="devolverLivro/livro-1">Devolver</a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>


        </ul>
    </section>

    <footer>
        <p>Seu Rodapé &copy; 2023</p>
    </footer>

</body>

</html>