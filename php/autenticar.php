<?php
include "conexao.php";

$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";
$texto = $_POST["texto"] ?? "";

$sql_insert = "INSERT INTO usuarios (email, senha) VALUES (?, ?)";
$stmt_insert = $conn->prepare($sql_insert);
$stmt_insert->bind_param("ss", $email, $senha);

if ($stmt_insert->execute()) {
    $novo_id = $conn->insert_id;
    header("Location: ../revisao.php?id=$novo_id&texto=" . urlencode($texto));
    exit;
} else {
    die("Erro ao cadastrar o usuário: " . $stmt_insert->error);
}

$conn->close();
?>