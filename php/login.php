<?php
$id = $_GET["id"] ?? 0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h2>Entrar</h2>

<form id="formReclamacao" action="php/salvar.php" method="POST">
    <input type="hidden" name="id" value="<?= $id ?>">

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Senha:</label><br>
    <input type="password" name="senha" required><br><br>

    <button type="submit">Login</button>
</form>

</body>
</html>
