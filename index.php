<?php
require 'conexion.php';

$result = $conexion->query("SELECT * FROM candidatos");
$candidatos = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Votación Grado 11</title>
    <style>
        /* Mismo estilo que la versión anterior */
    </style>
</head>
<body>
    <h1>Votación Personería Grado 11</h1>
    <div class="candidatos">
        <?php foreach ($candidatos as $candidato): ?>
        <div class="candidato">
            <img src="<?= $candidato['foto'] ?>" alt="<?= $candidato['nombre'] ?>">
            <h3><?= $candidato['nombre'] ?></h3>
            <form action="votar.php" method="post">
                <input type="hidden" name="id" value="<?= $candidato['id'] ?>">
                <button type="submit" onclick="return confirm('¿Confirmas tu voto?')">Votar</button>
            </form>
        </div>
        <?php endforeach; ?>
    </div>
    <a href="resultados.php">Ver resultados</a>
</body>
</html>
