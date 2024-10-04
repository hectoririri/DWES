<!--
5. Realizar una página en php que muestre todos los números entre 1 y 1000 que son
múltiplos de 3, 4.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>
    <?php
        echo("Numeros múltiplos de 3 y 4");
        for($i = 1; $i <= 1000; $i++){
            if($i%3==0 && $i%4==0){
                echo("<br> $i");
            };
        };
    ?>
</body>
</html>