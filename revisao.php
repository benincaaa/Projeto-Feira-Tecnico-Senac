<?php
$id = $_GET["id"] ?? "";
$texto = $_GET["texto"] ?? "";

include __DIR__ . "/php/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $texto_final = $_POST["texto"];
    $id_usuario = $_POST["id"];

    $sql = "INSERT INTO reclamacoes (id_usuario, texto) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $id_usuario, $texto_final);
    $stmt->execute();

    header("Location: obrigado.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revisão</title>
</head>

<body>

<h2>Revisar Reclamação</h2>

<form method="POST">

    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

    <textarea 
        name="texto" 
        style="width:90%; height:250px; padding:10px; font-size:16px;"
    ><?= htmlspecialchars($texto) ?></textarea>

    <br><br>

    <button type="submit">Enviar Reclamação</button>
</form>

</body>
</html>
