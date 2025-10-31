<?php

include '../config/db.php';

$sqlAFazer = "SELECT * FROM tarefas WHERE status= 'a fazer'";

$sqlFazendo = "SELECT * FROM tarefas WHERE status= 'fazendo'";

$sqlPronto = "SELECT * FROM tarefas WHERE status= 'pronto'";

$aFazer = $conn->query($sqlAFazer);

$fazendo = $conn->query($sqlFazendo);

$pronto = $conn->query($sqlPronto);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styles.css">
    <title>Gerenciar as Tarefas</title>
</head>

<body>
    <header>
        <h1>Gerenciador de tarefas</h1>
    </header>

    <main>
        <div class="center">
            <div class="linha">
                <h2>A fazer</h2>
                <?php
                if ($aFazer->num_rows > 0) {

                    echo "<table border ='1'>
                    <tr>
                        <th> ID </th>
                        <th> Descrisao </th>
                        <th> Setor </th>
                        <th> Prioridade </th>
                        <th> Status </th>
                        <th> Data de Criação </th>
                        <th> Ações </th>
                    </tr>
                    ";

                    while ($row = $aFazer->fetch_assoc()) {

                        echo "<tr>
                                <td> {$row['id']} </td>
                                <td> {$row['descrisao']} </td>
                                <td> {$row['setor']} </td>
                                <td> {$row['prioridade']} </td>
                                <td> {$row['status']} </td>
                                <td> {$row['data']} </td>
                                <td> 
                                    <a href='update.php?id={$row['id']}'>Editar<a>
                                    <a href='delete.php?id={$row['id']}'>Excluir<a>
                                
                                </td>
                            </tr>   
                        ";
                    }
                    echo "</table>";
                } else {
                    echo "Nenhum registro encontrado.";
                }
                ?>
            </div>

            <div class="linha">
                <h2>Fazendo</h2>
                <?php
                if ($fazendo->num_rows > 0) {

                    echo "<table border ='1'>
                    <tr>
                        <th> ID </th>
                        <th> Descrisao </th>
                        <th> Setor </th>
                        <th> Prioridade </th>
                        <th> Status </th>
                        <th> Data de Criação </th>
                        <th> Ações </th>
                    </tr>
                    ";

                    while ($row = $fazendo->fetch_assoc()) {

                        echo "<tr>
                                <td> {$row['id']} </td>
                                <td> {$row['descrisao']} </td>
                                <td> {$row['setor']} </td>
                                <td> {$row['prioridade']} </td>
                                <td> {$row['status']} </td>
                                <td> {$row['data']} </td>
                                <td> 
                                    <a href='update.php?id={$row['id']}'>Editar<a>
                                    <a href='delete.php?id={$row['id']}'>Excluir<a>
                                
                                </td>
                            </tr>   
                        ";
                    }
                    echo "</table>";
                } else {
                    echo "Nenhum registro encontrado.";
                }
                ?>
            </div>

            <div class="linha">
                <h2>Pronto</h2>
                <?php
                if ($pronto->num_rows > 0) {

                    echo "<table border ='1'>
                    <tr>
                        <th> ID </th>
                        <th> Descrisao </th>
                        <th> Setor </th>
                        <th> Prioridade </th>
                        <th> Status </th>
                        <th> Data de Criação </th>
                        <th> Ações </th>
                    </tr>
                    ";

                    while ($row = $pronto->fetch_assoc()) {

                        echo "<tr>
                                <td> {$row['id']} </td>
                                <td> {$row['descrisao']} </td>
                                <td> {$row['setor']} </td>
                                <td> {$row['prioridade']} </td>
                                <td> {$row['status']} </td>
                                <td> {$row['data']} </td>
                                <td> 
                                    <a href='update.php?id={$row['id']}'>Editar<a>
                                    <a href='delete.php?id={$row['id']}'>Excluir<a>
                                
                                </td>
                            </tr>   
                        ";
                    }
                    echo "</table>";
                } else {
                    echo "Nenhum registro encontrado.";
                }
                ?>
            </div>
        </div>

    </main>

    <a href="../index.php">Voltar</a>

</body>

</html>
<?php
$conn->close();
?>