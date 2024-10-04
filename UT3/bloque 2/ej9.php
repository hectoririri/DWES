<!--
9. Crea la función EsPrimo(numero) que devuelva un booleano que indique si el número
pasado como parámetro es primo. Utilizando dicha función mostrar en una página los
números primos menores de 100 que existen. 
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
</head>
<body>
    <?php
    function EsPrimo($numero){
        for($i = 2; $i < $numero; $i++){
            if ($numero % $i == 0){
                return false;
            }
        }
        return true;
    }
    for($i = 0; $i < 100; $i++){
        if (EsPrimo($i))
            echo("$i es primo, ");
    }
    ?>
</body>
</html>