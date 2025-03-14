<?php
$file = 'votos.json';
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

echo json_encode($votos);
?>

