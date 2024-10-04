<!--
1. Realiza una página web que muestre la tabla de multiplicar del 5, utilizando bucles en PHP.
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
        for($i = 1; $i <= 10; $i++){
            echo "<br>5x$i = " . 5*$i;
        }
    ?>
</body>
</html>