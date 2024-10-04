<!--
10. Crea la función DiasMes(num_mes) que devolverá un entero que será el número de días
que tiene un mes. Utilizando dicha función realizar un programa que imprima las fechas
existentes entre el 1 de enero de 1999 y el 31 de diciembre de 2012. Las fechas se
mostrarán separadas por una coma y cada mes aparecerá en una línea diferentes.
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 10 </title>
    </head>
    <body>
        <?php
            function DiasMes($num_mes){
                switch($num_mes){
                    case 4: case 6: case 9: case 11:
                        return 30;
                    case 2:
                        return 28;
                    default:
                        return 31;
                }
            }
            for($anyo = 1999; $anyo<=2012; $anyo++){
                echo("<br><br>");
                for($mes = 1; $mes <= 12; $mes++){
                    echo("<br>");
                    for($dia = 1; $dia <= DiasMes($mes); $dia++){
                        echo("$dia/$mes/$anyo , ");
                    }
                }
            }
        ?>
    </body>
</html>