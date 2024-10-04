<!-- 
5. Realiza una página en la que realices distintas operaciones con los operadores
disponibles.
Muestra el resultado de dichas expresiones, bien asignando un valor a la variable o
escribiendo directamente la expresión.
Comprueba el orden de evaluación combinando operadores con y sin parentesis.
    ◦ Realiza suma/resta/multiplicación/división
    ◦ Muestra el resto de una división
    ◦ Divide dos enteros donde el numerador es menor que el denominador. Justifica la
    respuesta
    ◦ Crea operaciones compuestas donde combines los operadores. Demuestra que con
    los paréntesis cambia el resultado al alterar la prioridad.
    ◦ Concatena cadenas
    ◦ Muestra operaciones con los operadores binarios
    ◦ Muestra operaciones con los operadores lógicos. ¿Que diferencia existe entre los
    operadores lógicos y binarios ?¿es igual que en java?
 -->
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>
    <?php
    // ◦ Realiza suma/resta/multiplicación/división
    echo "<h1> suma/resta/multiplicación/división </h1>";
    $suma = 2+10;
    echo "2+10 = $suma <br>";
    $resta = 6-2;
    echo "6-2 = $resta <br>";
    $division = 2/2;
    echo "2/2 = $division <br>";
    $multiplicacion = 4*4;
    echo "4X4 = $multiplicacion <br>";

    // ◦ Muestra el resto de una división
    echo "<h1> resto de una división </h1>";
    $restoDivision = 14%5;
    echo "resto de 14/5 = $restoDivision";

    // ◦ Divide dos enteros donde el numerador es menor que el denominador. Justifica la respuesta
    echo "<h1> division numerador menor que denominador </h1>";
    $divisionNumMenorDen = 4/7;
    echo "7/11 = $divisionNumMenorDen";
    //Lo que nos muestra es el cociente de la división 

    //◦ Crea operaciones compuestas donde combines los operadores. Demuestra que con los paréntesis cambia el resultado al alterar la prioridad.
    echo "<h1> operaciones compuestas combinando operadores y paréntesis </h1>";
    $opCompuesta = 3+4*5;
    echo "3+4*5 = $opCompuesta"; //Primero se multiplica y luego se suma
    $opCompuesta = (3+4)*5;
    echo "<br>3+4*5 = $opCompuesta"; //Primero se suma por prioridad de los paréntess y luego se multiplica

    //◦ Concatena cadenas
    echo "<h1> Concatenando cadenas </h1>";
    $texto1 = "Hola";
    $texto2 = " Mundo!";
    $textoConcatenado = $texto1.$texto2;
    echo "Texto concatenado: ".$textoConcatenado;

    //◦ Muestra operaciones con los operadores binarios
    echo "<h1> Operaciones con operadores binarios </h1>";
    ($a & $b);
    ($b ^ $a);
    ($c | $b);

    //◦ Muestra operaciones con los operadores lógicos. ¿Que diferencia existe entre los operadores lógicos y binarios? ¿es igual que en java?
    echo "<h1> Operaciones con operadores lógicos </h1>";
    $a = true;
    $b = true;
    $c = false;
    echo ($a && $b);
    echo ($a && $c);
    echo ($a || $c);
    //La diferencia está en que los operadores binarios operan bit a bit,
    // mientras que los lógicos funcionan por el resultado que se obtenga de una condición sin operar con bits

    //Sí es igual a java ya que se evalua y codifica de la misma manera
    ?>
</body>
</html>