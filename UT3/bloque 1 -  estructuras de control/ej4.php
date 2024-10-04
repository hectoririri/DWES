<!--
4. Utilizando la construcción switch realiza un programa que genere un número aleatorio
entre 1 y 10 y muestre en la página el número en letra.
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
        $random = rand(1,10);
        switch($random){
            case 1:
                echo("Case $random = a");
                break;
            case 2:
                echo("Case $random = b");
                break;
            case 3:
                echo("Case $random = c");
                break;
            case 4:
                echo("Case $random = d");
                break;
            case 5:
                echo("Case $random = e");
                break;
            case 6:
                echo("Case $random = f");
                break;
            case 7:
                echo("Case $random = g");
                break;
            case 8:
                echo("Case $random = h");
                break;
            case 9:
                echo("Case $random = i");
                break;
            case 10:
                echo("Case $random = j");
                break;
        }
    ?>
</body>
</html>