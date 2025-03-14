<?php
$file = 'votos.json';
$votos = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
echo json_encode($votos);
?>
