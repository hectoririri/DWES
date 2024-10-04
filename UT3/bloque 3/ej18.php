<!-- 
1. Utilizando arrays crea la función DiasMes(num_mes) que devolverá un entero que será el
número de días que tiene un mes.
Utilizando dicha función realiza un programa que imprima el número de días que tienes los
distintos meses. El nombre del mes se almacenará en una array igualmente.
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 1</title>
    </head>
    <body>
        <?php
             function dias_mes($num_mes){
                $meses = [31,28,31,30,31,30,31,31,30,31,30,31];
                return $meses[$num_mes];
             }
             $nomMeses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
             for($i=0; $i < 12; $i++){
                echo($nomMeses[$i] . " tiene " . dias_mes($i)." dias<br>");
             }
        ?>
    </body>
</html>