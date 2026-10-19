<?php
declare(strict_types=1);

define('SEMILLA_LAB8', 'WEB2026-L8');
const LAB_NUMERO = 8;

require_once dirname(__DIR__) . '/lib/estudiante.php';
$estudiante = cargar_estudiante();

$huella = hash('sha256', $estudiante['cedula'] . '|' . SEMILLA_LAB8);
$codigo = substr($huella, 0, 8);
$n1 = hexdec(substr($huella, 8, 2)) % 90 + 10;
$n2 = hexdec(substr($huella, 10, 2)) % 90 + 10;
$precio = round(hexdec(substr($huella, 12, 4)) / 100, 2);
$activo = ($n1 % 2 === 0);

$suma = $n1 + $n2;
$division = round($n1 / $n2, 2);
$resto = $n1 % $n2;
$cociente = intdiv($n1, $n2);
$nulo = null;
$lista = [1, 2, 3];

echo "=== Variables con var_dump ===\n";
var_dump($codigo);
var_dump($n1);
var_dump($n2);
var_dump($precio);
var_dump($activo);
var_dump($nulo);
var_dump($lista);

echo "\n=== Conversiones y comparaciones ===\n";

// El operador + convierte las cadenas numéricas en números.
var_dump("5" + "10");

// El punto concatena las dos cadenas.
var_dump("5" . "10");

// La conversión explícita a entero toma la parte numérica inicial.
var_dump((int) "12abc");

// Los números de punto flotante pueden tener pequeñas imprecisiones.
var_dump(0.1 + 0.2 == 0.3);

// == compara valores con conversión de tipos cuando corresponde.
var_dump("10" == "1e1");

// === compara valor y tipo sin convertirlos.
var_dump("10" === "1e1");

$resultado = [
    'codigo' => $codigo,
    'n1' => $n1,
    'n2' => $n2,
    'suma' => $suma,
    'division' => $division,
    'resto' => $resto,
    'cociente' => $cociente,
    'precio' => $precio,
    'activo' => $activo,
    'tipos' => [
        'codigo' => gettype($codigo),
        'n1' => gettype($n1),
        'precio' => gettype($precio),
        'activo' => gettype($activo),
        'nulo' => gettype($nulo),
        'lista' => gettype($lista),
    ],
    'juggling' => [
        'suma_cadenas' => "5" + "10",
        'concatenacion' => "5" . "10",
        'conversion_entero' => (int) "12abc",
        'flotantes_iguales' => (0.1 + 0.2 == 0.3),
        'comparacion_suelta' => ("10" == "1e1"),
        'comparacion_estricta' => ("10" === "1e1"),
    ],
    'constantes' => [
        'SEMILLA_LAB8' => constant('SEMILLA_LAB8'),
        'LAB_NUMERO' => LAB_NUMERO,
        'redefinir' => @define('SEMILLA_LAB8', 'otra'),
    ],
];

echo "\n##JSON## " . json_encode($resultado) . "\n";
