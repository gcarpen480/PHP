<?php

class Libro {
    
    private $titulo;
    private $autor;
    private $precio;
    private $añoPublicacion;

    // Constructor
    public function __construct($titulo, $autor, $precio, $añoPublicacion) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->precio = $precio;
        $this->añoPublicacion = $añoPublicacion;
    }

    // Getter para título
    public function getTitulo() {
        return $this->titulo;
    }

    // Setter para título
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    // Getter para autor
    public function getAutor() {
        return $this->autor;
    }

    // Setter para autor
    public function setAutor($autor) {
        $this->autor = $autor;
    }

    // Getter para precio
    public function getPrecio() {
        return $this->precio;
    }

    // Setter para precio
    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    // Getter para año de publicación
    public function getAñoPublicacion() {
        return $this->añoPublicacion;
    }

    // Setter para año de publicación
    public function setAñoPublicacion($añoPublicacion) {
        $this->añoPublicacion = $añoPublicacion;
    }
}

?>
