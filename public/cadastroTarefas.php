<?php

include '../config/db.php';

$usuarios = $conn->query("SELECT id, nome FROM Usuario");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $descrisao = $_POST['descrisao'];
    $setor = $_POST['setor'];
    $prioridade = $_POST['prioridade'];
    $status = $_POST['status'];
    $usuario = $_POST['usuario'];

    $sql = " INSERT INTO Tarefas (descrisao,setor,prioridade,status,id_usuario) VALUE ('$descrisao','$setor','$prioridade','$status','$usuario')";

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
    <title>Cadastrar tarefas</title>
</head>

<body>

    <form method="POST" action="cadastroTarefas.php">

        <label for="descrisao">Descrição:</label>
        <input type="text" name="descrisao" required>

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
            <option value="a fazer">A fazer</option>
            <option value="fazendo">Fazendo</option>
            <option value="pronto">Pronto</option>
        </select>

        <label for="usuario">Vincular ao Usuario:</label>
        <select name="usuario" required>
            <option value="">Selecione</option>
            <?php while ($row = $usuarios->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= ($row['nome']) ?></option>
            <?php endwhile; ?>
        </select>

        <input type="submit" value="Adicionar">

    </form>

    <p><a href="../index.php">Voltar</a></p>

</body>

</html>