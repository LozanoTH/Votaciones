<?php
$host = 'bhmpei3fkjykurn4hivk-mysql.services.clever-cloud.com';
$db   = 'bhmpei3fkjykurn4hivk';
$user = 'ufn4a4rvp535oqhu';
$pass = 'IozL8r9gYUY8ZiHCPwke';
$port = 3306;

$conexion = new mysqli($host, $user, $pass, $db, $port);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Crear tablas si no existen
$sql = "CREATE TABLE IF NOT EXISTS candidatos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    votos INT DEFAULT 0,
    foto VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conexion->query($sql)) {
    die("Error creando tabla: " . $conexion->error);
}

// Insertar datos iniciales si la tabla está vacía
$result = $conexion->query("SELECT COUNT(*) as total FROM candidatos");
if ($result->fetch_assoc()['total'] == 0) {
    $candidatos_iniciales = [
        ['nombre' => 'Candidato 1', 'foto' => 'foto1.jpg'],
        ['nombre' => 'Candidato 2', 'foto' => 'foto2.jpg'],
        ['nombre' => 'Candidato 3', 'foto' => 'foto3.jpg'],
        ['nombre' => 'Candidato 4', 'foto' => 'foto4.jpg'],
        ['nombre' => 'Candidato 5', 'foto' => 'foto5.jpg']
    ];
    
    foreach ($candidatos_iniciales as $candidato) {
        $stmt = $conexion->prepare("INSERT INTO candidatos (nombre, foto) VALUES (?, ?)");
        $stmt->bind_param('ss', $candidato['nombre'], $candidato['foto']);
        $stmt->execute();
    }
}
?>
