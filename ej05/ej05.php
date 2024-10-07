<?php

    // Incluimos el archivo que contiene la clase Conversor.
    include("Conversor.php");

    // Pedimos al usuario que introduzca la moneda de origen.
    echo "Introduce la moneda de origen (USD, EUR, GBP, KRW, ARS): ";

    $origen = trim(fgets(STDIN));

    // Pedimos al usuario que introduzca la moneda de destino.
    echo "Introduce la moneda de destino (USD, EUR, GBP, KRW, ARS): ";

    $destino = trim(fgets(STDIN));

    // Pedimos al usuario que introduzca la cantidad a convertir.
    echo "Introduce la cantidad a convertir: ";
    $cantidad = trim(fgets(STDIN));

    // Creamos una instancia de la clase Conversor.
    $conversor = new Conversor();

    // Llamamos al método convertir de la clase Conversor y almacenamos el resultado.
    $resultado = $conversor->convertir($origen, $destino, $cantidad);

    // Mostramos el resultado de la conversión.
    echo $resultado;

?>
