<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/lib/estudiante.php';

$estudiante = cargar_estudiante();
$config = require dirname(__DIR__) . '/config/db.php';

$conexion = new mysqli(
    $config['host'],
    $config['usuario'],
    $config['clave'],
    $config['base_datos'],
    $config['puerto']
);

$conexion->set_charset('utf8mb4');

$resultado = $conexion->query('SELECT COUNT(*) AS filas FROM estudiantes');
$datos = $resultado->fetch_assoc();

$token = substr(
    hash(
        'sha256',
        $estudiante['cedula'] . '|' .
        $estudiante['github_user'] . '|WEB2026-L8'
    ),
    0,
    10
);

$salida = [
    'php_version' => PHP_VERSION,
    'sapi' => PHP_SAPI,
    'os_family' => PHP_OS_FAMILY,
    'servidor' => $_SERVER['SERVER_SOFTWARE'] ?? 'CLI',
    'mysqli' => mysqli_get_client_info(),
    'db_version' => $conexion->server_info,
    'db_nombre' => $config['base_datos'],
    'filas' => (int) $datos['filas'],
    'token' => $token
];

header('Content-Type: application/json; charset=utf-8');

echo json_encode(
    $salida,
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
);

$conexion->close();