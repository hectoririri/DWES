<!--
1. Realiza una página web que muestre información sobre el interprete php que tienes
funcionando (versión y librerías). Busca en la ayuda (php.net) lo que hace la función
phpinfo()
Identifica:
    • Versión de PHP
    • Servidor web que estás utilizando
    • Comprueba si alguna de las opciones que tienes configuradas en el fichero php.ini
    se corresponden con la información mostrada en la sección “Core”. Busca por el
    nombre “Directive”
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <h1>Título Héctor</h1>
    <?php
        echo "Versión de PHP: 8.2.12";
        echo "<br> Servidor web: Apache 2.0 Handler";
        echo phpinfo();
    ?>
</body>
</html>
