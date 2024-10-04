<!--
6. Realizar una página en php que muestre todos los números entre 1 y 1000 que son
múltiplos de 3, 5 y 7. Avanzará de línea cada vez que se cambie de decena.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <?php
        echo("Numeros múltiplos de 3, 5 y 7");
        for($i = 1; $i <= 1000; $i++){
            if ($i % 10 == 0){
                echo("<br>");
            }
            if($i%3==0 && $i%5==0 && $i%7==0){
                echo("$i ");
            };
        };
    ?>
</body>
</html>