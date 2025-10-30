<?php

include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $descrisao = $_POST['descrisao'];
    $setor = $_POST['setor'];
    $prioridade = $_POST['prioridade'];
    $status = $_POST['status'];

    $sql = " INSERT INTO usuarios (descrisao,setor,prioridade,status) VALUE ('$descrisao','$setor','$prioridade','$status')";

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
    <title>Document</title>
</head>
<body>

    <form method="POST" action="cadastroUsuario.php">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="setor">Setor:</label>
        <input type="text" name="setor" required>
        
        <label for="prioridade">Prioridade:</label>
        <select name="prioridade" required>
            <option value="baixa">Baixa</option>
            <option value="média">Medio</option>
            <option value="alta">Alta</option>
        </select>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="a fazer">Selecione</option>
            <option value="fazendo">Goleiro</option>
            <option value="pronto">Zagueiro</option>
        </select>

        <input type="submit" value="Adicionar">

    </form>

</body>
</html>