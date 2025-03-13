<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    
    $stmt = $conexion->prepare("UPDATE candidatos SET votos = votos + 1 WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
}

header('Location: resultados.php');
exit;
?>
