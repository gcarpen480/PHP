<?php

    $cont = 0;
    $nombre = "";
    $precio = 0;
    $cantidad = 0;
    $categoria = "";

    $listaProductos = [];


    do {
        
        echo "
            ------------------------------
            | ********** MENU ********** |
            |  1 - Crear productos       |
            |  2 - Eliminar productos    |
            |  3 - Editar productos      |
            |  4 - Listar productos      |
            |  5 - Filtrar productos     |
            |  6 - Calcular valor total  |
            |  7 - Salir                 |
            |----------------------------|
        \n";

        $cont = fgets(STDIN);

        switch ($cont) {
            case '1':
                agregarProducto($listaProductos);
                break;
            case '2':
                
                break;
            case '3':

                break;
            case '4':

                listarProdcutos($listaProductos);
                
                break;
            case '5':
                
                break;
            case '6':
                
                valortotal($listaProductos);

                break;

            case '7':
                
                echo "Saliendo del pograma hasta la proxima!!!";

                break;
            default:
                echo "Error no has seleccionado una opcion";
                break;
        }

    } while ($cont != 7);
    


    function agregarProducto(&$productos){

        echo "Introduzcas el nombre del producto: ";

        $nombre = fgets(STDIN);

        echo "Introduzca el precio del producto: ";

        $precio = fgets(STDIN);

        echo "Introduzca el stock del producto: ";

        $cantidad = fgets(STDIN);

        echo "Introduzca la categoria del producto: ";

        $categoria = fgets(STDIN);


        $productos[] = ['Nombre' => $nombre , 'Precio' => $precio , 'Cantidad' => $cantidad , 'Categoria' => $categoria];

    }

    function listarProdcutos($productos){

        if (empty($productos)) {
            echo "La lista de productos esta vacia";
        }else {
            foreach($productos as $variable => $valor ){

                echo "Nombre: {$valor['Nombre']}";
                echo "Precio:  {$valor['Precio']}";
                echo "Cantidad: {$valor['Cantidad']}";
                echo "Categoria: {$valor['Categoria']}";
            }
        }

    }

    function valortotal($listaProductos){

        $total = 0;

       
        foreach($listaProductos as $variable){

            $total += $variable['Precio'] * $variable['Cantidad'];
            
        }
        

        echo "Valor total del inventaraio es de = " . $total . " €";

    }

?>