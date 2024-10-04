<!--
13. Crea la función Intercambia(v1, v2) la cual intercambiará el valor de las dos variables.
Realizar una página en la que se pruebe el funcionamiento de dicha función
intercambiando el valor de dos variables. Mostrar las variables antes y después de la
invocación de la función.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13 </title>
</head>
<body>
    <?php
        function Intercambia(&$v1, &$v2){
            $aux = $v1;
            $v1 = $v2;
            $v2 = $aux;
        }
        $var1 = 10;
        $var2 = 5;
        echo("Después de función --> Variable 1: $var1 y Variable 2: $var2");
        Intercambia($var1, $var2);
        echo("<br>Después de función --> Variable 1: $var1 y Variable 2: $var2");

    ?>
</body>
</html>