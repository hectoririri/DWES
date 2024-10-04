<!--
8. La función time() devuelve la fecha en número de segundos desde el 1 de enero de 1970.
Realiza una página web que muestre en vuestro equipo todos los números múltiplos de 5
que le de tiempo a mostrar en 5 segundos. Mostraréis solamente 10 números por línea y
Después de 10 líneas incluireis un separador (raya, salto de línea, caracteres ...)
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
    $inicio = time();
    $inicioEn5 = $inicio+5;
    $count = 1;
    $divisor = 0;
        while($inicioEn5 > time()){
            $divisor++;
            if ($count % 10 == 0){
                echo("<br> ----------------------------------------- <br>");
                $count = 1;
            }
            if($divisor % 5 == 0){
                $count++;
                echo($divisor.", ");
            };
        };
    ?>
</body>
</html>