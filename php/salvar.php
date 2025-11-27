<?php include "conexao.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reclame POA</title>
    <script src="script.js" defer></script>
</head>
<body>

    <form id="formReclamacao" action="salvar_primeiro.php" method="POST">
        <input type="text" id="campoReclamacao" name="texto" placeholder="Digite sua reclamação..." required>
        <h6 id="loginTexto">Já tem conta? <a href="login.php">Faça login</a></h6>
    </form>

</body>
</html>
