<!-- 
21. Se desea almacenar información sobre coches, para cada coche se almacenaran las
siguientes características (atributos):
    • matrícula
    • color
    • modelo
    • marca
Realiza un array que almacene información de 5 o más coches.
Crea la función MuestraCoche($coche), donde $coche será un array que contiene los
atributos indicados anteriormente que c
Realiza la función MuestraCoches($lista) que mostrará por pantalla información de
los coches almacenados .
Añade dos coches adicionales al array, después de mostrar, y vuelve a mostrar toda la
lista.
Nota: Se utilizará un array para almacenar la información de cada coche. Los indices,
serán el nombre de los atributos que deseamos almacenar. Esto se puede hacer también
utilizando objetos (clases).
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 21</title>
    </head>
    <body>
        <?php
            $lista_coches = [
                ["matrícula" => "8465FGM", "color" => "Rojo", "modelo" => "Picasso", "marca" => "Citroen"],
                ["matrícula" => "9182NSB", "color" => "Verde", "modelo" => "Toyota", "marca" => "CHHF-20"],
                ["matrícula" => "4567JKL", "color" => "Azul", "modelo" => "Golf", "marca" => "Volkswagen"],
                ["matrícula" => "1234XYZ", "color" => "Negro", "modelo" => "A3", "marca" => "Audi"],
                ["matrícula" => "7890ABC", "color" => "Blanco", "modelo" => "Civic", "marca" => "Honda"],
                ["matrícula" => "9876PQR", "color" => "Plata", "modelo" => "Aventador", "marca" => "Lamborghini"]
            ];
            function MuestraCoche($coche){
                foreach($coche as $atributo){
                    echo("$atributo, ");
                } 
                echo("<br>");
            }
            function MuestraCoches($listaCoches){
                foreach($listaCoches as $coche){
                    echo(MuestraCoche($coche)." ");
                }
            }
            MuestraCoches($lista_coches); //antes de añadir dos coches
            $lista_coches[] = ["matrícula" => "2345DEF", "color" => "Gris", "modelo" => "Model 3", "marca" => "Tesla"];
            $lista_coches[] = ["matrícula" => "6789GHI", "color" => "Rojo", "modelo" => "Mustang", "marca" => "Ford"];
            MuestraCoches($lista_coches); //después de añadir dos coches
        ?>
    </body>
</html>