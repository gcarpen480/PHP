<?php

    $cont = 0;

    $nombre = "";
    $descripcion = "Pendiente";
    $estado = "";

    $listaTareas = [/*'Titulo' => $nombre , "Descripcion" => $descripcion , "Estado" => $estado*/];

    

    do {

        echo "
            ------------------------------
            | ********** MENU ********** |
            |  1 - Crear tarea           |
            |  2 - Listar tarea          |
            |  3 - Eliminar tarea        |
            |  4 - Editar tarea          |
            |  5 - Salir                 |
            |----------------------------|
        \n";

        $cont = fgets(STDIN);

        echo "\n";

        switch ($cont) {
            case '1':
                añadirTareas($listaTareas);
                break;
            case '2':
                listarTareas($listaTareas);
                break;
            case '3':
                eliminarTarea($listaTareas);
                break;
            case '4':
                cambiarEstado($listaTareas);
                break;
            case '5':
                echo "Saliendo del pograma hasta la proxima!!!";
                break;
            default:
                echo "Error no has seleccionado una opcion";
                break;
        }

    } while ($cont != 5);
    
    function añadirTareas(&$tareas){

        echo "Introduzcas el nombre de tu tarea: ";

        $nombre = fgets(STDIN);

        echo "Introduzca la descripción de su tarea: ";

        $descripcion = fgets(STDIN);


        $tareas[] = ['Titulo' => $nombre , 'Descripcion' => $descripcion , 'Estado' => 'Pendiente'];

    }

    function listarTareas($listaTareas){
        
        if (empty($listaTareas)) {

            echo "La lista de tarea esta vacia";

        }else {
            
            foreach($listaTareas as $variable => $valor ){

                echo "******** TAREA ********\n";
                echo "ID tarea: " . ($variable + 1). "\n";
                echo "Titulo: " . $valor['Titulo'];
                echo "Descripcion: " . $valor['Descripcion'];
                echo "Estado: " . $valor['Estado'];
                echo "\n-----------------------\n";
            }
        }

    }

    function eliminarTarea(&$tareas){

        echo "Introduzca el numero de la tarea a eliminar: ";

        $indice = fgets(STDIN);

        if(empty($tareas)){

            echo "La lista de tarea esta vacia";

        }else{
            unset($tareas[$indice -1]);
            echo "Tarea eliminada perfectamente \n";

            $tareas = array_values($tareas);
        }

    }

    function cambiarEstado(&$tareas){

        echo "Introduzca el numero de la tarea a modificar el estado: ";

        $id = fgets(STDIN);

        $id = $id - 1;

        foreach($tareas as $variable => $valor ){

            if($id == $variable){

                // echo "Vamos por buen camino";

                echo "Introduzca el nuevo estado de la tarea: ";

                $estado = fgets(STDIN);

                $tareas[$id]['Estado'] = $estado;


                echo "Tarea modificada correctamente\n";
                //break;

            }
        } 

    }

?>

