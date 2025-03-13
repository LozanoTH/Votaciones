<?php
// Inicializar votos si no existe
if (!file_exists('votos.json')) {
    $inicial = [
        'candidatos' => [
            1 => ['id' => 1, 'nombre' => 'Candidato 1', 'votos' => 0, 'foto' => 'foto1.jpg'],
            2 => ['id' => 2, 'nombre' => 'Candidato 2', 'votos' => 0, 'foto' => 'foto2.jpg'],
            3 => ['id' => 3, 'nombre' => 'Candidato 3', 'votos' => 0, 'foto' => 'foto3.jpg'],
            4 => ['id' => 4, 'nombre' => 'Candidato 4', 'votos' => 0, 'foto' => 'foto4.jpg'],
            5 => ['id' => 5, 'nombre' => 'Candidato 5', 'votos' => 0, 'foto' => 'foto5.jpg']
        ]
    ];
    file_put_contents('votos.json', json_encode($inicial));
}

// Procesar voto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $votos = json_decode(file_get_contents('votos.json'), true);
    $id = (int)$_POST['id'];
    
    if (isset($votos['candidatos'][$id])) {
        $votos['candidatos'][$id]['votos']++;
        file_put_contents('votos.json', json_encode($votos));
    }
}

header('Location: resultados.php');
exit;