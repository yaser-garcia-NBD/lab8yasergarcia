<?php
// E2: cargar los datos personales desde el archivo local.
require_once dirname(__DIR__) . '/lib/estudiante.php';

// Cargar el estudiante para evitar repetir datos en el código.
$estudiante = cargar_estudiante();

// # La zona horaria solicitada por la guía es Panamá.
date_default_timezone_set('America/Panama');

// Preparar los datos que se mostrarán en la página.
$nombre = $estudiante['nombre'] ?? '';
$apellido = $estudiante['apellido'] ?? '';
$nombreCompleto = trim($nombre . ' ' . $apellido);

// Mostrar datos seguros dentro del HTML.
$nombreSeguro = htmlspecialchars($nombreCompleto, ENT_QUOTES, 'UTF-8');
$apellidoSeguro = htmlspecialchars($apellido, ENT_QUOTES, 'UTF-8');
$versionPHP = PHP_VERSION;
$fechaHora = date('d/m/Y H:i');

/* Esta página se genera con PHP y entrega HTML al navegador.
   htmlspecialchars ayuda a evitar que los datos se interpreten como HTML. */
echo "<!DOCTYPE html>\n";
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo 'Lab 8 - ' . $apellidoSeguro; ?></title>
</head>
<body>
    <header>
        <h1><?php print $nombreSeguro; ?></h1>
        <p>Laboratorio 8: Mi primer servidor PHP</p>
    </header>

    <main>
        <section>
            <h2>Información del entorno</h2>
            <p>Versión de PHP: <?php echo htmlspecialchars($versionPHP, ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Fecha y hora: <?php echo htmlspecialchars($fechaHora, ENT_QUOTES, 'UTF-8'); ?></p>
        </section>

        <section>
            <h2>Acerca de esta práctica</h2>
            <p>Esta página demuestra la generación de HTML mediante PHP.</p>
            <p>Los datos del estudiante se cargan desde un archivo JSON local.</p>
            <?php
            // PHP permite insertar contenido dinámico en una página HTML.
            echo '<p>La página se está ejecutando correctamente.</p>';

            # print también puede mostrar texto en la página.
            print '<p>Este mensaje se imprimió usando print.</p>';

            /* El servidor procesa PHP antes de enviar el HTML al navegador.
               Por eso el usuario ve el resultado y no el código PHP original. */
            ?>
        </section>
    </main>
</body>
</html>
