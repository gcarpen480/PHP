<?php

    include("Conversor.php");

    echo "Introduce la moneda de origen (USD, EUR, GBP, KRW, ARS): ";
    $origen = trim(fgets(STDIN));

    echo "Introduce la moneda de destino (USD, EUR, GBP, KRW, ARS): ";
    $destino = trim(fgets(STDIN));

    echo "Introduce la cantidad a convertir: ";
    $cantidad = trim(fgets(STDIN));

    $conversor = new Conversor();

    $resultado = $conversor->convertir($origen, $destino, $cantidad);

    echo $resultado;

?>