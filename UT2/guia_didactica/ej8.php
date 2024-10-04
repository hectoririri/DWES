<!--
8. ¿Que sucede si sumas una variable inicializada y una no inicializada?
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>
<body>
    <?php
    $varInicializada = 4;
    echo "suma de variable inicializada y variable no inicializada: " . $varInicializada + $varNoInicializada;
    //En este caso solo nos mostrará la variable inicializada y un error de que la otra variable no está inicializada
    ?>
</body>
</html>
