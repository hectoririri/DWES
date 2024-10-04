<!--
12.Crea la función EstNoSeDebeHacer() -sin parámetros, que hará uso de la palabra
reservada global- que modifica la variable $num asignándole el doble de su valor. La
variable está iniciada fuera de la función. Crea una página que cree y pruebe el
funcionamiento de la función
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 12 </title>
    </head>
    <body>
        <?php 
            function EstNoSeDebeHacer(){
                global $num;
                $num *= 2;
            }
            $num = 5;
            echo("Variable antes de función: $num");
            EstNoSeDebeHacer();
            echo("Variable después de función: $num");
        ?>
    </body>
</html>