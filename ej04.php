<?php

    // Initialize the users array
    $usuarios = [];

    while (true) {
        echo "
            ------------------------------
            | ********** MENU ********** |
            |  1 - Registrar             |
            |  2 - Iniciar sesión        |
            |  3 - Salir                 |
            |----------------------------|
        \n";

        $cont = fgets(STDIN); 

        switch (trim($cont)) {
            case '1':

                $nombreUsuario = readline("Enter a username: ");
                $correo = readline("Enter an email: ");
                $contraseña = readline("Enter a password: ");

                
                registro_usuarios($nombreUsuario, $correo, $contraseña, $usuarios);
                break;
            
            case '2':

                $login = readline("Enter username or email: ");
                $contraseña = readline("Enter your password: ");

                
                login_usuarios($login, $contraseña, $usuarios);
                break;
            
            case '3':
                
                echo "Saliendo del programa, hasta la próxima!!!\n";
                exit;

            default:

                echo "Error: No has seleccionado una opción válida\n";
                break;
        }
    }


    function registro_usuarios($nombreUsuario, $correo, $contraseña, &$usuarios) {
        foreach ($usuarios as $usuario) {
            
            if ($usuario["nombreUsuario"] == $nombreUsuario || $usuario["correo"] == $correo) {

                echo "Error: Usuario o correo ya existe, ¡escoja otro!\n";

                return false;
            }
        }

        $usuarios[] = [
            "nombreUsuario" => $nombreUsuario,
            "correo" => $correo,
            "contraseña" => $contraseña,
        ];

        echo "¡Te has registrado perfectamente! Bienvenido, $nombreUsuario\n";
        return true;
    }

    function login_usuarios($inicio, $contraseña, $usuarios) {
        foreach ($usuarios as $usuario) {

            if (($usuario["nombreUsuario"] == $inicio || $usuario["correo"] == $inicio) && $usuario["contraseña"] == $contraseña) {

                echo "¡Has iniciado sesión correctamente! Bienvenido, " . $usuario["nombreUsuario"] . "\n";

                return true;
            }
        }

        echo "No has podido iniciar sesión, ¡inténtalo de nuevo!\n";
        return false;
    }

?>

