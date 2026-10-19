# Reflexión — Laboratorio 8

## 1. Tipos de datos, código y operaciones

El código se guarda como una cadena de texto porque se obtiene con `substr()` a partir de la huella SHA-256. Aunque sus caracteres sean números, no se necesita tratarlo como una cantidad para hacer operaciones aritméticas. Los valores `n1` y `n2` se obtienen convirtiendo fragmentos hexadecimales a enteros y aplicando el módulo para limitar el resultado al rango solicitado. La suma se calcula con el operador `+`.

## 2. Precio, punto flotante y división entera

El precio se guarda como un tipo `double`, que PHP utiliza para representar números de punto flotante. Estos números pueden tener pequeñas imprecisiones binarias, por lo que una comparación exacta como `0.1 + 0.2 == 0.3` puede devolver `false`. Para la división normal se utiliza `/`, que permite obtener un resultado decimal; `intdiv()` devuelve únicamente el cociente entero. En este programa, `intdiv(79, 80)` devuelve `0`.

## 3. Constantes con define() y const

En PHP se pueden declarar constantes mediante `define()` o mediante `const`. En este ejercicio, `SEMILLA_LAB8` se declara usando `define()` y `LAB_NUMERO` usando `const`. La función `define()` devuelve `false` cuando se intenta volver a definir una constante que ya existe, por lo que el resultado de la prueba de redefinición es `false`. La salida puede depender de la versión de PHP y de cómo se ejecute el programa.