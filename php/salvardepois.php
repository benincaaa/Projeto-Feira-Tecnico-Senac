<?php
include "conexao.php";

$id = $_POST["id"];
$texto = $_POST["texto"];

$sql = "UPDATE reclamacoes SET texto = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $texto, $id);
$stmt->execute();

echo "Reclamação atualizada com sucesso!";
