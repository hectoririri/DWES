<!--
9. Realiza un programa que sume dos variables. Prueba su ejecución dando a las variables
valores de distintos tipos de datos (entero, real, cadena, etc). Como por ejemplo:
    ◦ 5 y 6.0
    ◦ “7” y “9.0”
    ◦ 2 y “hola”
    ◦ 2 y “3lola”
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
</head>
<body>
    <?php
    $a = 5;
    $b = 6.0;
    echo ("5 + 6.0 = " . $a+$b);
    $a = "7";
    $b = "9.0";
    echo ('<br>“7” + “9.0” = ' . $a+$b); //PHP castea automaticamente las dos variables al ver que son numeros
    $a = 2;
    $b = "3lola";
    echo ('<br>2 + “3lola” = ' . $a+$b); // Se castea automaticamente y nos suma los dos numeros. Además salta un Warning que nos indica que encontró un valor no númerico en la línea 26.
    $a = 5;
    $b = "hola";
    echo ('<br>5 + “hola” = ' . $a+$b); //Salta fatal error que nos indica que no podemos sumar un int con un string
    ?>
</body>
</html>