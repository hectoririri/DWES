<!--
3. La función rand() genera un número aleatorio. Realizar una página que muestre de forma
aleatoria una tabla de multiplicar.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <?php
        $random = rand();
        echo("Tabla del $random");
        for($i = 1; $i <= 10; $i++){
            echo("<br>$random X $i = " . $random*$i);
        };
    ?>
</body>
</html>