<?php
require_once __DIR__ . '/../includes/protect.php';
require_once __DIR__ . '/../config/conexao.php';
$user_id = $_SESSION['id'];

// Processar exclusão de viagem
if (isset($_GET['excluir'])) {
    $id_excluir = (int)$_GET['excluir'];
    $sql_check = "SELECT id FROM evento WHERE id = $id_excluir AND usuario_id = $user_id";
    $result_check = $mysqli->query($sql_check);

    if ($result_check && $result_check->num_rows > 0) {
        $sql_delete = "DELETE FROM evento WHERE id = $id_excluir";
        if ($mysqli->query($sql_delete)) {
            $_SESSION['mensagem'] = "<p style='color: green;'>Viagem excluída com sucesso!</p>";
        } else {
            $_SESSION['mensagem'] = "<p style='color: red;'>Erro ao excluir: " . $mysqli->error . "</p>";
        }
    } else {
        $_SESSION['mensagem'] = "<p style='color: red;'>Viagem não encontrada ou você não tem permissão para excluí-la.</p>";
    }
    header("Location: painel.php");
    exit;
}

// Processa o formulário de cadastro de viagem
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $mysqli->real_escape_string($_POST['titulo']);
    $data_inicio = $mysqli->real_escape_string($_POST['data_inicio']);
    $data_fim = $mysqli->real_escape_string($_POST['data_fim']);

    if (!strtotime($data_inicio) || !strtotime($data_fim)) {
        $_SESSION['mensagem'] = "<p style='color: red;'>Datas inválidas!</p>";
    } elseif ($data_fim < $data_inicio) {
        $_SESSION['mensagem'] = "<p style='color: red;'>A data de fim não pode ser anterior ao início!</p>";
    } else {
        $sql_insert = "INSERT INTO evento (titulo, data_inicio, data_fim, usuario_id) VALUES ('$titulo', '$data_inicio', '$data_fim', '$user_id')";
        if ($mysqli->query($sql_insert)) {
            $_SESSION['mensagem'] = "<p style='color: green;'>Viagem cadastrada com sucesso!</p>";
        } else {
            $_SESSION['mensagem'] = "<p style='color: red;'>Erro ao cadastrar: " . $mysqli->error . "</p>";
        }
    }
    header("Location: painel.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel da Agenda de Viagem</title>
    <link rel="stylesheet" href="../public/css/painel.css">
</head>
<body>
<div class="container">
    <h2>Adicionar Nova Viagem</h2>
    <form method="POST">
        <label for="titulo">Título da Viagem:</label>
        <input type="text" name="titulo" id="titulo" required>
        <label for="data_inicio">Data de Início:</label>
        <input type="date" name="data_inicio" id="data_inicio" required>
        <label for="data_fim">Data de Fim:</label>
        <input type="date" name="data_fim" id="data_fim" required>
        <button type="submit">Adicionar Viagem</button>
    </form>
</div>

<div class="eventos-container">
    <h2>Suas Viagens</h2>
    <?php
    if (isset($_SESSION['mensagem'])) {
        echo $_SESSION['mensagem'];
        unset($_SESSION['mensagem']);
    }
    ?>
    <table class="eventos">
        <tr>
            <th>Título</th>
            <th>Início</th>
            <th>Fim</th>
            <th>Ações</th>
        </tr>
        <?php
        $result = $mysqli->query("SELECT id, titulo, data_inicio, data_fim FROM evento WHERE usuario_id = $user_id ORDER BY data_inicio DESC");
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . htmlspecialchars($row['titulo']) . "</td>
                    <td>" . date("d/m/Y", strtotime($row['data_inicio'])) . "</td>
                    <td>" . date("d/m/Y", strtotime($row['data_fim'])) . "</td>
                    <td>
                        <a href='painel.php?excluir=" . $row['id'] . "' class='btn-excluir' onclick='return confirm(\"Tem certeza que deseja excluir esta viagem?\")'>Excluir</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='4' class='no-eventos'>Nenhuma viagem encontrada.</td></tr>";
        }
        ?>
    </table>
</div>

<a href="logout.php" class="logout">Sair</a>
</body>
</html>
