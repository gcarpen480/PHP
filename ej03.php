<?php

    $cantidad_prestamo = 10000;
    $tasa_interes = 5;
    $años_prestamo = 5;

    calculadora($cantidad_prestamo, $tasa_interes , $años_prestamo);

    function calculadora($cantidad_prestamo, $tasa_interes , $años_prestamo){

        validar_entrada($cantidad_prestamo, $tasa_interes , $años_prestamo);

        $pago_mensual = calcular_mensual($cantidad_prestamo, $tasa_interes , $años_prestamo);

        $pago_total = calcular_total($pago_mensual , $años_prestamo);

        echo "Pago mensual: " . $pago_mensual . "\n";
        echo "Pago total: " . $pago_total . "\n";

    }

    function validar_entrada($cantidad_prestamo, $tasa_interes , $años_prestamo){

        if ($cantidad_prestamo < 0) {
            echo "La cantidad introducidad deber ser un numero positivo\n";
        }if ($tasa_interes < 0) {
            echo "La tasa de interes introducidad deber ser un numero positivo\n";
        }if($años_prestamo < 0){
            echo "Los años introducidad deber ser un numero positivo\n";
        }

    }

    function calcular_mensual($cantidad_prestamo, $tasa_interes , $años_prestamo){

        $tasa_interes_mensual = $tasa_interes / 12 / 100;

        $num_pagos = $años_prestamo * 12;

        $pago_mensual = $cantidad_prestamo * $tasa_interes_mensual * pow(1 + $tasa_interes_mensual, $num_pagos) /
                    (pow(1 + $tasa_interes_mensual, $num_pagos) - 1); // Generado gracias a Chat


        return $pago_mensual;


    }

    function calcular_total($pago_mensual, $años_prestamo) {
        // Número total de meses
        $num_pagos = $años_prestamo * 12;
    
        // El pago total es el pago mensual multiplicado por el número de meses
        return $pago_mensual * $num_pagos;
    }

?>