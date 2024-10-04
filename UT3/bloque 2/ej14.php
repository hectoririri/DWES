<!--
14. Utilizando la función predefinida date(), realiza una página en la que se muestre la fecha y
hora actual.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 14 </title>
</head>
<body>
    <?php
        $fecha = date("F j, Y, g:i a");
        echo($fecha);
    ?>
</body>
</html>