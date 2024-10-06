<?php

    // Variables que necesitamos para el programa

    // Variables donde almacena el nombre , descripcion y estado de las tareas por defecto la descripocion ya se encuentra en pendiente
    $nombre = "";
    $descripcion = "Pendiente";
    $estado = "";

    // Array donde almacenamos todas las tareas
    $listaTareas = [/*'Titulo' => $nombre , "Descripcion" => $descripcion , "Estado" => $estado*/];

    

    do {

        // Hacemos un bucle do - while el cual preguntaremos siempre que opcion quiere seleccionar expecto si selecciona la opcion 5 que nos salimos del bucle

        echo "
            ------------------------------
            | ********** MENU ********** |
            |  1 - Crear tarea           |
            |  2 - Listar tarea          |
            |  3 - Eliminar tarea        |
            |  4 - Editar tarea          |
            |  5 - Salir                 |
            |----------------------------|
        \n"; // Mostramos el menu

        $cont = fgets(STDIN); // Le pedimos al usuario por teclado un numero para entrar en cada opcion del menu

        echo "\n"; // Salto de linea para machor claridad

        switch ($cont) {// Utilizamos un switch el cual tiene como parametro de entrada el valor introducido por teclado
            case '1':
                añadirTareas($listaTareas);// Si la opcion es un 1 añadimos un nueva tarea a lista
                break;
            case '2':
                listarTareas($listaTareas); // Si la opcion es un 2 listamos las tareas de la lista
                break;
            case '3':
                eliminarTarea($listaTareas); // Si la opcion es 3 elimanos una tarea de la lista
                break;
            case '4':
                cambiarEstado($listaTareas); // Si la opcion es 4 cambiados el estado de la tarea
                break;
            case '5':
                echo "Saliendo del pograma hasta la proxima!!!"; // Si la opcion es 5 salimos del programa
                break;
            default:
                echo "Error no has seleccionado una opcion"; // Si no pulsamos bien nos dara un error
                break;
        }

    } while ($cont != 5); // Cuando pulsemos 5 saldremos el bucle mientras seguiremos dentro
    
    function añadirTareas(&$tareas){ // Creamos una funcion para añadir tareas . Pedimos como parametro una lista

        // Pedimos al usuario que introduzca por teclado tanto el nombre y descripcion de la tarea

        echo "Introduzcas el nombre de tu tarea: ";

        $nombre = fgets(STDIN);

        echo "Introduzca la descripción de su tarea: ";

        $descripcion = fgets(STDIN);

        // Añadimos al array quie hemos pasado como parametro un array asociativo el cual contiene 3 claves con sus respectivos valores

        $tareas[] = ['Titulo' => $nombre , 'Descripcion' => $descripcion , 'Estado' => 'Pendiente'];

    }

    function listarTareas($listaTareas){// Creamos otra funcion para listar tareas . Pedimos como parametro una lista
        
        if (empty($listaTareas)) { // Comprobamos que la lista no se encuentre vacia para listarla

            echo "La lista de tarea esta vacia"; // Si la lista esta vacia se lo decimos por pantalla

        }else {
            
            // Si la lista no se encuentra vacia la recorremos con un bucle forEach el cual recorremos el array pasado como parametro
            // El cual tenemos la variable variable la cual coge la clave del array y la variable valor valor la cual contiene los valores de las claves del array

            foreach($listaTareas as $variable => $valor ){

                // Vamos imprimiendo el ID de la tarea para poder eliminar la tarea y modificar el estado con mayor facilidad , el titulo , descripcion y el estado
                echo "******** TAREA ********\n";
                echo "ID tarea: " . ($variable + 1). "\n";
                echo "Titulo: " . $valor['Titulo'];
                echo "Descripcion: " . $valor['Descripcion'];
                echo "Estado: " . $valor['Estado'];
                echo "\n-----------------------\n";
            }
        }

    }

    function eliminarTarea(&$tareas){ // Creamos otra funcion para eliminar las tareas . Pedimos como parametro una lista

        // Pedimos al usuario que introduzca ID de la tarea

        echo "Introduzca el ID de la tarea a eliminar: ";

        $indice = fgets(STDIN);

        if(empty($tareas)){ // Comprobamos que la lista no se encuentre vacia para listarla

            echo "La lista de tarea esta vacia"; // Si la lista esta vacia se lo decimos por pantalla

        }else{

            unset($tareas[$indice -1]); // Borramos dentro del array la tarea segun el id que haya pasado el usuario
            echo "Tarea eliminada perfectamente \n"; // Mostramos que la tarea se ha eliminado correctamente

            $tareas = array_values($tareas);// Y reordenamos el array tras elimninar la tarea
        }

    }

    function cambiarEstado(&$tareas){ // Creamos otra funcion para cambiar el estado de una tarea . Pedimos como parametro una lista

        // Pedimos al usuario que introduzca ID de la tarea

        echo "Introduzca el numero de la tarea a modificar el estado: ";

        $id = fgets(STDIN);

        $id = $id - 1;



        foreach($tareas as $variable ){ // Recorremos el array con un bucle ForEach el cual recorre cada elemento del array

            if($id == $variable){// Si el id introducio es igual a al valor variable podemos cambiar el estado

                // echo "Vamos por buen camino";

                // Pedimos al usuario que introduzca el nuevo estado de la tarea

                echo "Introduzca el nuevo estado de la tarea: ";

                $estado = fgets(STDIN);

                $tareas[$id]['Estado'] = $estado; // Actulizamos el estado dentro del array con el valor introducido por el usuario


                echo "Tarea modificada correctamente\n"; // Mostramos por pantalla que la modificacion se ha realizado correctamente
                //break;

            }
        } 

    }

?>

