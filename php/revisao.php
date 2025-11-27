<?php
include "conexao.php";

$id = $_GET["id"];

$sql = "SELECT texto FROM reclamacoes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$dados = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Revisar Reclamação</title>
</head>
<body>

<h2>Revisar Reclamação</h2>

<form action="salvar_final.php" method="POST">
    <input type="hidden" name="id" value="<?= $id ?>">
    
    <textarea name="texto" rows="5" cols="50"><?= $dados["texto"] ?></textarea>
    <br><br>

    <button type="submit">Salvar Revisão</button>
</form>

</body>
</html>
