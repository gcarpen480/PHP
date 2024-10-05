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

        echo "\n";

        switch ($cont) {
            case '1':
                agregarProducto($listaProductos);
                break;
            case '2':
                eliminarProductos($listaProductos);
                break;
            case '3':
                cambiarProductos($listaProductos);
                break;
            case '4':
                listarProdcutos($listaProductos);
                break;
            case '5':
                filtrasrProductos($listaProductos);
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

        if($precio < 0 || $cantidad < 0){

            echo "\nPrecio y/o cantidad incorrecto";
            return;
        }

        $productos[] = ['Nombre' => $nombre , 'Precio' => $precio , 'Cantidad' => $cantidad , 'Categoria' => $categoria];

    }

    function listarProdcutos($productos){

        if (empty($productos)) {
            echo "La lista de productos esta vacia";
        }else {
            foreach($productos as $variable => $valor ){

                echo "******** PRODUCTO ********\n";
                echo "ID producto: " . ($variable + 1). "\n";
                echo "Nombre: {$valor['Nombre']}";
                echo "Precio:  {$valor['Precio']}";
                echo "Cantidad: {$valor['Cantidad']}";
                echo "Categoria: {$valor['Categoria']}";
                echo "\n-----------------------\n";
            }
        }

    }

    function eliminarProductos(&$productos){

        echo "Introduzca el numero del producto a eliminar: ";

        $id = fgets(STDIN);

        if(empty($productos)){

            echo "La lista de productos esta vacia";

        }else{
            unset($productos[$id -1]);
            echo "Producto eliminado perfectamente \n";

            $productos = array_values($productos);
        }

    }

    function cambiarProductos(&$productos){

        echo "Introduzca el numero del producto a modificar: ";

        $id = fgets(STDIN);

        $id = $id - 1;

        foreach($productos as $variable => $valor ){

            if($id == $variable){

                echo "Introduzca el nuevo nombre del producto: ";

                $nombre = fgets(STDIN);

                echo "Introduzca el nuevo precio del producto: ";

                $precio = fgets(STDIN);

                echo "Introduzca la nueva cantidad del producto: ";

                $cantidad = fgets(STDIN);

                echo "Introduzca la nueva categoria del producto: ";

                $categoria = fgets(STDIN);

                if($precio < 0 || $cantidad < 0){

                    echo "\nPrecio y/o cantidad incorrecto";
                    break;
                }

                $productos[$id]['Nombre'] = $nombre;
                $productos[$id]['Precio'] = $precio;
                $productos[$id]['Cantidad'] = $cantidad;
                $productos[$id]['Categoria'] = $categoria;

                echo "\nProducto modificado correctamente\n";
            }
        }    
    }

    function filtrasrProductos($listaProductos){

        echo "Introduzca la categoría que desea filtrar: ";
        $categoria = trim(fgets(STDIN));

        $filtrados = [];
    
        foreach ($listaProductos as $producto) {
            if (trim($producto['Categoria']) === $categoria) {  
                $filtrados[] = $producto;
            }
        }

        if (empty($filtrados)) {
            echo "No se encontraron productos de esa categoría '$categoria'.\n";
        } else {
            // Display the filtered products
            foreach ($filtrados as $variable => $valor) {
                echo "******** PRODUCTO ********\n";
                echo "Nombre: {$valor['Nombre']}";
                echo "Precio: {$valor['Precio']}";
                echo "Cantidad: {$valor['Cantidad']}";
                echo "Categoría: {$valor['Categoria']}";
                echo "\n-----------------------\n";
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