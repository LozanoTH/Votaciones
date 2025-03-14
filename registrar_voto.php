<?php
$file = 'votos.json';

// Leer votos actuales
$votos = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

// Obtener datos del POST
$data = json_decode(file_get_contents("php://input"), true);
$candidato = $data['candidato'] ?? null;

if (!$candidato) {
    echo json_encode(["mensaje" => "Error: Candidato no válido"]);
    exit;
}

// Registrar voto
$votos[$candidato] = ($votos[$candidato] ?? 0) + 1;

// Guardar en JSON
file_put_contents($file, json_encode($votos, JSON_PRETTY_PRINT));

echo json_encode(["mensaje" => "Voto registrado con éxito"]);
?>
