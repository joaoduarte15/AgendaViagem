<?php

require_once __DIR__ . '/../config/conexao.php';

$erro = ''; 
if (isset($_POST['nome']) && isset($_POST['senha']) && isset($_POST['csenha'])) {

    $nome = trim($_POST['nome']);
    $senha = trim($_POST['senha']);
    $csenha = trim($_POST['csenha']);

    if (preg_match('/[^a-zA-Z0-9]/', $nome)) {
        $erro = "Erro: O nome deve conter apenas letras e números, sem espaços ou caracteres especiais!";
    }

    elseif (empty($nome)) {
        $erro = "Erro: O nome não pode estar vazio!";
    }

    elseif (preg_match('/\s/', $senha)) {
        $erro = "Erro: A senha não pode conter espaços!";
    }

    elseif ($senha !== $csenha) {
        $erro = "Erro: As senhas não coincidem!";
    }

    elseif (strlen($senha) < 8) {
        $erro = "Erro: A senha deve ter no mínimo 8 caracteres!";
    }
    else {

        $nome_esc = $mysqli->real_escape_string($nome);
        $senha_esc = $mysqli->real_escape_string($senha);


        $sql_verifica = "SELECT * FROM usuario WHERE nome = '$nome_esc'";
        $query_verifica = $mysqli->query($sql_verifica) or die("Falha na execução do código SQL: " . $mysqli->error);

        if ($query_verifica->num_rows > 0) {
            $erro = "Erro: Usuário já cadastrado!";
        } else {

            $senha_hash = password_hash($senha_esc, PASSWORD_DEFAULT);

            $sql_insert = "INSERT INTO usuario (nome, senha) VALUES ('$nome_esc', '$senha_hash')";
            if ($mysqli->query($sql_insert)) {

                header("Location: index.php");
                exit();
            } else {
                $erro = "Erro ao cadastrar: " . $mysqli->error;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="container">
        <h2>Cadastre-se</h2>
        <?php if (!empty($erro)): ?>
            <div class="mensagem-erro-senha"><?php echo $erro; ?></div>
        <?php endif; ?>
        <form action="" method="POST">
    <label for="nome">Nome: </label>
    <input type="text" name="nome" id="nome" required>

    <label for="senha">Senha: </label>
    <input type="password" name="senha" id="senha" minlength="8" maxlength="20" required>

    <label for="csenha">Confirmar Senha: </label>
    <input type="password" name="csenha" id="csenha" minlength="8" maxlength="20" required>

    <button type="submit" name="cadastro">CADASTRAR</button>
    <button type="button" onclick="window.location.href='index.php'">Voltar para Login</button>
</form>
        </form>
    </div>
</body>
</html>