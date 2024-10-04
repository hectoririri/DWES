<!--
15. Utilizando la función date() y time() escribe una página que muestre la fecha que será
dentro de 50 segundos, y dentro de 2 horas, 4 minutos y 3 segundos.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 15 </title>
</head>
<body>
    <?php
        $fecha = date("F j, Y, g:i a", time()+50);
        echo("Fecha dentro de 50 segundos: $fecha");
        $fecha = date("F j, Y, g:i a", time()+7443);
        // 2 horas = 7200s + 4 minutos = 240s + 3 = 7443
        echo("<br>Fecha dentro de 2 horas, 4 minutos y 3 segundos: $fecha");
    ?>
</body>
</html>