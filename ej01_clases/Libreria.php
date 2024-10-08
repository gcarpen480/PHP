<?php

require_once 'Libro.php'; 

class Libreria {
    private $libros = array();

    // Método para agregar un libro
    public function agregarLibro(Libro $libro) {
        $this->libros[] = $libro;
    }

    // Método para listar todos los libros
    public function listarLibros() {
        if (empty($this->libros)) {
            echo "No hay libros en la librería.\n";
        } else {
            foreach ($this->libros as $libro) {
                echo "-----------LIBRERIA---------\n";
                echo "Título: " . $libro->getTitulo() . "\n";
                echo "Autor: " . $libro->getAutor() . "\n";
                echo "Precio: $" . $libro->getPrecio() . "\n";
                echo "Año de Publicación: " . $libro->getAñoPublicacion() . "\n";
                echo "-------------------------\n";
            }
        }
    }

    public function buscarPorTitulo($titulo) {
        $encontrado = false;

        foreach ($this->libros as $libro) {
            if ($libro->getTitulo() == $titulo) {
                echo "-----------LIBRERIA FILTRADA---------\n";
                echo "Título: " . $libro->getTitulo() . "\n";
                echo "Autor: " . $libro->getAutor() . "\n";
                echo "Precio: $" . $libro->getPrecio() . "\n";
                echo "Año de Publicación: " . $libro->getAñoPublicacion() . "\n";
                echo "-------------------------\n";
                $encontrado = true;
            }
        }

        if (!$encontrado) {
            echo "No se encontraron libros con el título '$titulo'.\n";
        }
    }

    public function eliminarLibro($titulo) {
        for ($i = 0; $i < count($this->libros); $i++) {
            if ($this->libros[$i]->getTitulo() == $titulo) {
                unset($this->libros[$i]); // Eliminamos el libro
                echo "Libro '$titulo' eliminado.\n";
                return; // Salimos del método cuando encontramos el libro
            }
        }
        echo "No se encontró ningún libro con el título '$titulo'.\n";
    }

}

?>
