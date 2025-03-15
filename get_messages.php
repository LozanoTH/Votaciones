<?php
$token = "TU_BOT_TOKEN";  // Reemplaza con tu token
$url = "https://api.telegram.org/bot$token/getUpdates";

// Obtener mensajes de Telegram
$response = file_get_contents($url);
$updates = json_decode($response, true);

if ($updates && isset($updates['result'])) {
    foreach ($updates['result'] as $update) {
        if (isset($update['message']['text'])) {
            echo "Mensaje: " . $update['message']['text'] . "<br>";
        }
    }
} else {
    echo "No hay mensajes nuevos.";
}
?>
