<?php
$file = 'votos.json';

$votos = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

$data = json_decode(file_get_contents("php://input"), true);
$candidato = $data['candidato'] ?? null;

if (!$candidato) {
    echo json_encode(["mensaje" => "Error: Candidato no válido"]);
    exit;
}

$votos[$candidato] = ($votos[$candidato] ?? 0) + 1;

file_put_contents($file, json_encode($votos, JSON_PRETTY_PRINT));

echo json_encode(["mensaje" => "Voto registrado con éxito"]);
?>

