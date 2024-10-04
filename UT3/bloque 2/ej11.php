<!--
11. Crea la función NombreMes(num_mes) que devolverá una cadena que será el nombre de
mes que corresponde al parámetro. Modifica el ejercicio anterior para que en cada línea
aparezca el nombre de més y el año y a continuación solo aparezca el número de día.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11 </title>
</head>
<body>
    <?php 
    //enero - 1/1/99, 2/1/99...
    //Febrero - 1/2/99, 2/2/99...
         function NombreMes($num_mes){
            switch($num_mes){
                case 1:
                    return "Enero";
                case 2:
                    return "Febrero";
                case 3:
                    return "Marzo";
                case 4:
                    return "Abril";
                case 5:
                    return "Mayo";
                case 6:
                    return "Junio";
                case 7:
                    return "Julio";
                case 8:
                    return "Agosto";
                case 9:
                    return "Septiembre";
                case 10:
                    return "Octubre";
                case 11:
                    return "Noviembre";
                case 12:
                    return "Diciembre;";
            }
        }
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
                echo("<br>" . NombreMes($mes) . " - ");
                for($dia = 1; $dia <= DiasMes($mes); $dia++){
                    echo("$dia/$mes/$anyo , ");
                }
            }
        }
    ?>
</body>
</html>