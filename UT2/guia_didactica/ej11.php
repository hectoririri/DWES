<!--
11. Estudia la diferencia de comportamiento del operador “==” y el operador “===”. Para ello
inicializa dos variables $v1, $v2 a los valores 1 y “1”, y luego comprueba utilizando la
expresión echo $v1==$v2 y echo $v1===$v2 si dan el mismo resultado. Si lo deseas
puedes utilizar el bloque if que seguro no tienes dificultad aunque no se haya explicado.
Estos operadores existen en más lenguajes no fuertemente tipados como javascript
también
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11</title>
</head>
<body>
    <?php
    $v1 = 1;
    $v2 = "1";
    echo("v1==v2 = ".$v1==$v2); 
    // Solo se compara el valor de las variables, y como PHP castea automaticamente el string a int
    // en este caso da true
    echo("<br>v1===v2 = ".$v1===$v2);
    // En este caso se está comparando el valor y TIPO de variables, así que al ser v1 un int y v2 un string
    // nos da false
    ?>
</body>
</html>