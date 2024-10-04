<!-- 
19. Realizar una página que verifique si un dni/nif es correcto. (solo hace falta para los que
tienen el formato NúmeroLetra).
Formato NIF: http://es.wikipedia.org/wiki/N%C3%BAmero_de_identificaci%C3%B3n_fiscal
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 19</title>
    </head>
    <body>
        <?php
             function letraDNI($resto){
                $letras = ['t','r','w','a','g','m','y','f','p','d','x','b','n','j','z','s','q','v','h','l','c','k','e'];
                return strtoupper($letras[$resto]);
             }
             function isDNIRight($dni){ //si retorno false no aparece nada en echo, por eso pongo un texto indicando el booleano
                if (strlen($dni) > 9){
                    return "MAL";
                }
                $dniNumbers = (int)substr($dni,0,8);
                $letraDNI = (letraDNI($dniNumbers%23));
                if ($dni[strlen($dni)-1] == $letraDNI){
                    return "BIEN";
                } else{
                    return "MAL";
                }
             }
             echo("DNI: 54794584M = " . isDNIRight("54794584M"));
             echo("<br>DNI: 1472468144E = " . isDNIRight("1472468144E"));
             echo("<br>DNI: 54794584E= " . isDNIRight("54794584E"));
             echo("<br>DNI: 54794D84E= " . isDNIRight("54794D84E"));
             
        ?>
    </body>
</html>