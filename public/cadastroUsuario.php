<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])):

    header("Location: index.php");

endif;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = " INSERT INTO usuario (nome,email) VALUE ('$nome','$email')";

    if ($conn->query($sql) === true) {
        echo "Novo registro criado com sucesso.";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styles.css">
    <title>Cadastro de usuarios</title>
</head>
<body>

    <form method="POST" action="cadastroUsuario.php">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <input type="submit" value="Adicionar">

    </form>
    
    <a href="../menu.php">Voltar</a>

</body>
</html>