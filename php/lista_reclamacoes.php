<?php
header('Content-Type: application/json; charset=utf-8');
include "conexao.php";

$limite = 6; // quantas reclamações retornar

$sql = "SELECT id, usuario_id, texto, criado_em FROM reclamacoes ORDER BY criado_em DESC LIMIT ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $limite);
$stmt->execute();
$result = $stmt->get_result();

$rows = [];
while ($row = $result->fetch_assoc()) {
    // evitar enviar dados sensíveis; apenas id (opcional), texto, criado_em e usuario_id
    $rows[] = [
        'id' => (int)$row['id'],
        'usuario_id' => $row['usuario_id'] !== null ? (int)$row['usuario_id'] : null,
        'texto' => $row['texto'],
        'criado_em' => $row['criado_em']
    ];
}

echo json_encode($rows, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

$conn->close();
?>
