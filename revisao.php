<?php
$id = $_GET["id"] ?? "";
$texto = $_GET["texto"] ?? "";

include __DIR__ . "/php/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $texto_final = trim($_POST["texto"]);
    $usuario_id = $_POST["id"];

    if (!empty($texto_final) && !empty($usuario_id)) {
        $sql = "INSERT INTO reclamacoes (usuario_id, texto) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $usuario_id, $texto_final);
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
            <button type="button" onclick="alert('Descreva, cadastre-se, revise e envie.')">Categorias</button>
            <button type="button" onclick="alert('Problemas filtrados por local e tipo.')">Mapa de Problemas</button>
            <button type="button" onclick="alert('Use a barra da página inicial!')">Registrar Reclamação</button>
            <button type="button" onclick="alert('Volte para a página principal.')">Ajuda</button>
            <button type="button" onclick="alert('Sua privacidade e termos garantidos.')">Política de Privacidade e Termos de Uso</button>
        </div>
        
        <div class="footer-bottom-text">
            <h3>Todos os Direitos Reservados | Senac Distrito Criativo</h3>
        </div>
    </footer>
</body>
</html>