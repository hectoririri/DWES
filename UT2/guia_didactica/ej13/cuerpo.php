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
<?php
$cuerpo = ("Yo soy el fichero cuerpo.php");
?>