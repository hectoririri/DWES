<?php
// mirar como sacar los datos ahora
header('Content-Type: text/xml');
readfile('https://ecb.europa.eu//stats/eurofxref/eurofxref-daily.xml');
?>