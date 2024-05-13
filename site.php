<?php
include('index.php');

if (isset($_POST['email']) || isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if (strlen($_POST['email']) == 0) {
        echo "Preencha sua senha";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL:" . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['senha'] = $usuario['senha'];

            header("Location: painel.php");
        } else {
            echo "Falha ao logar, email ou senha incorretos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>AC Digital vagas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Reddit+Sans:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="section">
        <div class="redline"></div>
        <div class="img">
            <img src="images/predios.jpg" alt="trabalho em equipe" width="500px" height="500px">
            <div class="section2">
                <div class="login">
                    <H1>Bem vindo</H1>
                    <form action="" method="POST">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                        <br>
                        <label for="senha">Senha:</label>
                        <input type="password" id="senha" name="senha" required>
                        <br>
                        <button type="submit">Entrar</button>
                        <button type="cadastrar">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="class">
        </div>
    </div>
</body>

</html>