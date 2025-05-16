<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];

    $stmt = $mysqli->prepare("SELECT * FROM pessoas WHERE nome = ? AND cpf = ?");
    $stmt->bind_param("ss", $nome, $cpf);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo "<p style='color:green;'>Login bem-sucedido! Bem-vindo, $nome.</p>";
        // Você pode redirecionar para uma página protegida aqui
        // header("Location: painel.php"); exit;
    } else {
        echo "<p style='color:red;'>Nome ou CPF inválido.</p>";
    }

    $stmt->close();
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <label>Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label>CPF:</label>
        <input type="text" name="cpf" required><br><br>

        <input type="submit" value="Entrar">
    </form>

    <p>Não tem cadastro? <a href="index.php">Clique aqui para se registrar</a></p>
</body>
</html>
