<?php
declare(strict_types=1);

function cargar_estudiante(): array
{
    $ruta = dirname(__DIR__) . '/estudiante.json';
    $contenido = file_get_contents($ruta);

    if ($contenido === false) {
        throw new RuntimeException('No se pudo leer estudiante.json');
    }

    $estudiante = json_decode($contenido, true);

    if (!is_array($estudiante)) {
        throw new RuntimeException('estudiante.json no contiene datos válidos');
    }

    return $estudiante;
}