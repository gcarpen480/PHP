<?php

require_once "Libreria.php";
require_once "Libro.php";

$libreria = new Libreria();

// Crear libros
$libro1 = new Libro("Cien Años de Soledad", "Gabriel García Márquez", 19.99, 1967);
$libro2 = new Libro("Don Quijote de la Mancha", "Miguel de Cervantes", 25.50, 1605);
$libro3 = new Libro("El Principito", "Antoine de Saint-Exupéry", 9.99, 1943);

// Agregar libros a la librería
$libreria->agregarLibro($libro1);
$libreria->agregarLibro($libro2);
$libreria->agregarLibro($libro3);

// Listar todos los libros
$libreria->listarLibros();

// Buscar un libro por su título
$libreria->buscarPorTitulo("El Principito");

// Eliminar un libro por su título
$libreria->eliminarLibro("Cien Años de Soledad");

// Listar todos los libros después de eliminar
$libreria->listarLibros();


?>