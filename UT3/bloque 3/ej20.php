<!-- 
20. Crea la función Maxi(array) que nos devolverá el valor máximo de un array. Realiza una
página que pruebe dicha función.
Nota: En PHP muchas veces utilizaremos los arrays como objetos para almacenar información.
Dichos objetos no tendrán una estructura predeterminada y todos serán iguales como tenemos en
las clases de Java. Este mecanismo se utilizará también en Javascript
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 20</title>
    </head>
    <body>
        <?php
            function Maxi($array){
                sort($array);
                return $array[0];
            }
            $array = ["hola" => 59, "asd","2",4,4];
            echo(Max($array));
        ?>
    </body>
</html>