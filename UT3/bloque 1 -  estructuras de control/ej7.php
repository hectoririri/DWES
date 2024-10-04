<!--
7. Utilizando el bucle do..while realiza un programa que muestre números aleatorios por
pantalla entre 1 y 100 hasta que salga el 15.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>
<body>
    <?php
        do {
            $random = rand(1,100);
            echo($random."<br>");
        }while($random != 15);
    ?>
</body>
</html>