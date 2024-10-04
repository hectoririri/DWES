<!-- 
4. Realiza una página en php en la que la misma variable la inicialices con distintos tipos de
datos y vayas mostrando su contenido.
O sea, utiliza la misma variable para asignarle un número, una cadena, etc. Asigna valores
y luego muestralos, teniendo presente que algunos no mostrarán mas que la cadena vacía
como (false)
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php
    $variable = 1;
    var_dump($variable);
    $variable = "hola mundo";
    var_dump($variable);
    $variable = true;
    var_dump($variable);
    $variable = 1.29;
    var_dump($variable);
    ?>
</body>
</html>