<!-- 
2. Crea un nuevo script en en php en el que inicializaras distintas variables con diferentes
tipos de datos y luego mostrarás sus valores.
    ◦ Variables de tipo entero: expresa el número en decimal, octal, hexadecimal
    ◦ Variable de tipo float: expresa el número con punto, en notación flotante, etc.
    ◦ Variable de tipo cadena
    ◦ Variable tipo booleano
    
3. Utilizando la función gettype() muestra el tipo que tiene cada una de las variables creadas.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 y 3</title>
</head>
<body>
    <h3>Script de variables:</h3>
    <p>Variable tipo entero:</p>
    <?php

    //Variables tipo entero. Link de información: https://www.php.net/manual/es/language.types.integer.php
    $entero = 5;
    echo "Entero: " . $entero . "       Función gettype(): " . gettype($entero) . "<br>";
    $enteroDecimal = 16.237;
    echo "Decimal: " . $enteroDecimal . "       Función gettype(): " . gettype($enteroDecimal) . "<br>";
    $enteroOctal = 012;
    echo "Octal: " . $enteroOctal . "       Función gettype(): " . gettype($enteroOctal) . "<br>";
    $enteroHexa = 0x1C;
    echo "Hexadeimal: " . $enteroHexa . "       Función gettype(): " . gettype($enteroHexa) . "<br>";
    
    //Variables tipo float.
    echo "<p>Variable tipo float: </p>";
    $floatConPunto = 2.948212;
    echo "Float con punto: " . $floatConPunto . "       Función gettype(): " . gettype($floatConPunto) . "<br>";
    $notacionFlotante = -1.23456789*10;
    echo "Notación flotante: " . $notacionFlotante . "       Función gettype(): " . gettype($notacionFlotante) . "<br>";

    //Variables tipo cadena
    echo "<p> Variable tipo cadena: </p>";
    $cadena = "texto de ejemplo";
    echo "Cadena de texto: " . $cadena . "       Función gettype(): " . gettype($cadena) . "<br>";

    //Variables tipo booleano.
    echo "<p> Variable tipo booleano: </p>";
    $booleanoTrue = true;
    echo "Booleano True: " . $booleanoTrue . "       Función gettype(): " . gettype($booleanoTrue) . "<br>";
    $booleanoFalse = false;
    echo "Booleano False: " . $booleanoFalse . "       Función gettype(): " . gettype($booleanoFalse) . "<br>";
    ?>
</body>
</html>