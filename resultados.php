<?php
require 'conexion.php';

$result = $conexion->query("SELECT * FROM candidatos ORDER BY votos DESC");
$candidatos = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultados</title>
    <style>
        /* Mismo estilo que la versión anterior */
    </style>
    <meta http-equiv="refresh" content="2">
</head>
<body>
    <h1>Resultados en Tiempo Real</h1>
    <div class="resultados">
        <?php foreach ($candidatos as $candidato): ?>
        <div class="resultado">
            <img src="<?= $candidato['foto'] ?>" alt="<?= $candidato['nombre'] ?>">
            <h3><?= $candidato['nombre'] ?></h3>
            <p>Votos: <?= $candidato['votos'] ?></p>
        </div>
        <?php endforeach; ?>
    </div>
    <a href="index.php">Volver a votar</a>
</body>
</html>
