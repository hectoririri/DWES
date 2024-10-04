<!--
16. Utilizando la función date() y la función NombreMes() creada anteriormente, muestra el
nombre del mes en el que estamos.
Crea la función en el fichero “funciones_fecha.php” que luego incluirás (include o require)
en la solución.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16 </title>
</head>
<body>
    <?php
        include "./funciones_fecha.php";
        $mes = date("m");
        echo(NombreMes($mes));
    ?>
</body>
</html>