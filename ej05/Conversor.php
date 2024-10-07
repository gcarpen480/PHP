<?php

class Conversor{

    // Declaramos una variable privada llamada conversion que almacenará las tasas de conversión entre las diferentes monedas.
    private $conversion;

    // Creamos un constructor
    public function __construct() {

        // Inicializamos la variable conversion con un array asociativo que contiene las tasas de conversión.
        $this->conversion = [
            'USD' => ['EUR' => 0.85, 'GBP' => 0.75, 'KRW' => 1350.00, 'ARS' => 350.00],
            'EUR' => ['USD' => 1.18, 'GBP' => 0.88, 'KRW' => 1580.00, 'ARS' => 410.00],
            'GBP' => ['USD' => 1.33, 'EUR' => 1.14, 'KRW' => 1780.00, 'ARS' => 460.00],
            'KRW' => ['USD' => 0.00074, 'EUR' => 0.00063, 'GBP' => 0.00056, 'ARS' => 0.26],
            'ARS' => ['USD' => 0.00286, 'EUR' => 0.00244, 'GBP' => 0.00217, 'KRW' => 3.85],
        ];
    }

    // Creanis una funcion para convertir una cantidad de una moneda a otra.
    public function convertir($origen, $destino, $cantidad) {

        // Verificamos si la cantidad es un número positivo. Si no lo es, devolvemos un mensaje de error.
        //https://www.php.net/manual/es/function.is-numeric.php de la API de php hemos conseguido encontrar una funcion que valida si es un numero el valor introducido
        
        if (!is_numeric($cantidad) || $cantidad <= 0) {
            return "Error: La cantidad debe ser un número positivo.";
        }

        // Verificamos si las monedas de origen y destino existen en nuestro array conversion.
        if (!isset($this->conversion[$origen]) || !isset($this->conversion[$origen][$destino])) {
            return "La conversión entre $origen y $destino no se puede hacer";
        }

        // Obtenemos la tasa de conversión entre las monedas de origen y destino.

        $valor_moneda = $this->conversion[$origen][$destino];

        // Calculamos el resultado de la conversión.
        $resultado = $cantidad * $valor_moneda;

        // Devolvemos el resultado de la conversión en un formato entendible.
        return "$cantidad $origen son " . $resultado . " " . $destino . "\n";
    }

}
    

?>

