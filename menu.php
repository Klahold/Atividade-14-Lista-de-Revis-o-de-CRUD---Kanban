<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styles.css">
    <title>Menu</title>
</head>

<body>
    <header>
        <H1>Menu</H1>
    </header>

    <main>
        <div class="botao">
            <p><a href="public/cadastroUsuario.php">Cadastrar Usuarios</a></p>
        </div>

        <br>

        <div class="botao">
            <p><a href="public/cadastroTarefas.php">Cadastrar Tarefas</a></p>
        </div>

        <br>

        <div class="botao">
            <p><a href="public/gerenciamentoTarefas.php">Gerenciamento de Tarefas</a></p>
        </div>

    </main>

    <footer>
        <?php
        $response = file_get_contents('https://catfact.ninja/fact');
        $data = json_decode($response, true);
        ?>
        <p>
            <?php
            echo $data['fact'];
            ?>
        </p>
    </footer>


</body>

</html>