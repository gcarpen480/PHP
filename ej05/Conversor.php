<?php

class Conversor{

    private $conversion;

    public function __construct() {

        $this->conversion = [
            'USD' => ['EUR' => 0.85, 'GBP' => 0.75, 'KRW' => 1350.00, 'ARS' => 350.00],
            'EUR' => ['USD' => 1.18, 'GBP' => 0.88, 'KRW' => 1580.00, 'ARS' => 410.00],
            'GBP' => ['USD' => 1.33, 'EUR' => 1.14, 'KRW' => 1780.00, 'ARS' => 460.00],
            'KRW' => ['USD' => 0.00074, 'EUR' => 0.00063, 'GBP' => 0.00056, 'ARS' => 0.26],
            'ARS' => ['USD' => 0.00286, 'EUR' => 0.00244, 'GBP' => 0.00217, 'KRW' => 3.85],
        ];
    }

    public function convertir($origen, $destino, $cantidad) {

        // https://www.php.net/manual/es/function.is-numeric.php de la API de php hemos conseguido encontrar una funcion que valida si es un numero el valor introducido

        if (!is_numeric($cantidad) || $cantidad <= 0) {
            return "Error: La cantidad debe ser un número positivo.";
        }

        if (!isset($this->conversion[$origen]) || !isset($this->conversion[$origen][$destino])) {
            return "La conversión entre $origen y $destino no se puedo hacer";
        }

        $valor_moneda = $this->conversion[$origen][$destino];
        $resultado = $cantidad * $valor_moneda;

        return "$cantidad $origen son " . $resultado ." ".$destino . "\n";
    }


    }
    

?>