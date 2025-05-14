<?php

require_once __DIR__ . '/../config/conexao.php';
session_start();

if (isset($_POST['nome']) && isset($_POST['senha'])) {

    $nome = $mysqli->real_escape_string($_POST['nome']);
    $senha = $_POST['senha']; // Não precisa escapar a senha para verificação

    $sql_code = "SELECT * FROM usuario WHERE nome = '$nome'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    if ($sql_query->num_rows === 1) {
        $usuario = $sql_query->fetch_assoc();

        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");
            exit();
        } else {
            echo "Falha ao logar! Username ou senha incorretos.";
        }
    } else {
        echo "Falha ao logar! Username ou senha incorretos.";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Document</title>
</head>
<body>

    <div>
        <h2>Acesse sua Conta</h2>
        <form action="" method="POST">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" required>

            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha" required>

            <button type="submit" name="login">ENTRAR</button>
        </form>
    </div>

    <h3>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></h3>
    
</body>
</html>