<?php
include "conexao.php";

$email = $_POST["email"];
$senha = $_POST["senha"];
$texto = $_POST["texto"];

$sql = "SELECT id FROM usuarios WHERE email = ? AND senha = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $id = $row["id"];

    header("Location: ../revisao.php?id=$id&texto=" . urlencode($texto));
    exit;
} else {
    echo "Login inválido!";
}
?>
