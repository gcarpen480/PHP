<?php

    // Pedimos al usuario que introduzca la cantidad del prestamo.

    echo "Introduzca la cantidad del prestamo: ";

    $cantidad_prestamo = trim(fgets(STDIN));

    // Pedimos al usuario que introduzca la tasa de interes
    echo "Introduzca la tasa de interes: ";

    $tasa_interes = trim(fgets(STDIN));

    // Pedimos al usuario que introduzca los años de prestamo.

    echo "Introduce los años de prestamo: ";
    $años_prestamo = trim(fgets(STDIN));

    calculadora($cantidad_prestamo, $tasa_interes , $años_prestamo);// Llamada a la funcion donde se realizan todos los calculos le pasamos como parametro las variables de antes creadas

    function calculadora($cantidad_prestamo, $tasa_interes , $años_prestamo){// Creamos una funcion donde pedimos los parametros cantidad , tasa y años en la cual se calcula el pago mensual y el pago total

        validar_entrada($cantidad_prestamo, $tasa_interes , $años_prestamo);// Comprobamos que los datos introducidos son validos a traves de una funcion que hemos creado

        $pago_mensual = calcular_mensual($cantidad_prestamo, $tasa_interes , $años_prestamo);// Calculamos el pago mensual a traves de una funcion que tambien hemos creado

        $pago_total = calcular_total($pago_mensual , $años_prestamo);// Y calculamos el pago total a traves de una funcion que tambien hemos creado

        // Mostramos los resultados

        echo "\nPago mensual: " . $pago_mensual . "\n";
        echo "Pago total: " . $pago_total . "\n";

    }

    function validar_entrada($cantidad_prestamo, $tasa_interes , $años_prestamo){// Creamos una funcion para validar la entrada y le pasamos como parametro la cantidad , tasa y años de prestamos

        // Comprobamos  si las 3 parametros que nos pasaron son menores que 0 si son asi le mostramos un mensaje que tiene que ser un numero positivo

        if ($cantidad_prestamo < 0) {
            echo "La cantidad introducidad deber ser un numero positivo\n";
        }if ($tasa_interes < 0) {
            echo "La tasa de interes introducidad deber ser un numero positivo\n";
        }if($años_prestamo < 0){
            echo "Los años introducidad deber ser un numero positivo\n";
        }

    }

    function calcular_mensual($cantidad_prestamo, $tasa_interes , $años_prestamo){// Creamos una funcion para calcular el pago mensual y le pasamos como parametro la cantidad , tasa y años de prestamos

        $tasa_interes_mensual = $tasa_interes / 12 / 100;// Calculamos la tasa de interez mensual

        $num_pagos = $años_prestamo * 12; // Calculamos el numero de pagos a pagar

        // Calculamos el pago mensual
        $pago_mensual = $cantidad_prestamo * $tasa_interes_mensual * pow(1 + $tasa_interes_mensual, $num_pagos) /
                    (pow(1 + $tasa_interes_mensual, $num_pagos) - 1); // Generado gracias a Chat


        return $pago_mensual;// Devolvemos el pago mensual


    }

    function calcular_total($pago_mensual, $años_prestamo) {// Creamos una funcion para calcular el pago total y le pasamos como el pago mensual y los años de prestamo
        
        $num_pagos = $años_prestamo * 12; // Calculamos el numero de pagos a pagar
    
        // Devolvemos el pago total que es el pago mensual multiplicado por el número de meses
        return $pago_mensual * $num_pagos;
    }

?>