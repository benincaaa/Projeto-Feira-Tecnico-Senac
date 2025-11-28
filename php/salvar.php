<?php
include "conexao.php";

$id_usuario = $_POST["id_usuario"] ?? null;
$texto = $_POST["texto"] ?? "";

if (!$id_usuario || empty($texto)) {
    die("Erro");
}

$sql = "INSERT INTO reclamacoes (id_usuario, texto) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

$stmt->bind_param("is", $id_usuario, $texto);

if ($stmt->execute()) {
    header("Location: ../obrigado.php");
    exit;
} else {
    die("Erro ao salvar a reclamação: " . $stmt->error);
}

$conn->close();
?>