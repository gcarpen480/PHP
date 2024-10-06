<?php

    // Variables que necesitamos para el programa

    // Variables donde almacena el nombre , precio , cantidad y categoria de los producto

    $nombre = "";
    $precio = 0;
    $cantidad = 0;
    $categoria = "";

    // Array donde almacenamos todos los productos
    $listaProductos = [];

    // Hacemos un bucle do - while el cual preguntaremos siempre que opcion quiere seleccionar expecto si selecciona la opcion 7 que nos salimos del bucle
    
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
        \n";// Mostramos el menu

        $cont = fgets(STDIN); // Le pedimos al usuario por teclado un numero para entrar en cada opcion del menu

        echo "\n"; // Salto de linea para machor claridad

        switch ($cont) {// Utilizamos un switch el cual tiene como parametro de entrada el valor introducido por teclado
            case '1':
                agregarProducto($listaProductos);// Si la opcion es un 1 añadimos un nuevo producto a lista
                break;
            case '2':
                eliminarProductos($listaProductos);// Si la opcion es un 2 eliminamos un producto de la lista
                break;
            case '3':
                cambiarProductos($listaProductos); // Si la opcion es 3 cambiamos el productos por completo de la lista
                break;
            case '4':
                listarProdcutos($listaProductos);// Si la opcion es 4 listamos todos los productos de la lista
                break;
            case '5':
                filtrasrProductos($listaProductos);// Si la opcion es 5 filtramos los productos segun una categoria
                break;
            case '6':
                valortotal($listaProductos);// Si la opcion es 6 calculamos el valor total de todos los productos de la lista
                break;
            case '7':
                echo "Saliendo del pograma hasta la proxima!!!"; // Si la opcion es 7 salimos del programa
                break;
            default:
                echo "Error no has seleccionado una opcion";// Si no pulsamos bien nos dara un error
                break;
        }

    } while ($cont != 7);// Cuando pulsemos 7 saldremos el bucle mientras seguiremos dentro
    


    function agregarProducto(&$productos){ // Creamos una funcion para añadir productos . Pedimos como parametro una lista

        // Pedimos al usuario que introduzca por teclado tanto el nombre , precio , cantidad y categoria de los productos

        echo "Introduzcas el nombre del producto: ";

        $nombre = fgets(STDIN);

        echo "Introduzca el precio del producto: ";

        $precio = fgets(STDIN);

        echo "Introduzca el stock del producto: ";

        $cantidad = fgets(STDIN);

        echo "Introduzca la categoria del producto: ";

        $categoria = fgets(STDIN);

        // Comprobamos si el precio introducido y la cantidad son menores de 0 si son asi le mostramos un mensaje que no pueden ser

        if($precio < 0 || $cantidad < 0){

            echo "\nPrecio y/o cantidad incorrecto";
            return;
        }

        // Añadimos al array quie hemos pasado como parametro un array asociativo el cual contiene 4 claves con sus respectivos valores

        $productos[] = ['Nombre' => $nombre , 'Precio' => $precio , 'Cantidad' => $cantidad , 'Categoria' => $categoria];

    }

    function listarProdcutos($productos){// Creamos otra funcion para listar los productos . Pedimos como parametro una lista

        if (empty($productos)) {// Comprobamos que la lista no se encuentre vacia para listarla
            echo "La lista de productos esta vacia";// Si la lista esta vacia se lo decimos por pantalla
        }else {

            // Si la lista no se encuentra vacia la recorremos con un bucle forEach el cual recorremos el array pasado como parametro
            // El cual tenemos la variable variable la cual coge la clave del array y la variable valor valor la cual contiene los valores de las claves del array

            foreach($productos as $variable => $valor ){

                // Vamos imprimiendo el ID de los productos para poder eliminar la tarea y modificar el estado con mayor facilidad ademas tambien mostramos el Nombre , Precio , Cantidad y la Categoria
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

    function eliminarProductos(&$productos){// Creamos otra funcion para eliminar los productos . Pedimos como parametro una lista

        // Pedimos al usuario que introduzca ID del producto

        echo "Introduzca el numero del producto a eliminar: ";

        $id = fgets(STDIN);

        if(empty($productos)){ // Comprobamos que la lista no se encuentre vacia para listarla

            echo "La lista de productos esta vacia"; // Si la lista esta vacia se lo decimos por pantalla

        }else{
            unset($productos[$id -1]); // Borramos dentro del array el producto segun el id que haya pasado el usuario
            echo "Producto eliminado perfectamente \n"; // Mostramos que el producto se ha eliminado correctamente

            $productos = array_values($productos);// Y reordenamos el array tras elimninar la tarea
        }

    }

    function cambiarProductos(&$productos){// Creamos otra funcion para cambiar los productos . Pedimos como parametro una lista

        // Pedimos al usuario que introduzca ID del producto

        echo "Introduzca el numero del producto a modificar: "; 

        $id = fgets(STDIN);

        $id = $id - 1;

        foreach($productos as $variable => $valor ){ // Recorremos el array con un bucle ForEach el cual recorre cada elemento del array

            if($id == $variable){// Si el id introducio es igual a al valor variable podemos cambiar el producto

                // Pedimos al usuario que introduzca el el nombre , precio , cantidad y categoria de la edicion del producto

                echo "Introduzca el nuevo nombre del producto: ";

                $nombre = fgets(STDIN);

                echo "Introduzca el nuevo precio del producto: ";

                $precio = fgets(STDIN);

                echo "Introduzca la nueva cantidad del producto: ";

                $cantidad = fgets(STDIN);

                echo "Introduzca la nueva categoria del producto: ";

                $categoria = fgets(STDIN);

                // Comprobamos si el precio introducido y la cantidad son menores de 0 si son asi le mostramos un mensaje que no pueden ser

                if($precio < 0 || $cantidad < 0){

                    echo "\nPrecio y/o cantidad incorrecto";
                    break;
                }

                // Actualizamos los valores

                $productos[$id]['Nombre'] = $nombre;
                $productos[$id]['Precio'] = $precio;
                $productos[$id]['Cantidad'] = $cantidad;
                $productos[$id]['Categoria'] = $categoria;

                echo "\nProducto modificado correctamente\n"; // Mostramos que los cambios se han realizado correctamente
            }
        }    
    }

    function filtrasrProductos($listaProductos){// Creamos otra funcion para filtrar los productos . Pedimos como parametro una lista

        // Pedimos al usuario que introduzca una categoria para filtrar
        
        echo "Introduzca la categoría que desea filtrar: ";
        $categoria = trim(fgets(STDIN));

        $filtrados = []; // Creamos un array para colocar los productos filtrados
    
        foreach ($listaProductos as $producto) {// Recorremos el array con un bucle ForEach el cual recorre cada elemento del array
            if (trim($producto['Categoria']) === $categoria) {  // Comprobamos si la categoria del array coincide con la categoria pasada por el usuario
                $filtrados[] = $producto;// Si es asi añadimos al array de filtrados el producto para despues mostrarlo por pantalla
            }
        }

        if (empty($filtrados)) { // Comprobamos que la lista no se encuentre vacia para listarla
            echo "No se encontraron productos de esa categoría '$categoria'.\n";// Si la lista esta vacia se lo decimos por pantalla
        } else {
            // Recorremos el array con un bucle ForEach el cual recorre cada elemento del array
            foreach ($filtrados as $variable => $valor) {

                // Mostramos los productos filtradoss

                echo "******** PRODUCTO ********\n";
                echo "Nombre: {$valor['Nombre']}";
                echo "Precio: {$valor['Precio']}";
                echo "Cantidad: {$valor['Cantidad']}";
                echo "Categoría: {$valor['Categoria']}";
                echo "\n-----------------------\n";
            }
        }

    }

    function valortotal($listaProductos){// Creamos otra funcion para calcular el valor total los productos . Pedimos como parametro una lista

        $total = 0; // Creamos una variable para almacenar el valor total

       
        foreach($listaProductos as $variable){// Recorremos el array con un bucle ForEach el cual recorre cada elemento del array

            $total += $variable['Precio'] * $variable['Cantidad']; // Vamos almacenando y sumando en la variable creada antes el calculo del Precio por la Cantidad
            
        }
        

        echo "Valor total del inventaraio es de = " . $total . " €"; // Mostramos el valor total que tenemos en el inventario

    }

?>