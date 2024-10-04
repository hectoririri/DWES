<!-- 
22. Comprueba si los arrays se pasan por valor o referencia como parámetros de una función.
Modifica los datos de una array pasado como parámetro a una función y comprueba si se
han modificado al salir de esta.
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 21</title>
    </head>
    <body>
        <?php
            $array = [1,2,3,4,5];
            foreach($array as $contenido){
                echo("$contenido, ");
            }
            pasarArray($array);
            function pasarArray($arrayPasado){
                $arrayPasado[] = "holaa";
                $arrayPasado[] = 20;
            }
            foreach($array as $contenido){
                echo("$contenido, ");
            }
            //Podemos ver que el array se pasa por valor y no como referencia.
            //Si quisieramos pasarlo como referencia deberemos utilizar el carácter & delante del parámetro

        ?>
    </body>
</html>