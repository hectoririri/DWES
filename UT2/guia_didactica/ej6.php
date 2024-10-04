<!--
6. Realiza una página que muestre el mensaje “Hola Mundo”. Para ello concatena dos
variables que contendrán el mensaje.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <h1>Título Héctor</h1>
    <?php
        $texto1 = "Hola";
        $texto2 = " Mundo";
        $textoConcatenado = $texto1.$texto2;
        echo "Texto concatenado: ".$textoConcatenado;
    ?>
</body>
</html>
