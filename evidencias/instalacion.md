# Evidencia de instalación — Laboratorio 8

## Entorno de desarrollo

- Sistema operativo: Windows.
- Servidor web: Apache mediante XAMPP.
- PHP: 8.2.12.
- Base de datos: MariaDB 10.4.32.
- Gestor de base de datos: phpMyAdmin.
- Base de datos del laboratorio: `lab8_web`.
- Tabla utilizada: `estudiantes`.

## Comprobaciones realizadas

- Se comprobó la versión de PHP con `php -v`.
- Se comprobó que la página principal se ejecuta desde Apache.
- Se verificó la conexión a `lab8_web` mediante `php prueba_db.php`.
- Se comprobó que existe la tabla `estudiantes`.
- Se preparó `evidencias/base_datos.sql` para crear la tabla y registrar los datos del laboratorio.

## Capturas de evidencia

- `phpinfo.png`: pendiente de guardar la captura de la página `phpinfo()`.
- `phpmyadmin.png`: pendiente de guardar la captura de la base de datos, la tabla y el registro.

## Seguridad

El archivo `config/db.php` contiene la configuración local de conexión y no debe subirse al repositorio. El archivo `estudiante.json` contiene datos personales y también debe permanecer fuera del repositorio.