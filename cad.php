<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];

    $stmt = $mysqli->prepare("INSERT INTO pessoas (nome, cpf) VALUES (?, ?)");
    $stmt->bind_param("ss", $nome, $cpf);

    if ($stmt->execute()) {

        header("Location: login.php");
        exit;
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
