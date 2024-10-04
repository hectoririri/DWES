<!--
2. Realiza una página web que muestre todas las tablas de multiplicar del 1 al 10.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <table border="1px">
        <?php
            for($i = 1; $i <= 10; $i++){
                echo "<tr>Tabla del $i ";
                for($x = 1; $x <= 10; $x++){
                    echo "<td>$x x $i = " . $x*$i . "</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>