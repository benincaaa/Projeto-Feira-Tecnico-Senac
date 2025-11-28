<?php
$id = $_GET["id"] ?? "";
$texto = $_GET["texto"] ?? "";

include __DIR__ . "/php/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $texto_final = trim($_POST["texto"]);
    $id_usuario = $_POST["id"];

    if (!empty($texto_final) && !empty($id_usuario)) {
        $sql = "INSERT INTO reclamacoes (id_usuario, texto) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $id_usuario, $texto_final);
        $stmt->execute();
        
        header("Location: obrigado.html");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revisar Reclamação</title>
    <link rel="stylesheet" href="revisao.css">
</head>

<body>
<main>
    <div class="review-page">
        <h2>Revisar Reclamação</h2>

        <form class="review-form" method="POST">

            <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

            <textarea 
                name="texto" 
            ><?= htmlspecialchars($texto) ?></textarea>

            <button type="submit" class="submit-btn">Enviar Reclamação</button>
        </form>
    </div>
</main>
<footer>
        <div class="footer-buttons-row">
            <button type="button" onclick="alert('Botão clicado!')">Categorias</button>
            <button type="button" onclick="alert('Botão clicado!')">Mapa de Problemas</button>
            <button type="button" onclick="alert('Botão clicado!')">Registrar Reclamação</button>
            <button type="button" onclick="alert('Botão clicado!')">Ajuda</button>
            <button type="button" onclick="alert('Botão clicado!')">Política de Privacidade e Termos de Uso</button>
        </div>
        
        <div class="footer-bottom-text">
            <h3>Todos os Direitos Reservados | Senac Distrito Criativo</h3>
        </div>
    </footer>
</body>
</html>