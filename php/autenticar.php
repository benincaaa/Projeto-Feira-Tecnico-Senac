<?php
include "conexao.php";

$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";
$texto = $_POST["texto"] ?? "";

$sql_login = "SELECT id FROM usuarios WHERE email = ? AND senha = ?";
$stmt_login = $conn->prepare($sql_login);
$stmt_login->bind_param("ss", $email, $senha);
$stmt_login->execute();
$result_login = $stmt_login->get_result();

if ($result_login->num_rows === 1) {
    $row = $result_login->fetch_assoc();
    $id = $row["id"];
    
    header("Location: ../revisao.php?id=$id&texto=" . urlencode($texto));
    exit;
} else {
    $sql_check_user = "SELECT id FROM usuarios WHERE email = ?";
    $stmt_check = $conn->prepare($sql_check_user);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    
    if ($result_check->num_rows === 1) {
        header("Location: ../login.html?erro=senha&texto=" . urlencode($texto));
        exit;
    } else {
        $sql_insert = "INSERT INTO usuarios (email, senha) VALUES (?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ss", $email, $senha);
        
        if ($stmt_insert->execute()) {
            $novo_id = $conn->insert_id;
            header("Location: ../revisao.php?id=$novo_id&texto=" . urlencode($texto));
            exit;
        } else {
            die("Erro ao cadastrar o novo usuário. Tente novamente: " . $stmt_insert->error);
        }
    }
}
?>