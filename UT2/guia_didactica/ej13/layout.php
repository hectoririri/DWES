<!--
13. Utilizando la función include o require crea el fichero “layout.php” el cual contendrá la
estructura de una página formada por varios bloques que estarán en distintos ficheros y
que tendrá una presentación similar a la siguiente:

    layout.php – Contiene código HTML con una tabla <table>
        Include titulo.php
        Include             Include cuerpo.php
        menu.php

Incluye el contenido que quieras en todos los ficheros y prueba que la página para ver que
se une todo en una misma página.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13</title>
</head>
<body>
    <table border="1px">
        <?php
        include("./cuerpo.php");
        include("./titulo.php");
        include("./menu.php");
        echo("<tr> <td>" . $titulo . "</td> </tr>");
        echo("<tr> 
            <td>" . $menu . "</td>
            <td>" . $cuerpo . "</td>
         </tr>");
        ?>
    </table>
</body>
</html>