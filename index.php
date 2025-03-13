<?php
$candidatos = [
    1 => ['nombre' => 'Candidato 1', 'foto' => 'foto1.jpg'],
    2 => ['nombre' => 'Candidato 2', 'foto' => 'foto2.jpg'],
    3 => ['nombre' => 'Candidato 3', 'foto' => 'foto3.jpg'],
    4 => ['nombre' => 'Candidato 4', 'foto' => 'foto4.jpg'],
    5 => ['nombre' => 'Candidato 5', 'foto' => 'foto5.jpg']
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Votación Grado 11</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 1200px; margin: 0 auto; padding: 20px; }
        .candidatos { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; }
        .candidato { border: 1px solid #ddd; padding: 15px; text-align: center; border-radius: 8px; }
        .candidato img { width: 150px; height: 150px; object-fit: cover; border-radius: 50%; }
        button { background: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #45a049; }
    </style>
</head>
<body>
    <h1>Votación Personería Grado 11</h1>
    <div class="candidatos">
        <?php foreach ($candidatos as $id => $candidato): ?>
        <div class="candidato">
            <img src="<?= $candidato['foto'] ?>" alt="<?= $candidato['nombre'] ?>">
            <h3><?= $candidato['nombre'] ?></h3>
            <form action="votar.php" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                <button type="submit" onclick="return confirm('¿Confirmas tu voto?')">Votar</button>
            </form>
        </div>
        <?php endforeach; ?>
    </div>
    <a href="resultados.php" style="display: block; margin-top: 20px;">Ver resultados</a>
</body>
</html>