<?php
include "conexao.php";

$id_usuario = $_POST["id_usuario"];
$texto = $_POST["texto"];

$sql = "INSERT INTO reclamacoes (id_usuario, texto) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $id_usuario, $texto);
$stmt->execute();

header("Location: obrigado.php");
exit;
