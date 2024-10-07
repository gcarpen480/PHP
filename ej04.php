<?php

    // Array donde almacenamos los usuarios
    $usuarios = [];

    // Hacemos un bucle do - while el cual preguntaremos siempre que opcion quiere seleccionar expecto si cambia de true a false que salimos del bucle

    while (true) {"
            ------------------------------
            | ********** MENU ********** |
            |  1 - Registrar             |
            |  2 - Iniciar sesión        |
            |  3 - Salir                 |
            |----------------------------|
        \n";// Mostramos el menu

        $cont = fgets(STDIN);  // Le pedimos al usuario por teclado un numero para entrar en cada opcion del menu

        switch (trim($cont)) {// Utilizamos un switch el cual tiene como parametro de entrada el valor introducido por teclado
            case '1':// Si la opcion es un 1 creamos un nuevo usuario

                // Pedimos al usuario que introduzca el nombre de usuario.

                echo "Introduzca el nombre de usuario: ";

                $nombreUsuario = trim(fgets(STDIN));

                // Pedimos al usuario que introduzca el correo de usuario.
                echo "Introduzca el correo del usuario: ";

                $correo = trim(fgets(STDIN));

                // Pedimos al usuario que introduzca la contraseaña.

                echo "Introduce la contraseña del usuario: ";
                $contraseña = trim(fgets(STDIN));

                
                registro_usuarios($nombreUsuario, $correo, $contraseña, $usuarios);// Llamamos a la funcion para registrar a los usuarios y le pasamos los parametros necesarios para registrar un usuario
                break;
            
            case '2':// Si la opcion es un 2 iniciamos sesion con un usuario previamente creado

                // Pedimos al usuario que introduzca el nombre de usuario.

                echo "Introduzca el nombre de usuario o correo del usuario: ";

                $login = trim(fgets(STDIN));

                // Pedimos al usuario que introduzca el correo de usuario.
                echo "Introduzca la contraseña del usuario: ";

                $contraseña = trim(fgets(STDIN));

                login_usuarios($login, $contraseña, $usuarios);// Llamamos a la funcion para poder logerse a los usuarios y le pasamos los parametros necesarios para logearse los usuarios
                break;
            
            case '3':
                
                echo "Saliendo del programa, hasta la próxima!!!\n";// Si la opcion es 3 salimos del programa
                exit;

            default:

                echo "Error: No has seleccionado una opción válida\n";// Si no pulsamos bien nos dara un error
                break;
        }
    }


    function registro_usuarios($nombreUsuario, $correo, $contraseña, &$usuarios) {// Creamos una funcion para registrar los usuarios el cual le pedimos como parametro el nombre de usurio , correo , contraseña y el array donde se almacena los usuarios
        foreach ($usuarios as $usuario) {// Recorremos el array con un bucle ForEach el cual recorre cada elemento del array
            
            if ($usuario["nombreUsuario"] == $nombreUsuario || $usuario["correo"] == $correo) {// Comprobamos si el nombre de usuario o el correo ya se encuentran registrados

                echo "Error: Usuario o correo ya existe, ¡escoja otro!\n";// Si es asi se lo decimos al usuario en pantalla

                return false;
            }
        }

        // Si no es asi registramos el usuario en el array pasado como parametro
        // Añadimos al array quie hemos pasado como parametro un array asociativo el cual contiene 3 claves con sus respectivos valores

        $usuarios[] = [
            "nombreUsuario" => $nombreUsuario,
            "correo" => $correo,
            "contraseña" => $contraseña,
        ];

        echo "¡Te has registrado perfectamente! Bienvenido, $nombreUsuario\n"; // Y le mostramos al usuario que se ha registrado correctamente
        return true;
    }

    function login_usuarios($inicio, $contraseña, $usuarios) {// Creamos una funcion para poder logearse los usuarios el cual le pedimos como parametro el nombre de usurio o correo , contraseña y el array donde se almacena los usuarios
        foreach ($usuarios as $usuario) {// Recorremos el array con un bucle ForEach el cual recorre cada elemento del array

            // Comprobamos si el nombre de usuario o el correo y la contraseña coinciden con los valores que se encuentran almacenados en el array
            if (($usuario["nombreUsuario"] == $inicio || $usuario["correo"] == $inicio) && $usuario["contraseña"] == $contraseña) {

                echo "¡Has iniciado sesión correctamente! Bienvenido, " . $usuario["nombreUsuario"] . "\n";// Si es asi le damos la bienvenida al usuario

                return true;
            }
        }

        echo "No has podido iniciar sesión, ¡inténtalo de nuevo!\n";// Si no pues le decimos que no se ha podido iniciar sesion
        return false;
    }

?>

