<?php
include 'config/db.php';

session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

$msg = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST["nome"] ?? "";
    $email = $_POST["email"] ?? "";

    $stmt = $conn->prepare("SELECT id, nome, email FROM Usuario WHERE nome=? AND email=?");
    $stmt->bind_param("ss", $user, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $dados = $result->fetch_assoc();
    $stmt->close();

    if ($dados) {
        $_SESSION["user_id"] = $dados["id"];
        $_SESSION["nome"] = $dados["nome"];
        header("Location: index.php");
        exit;
    } else {
        $msg = "Usuário ou senha incorretos!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styles.css">
    <title>Login</title>
</head>

<body>
    <?php if (!empty($_SESSION["user_id"])):
        header("Location: menu.php");
    ?>
        <main>
        <?php else: ?>
            <div class="card">
                <h3>Login</h3>
                <?php if ($msg): ?><p class="msg"><?= $msg ?></p><?php endif; ?>
                <form method="post">
                    <div>
                        <input type="text" name="nome" placeholder="Usuário" required class="campo">
                    </div>

                    <div>
                        <input type="email" name="email" placeholder="Email" required class="campo">
                    </div>

                    <button type="submit">Entrar</button>
                </form>
            </div>
        <?php endif; ?>
        </main>
</body>

</html>