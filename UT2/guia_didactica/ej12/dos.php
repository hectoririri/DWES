<!--
12. Crea un fichero “uno.php” en el que definirás 2 variables. En un segundo fichero “dos.php”
incluirás el fichero “uno.php” (con include o require) y usarás dichas variables como si ya
estuviesen declaradas en “uno.php”
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12</title>
</head>
<body>
    <?php
    include("./uno.php");
    echo("variable 1 incluida desde uno.php: " . $var1);
    echo("<br>variable 2 incluida desde uno.php: " . $var2);
    ?>
</body>
</html>