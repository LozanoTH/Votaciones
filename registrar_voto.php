<?php
$file = 'votos.json';

// Si el archivo no existe, inicializar los votos con 0
if (!file_exists($file)) {
    $votos = [
        "Candidato 1" => 0,
        "Candidato 2" => 0,
        "Candidato 3" => 0,
        "Candidato 4" => 0,
        "Candidato 5" => 0
    ];
} else {
    $votos = json_decode(file_get_contents($file), true);
}

$data = json_decode(file_get_contents("php://input"), true);
$candidato = $data['candidato'] ?? null;

if (!$candidato || !isset($votos[$candidato])) {
    echo json_encode(["mensaje" => "Error: Candidato no válido"]);
    exit;
}

$votos[$candidato]++;

file_put_contents($file, json_encode($votos, JSON_PRETTY_PRINT));

echo json_encode(["mensaje" => "Voto registrado con éxito"]);
?>

