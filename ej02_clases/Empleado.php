<?php
// Clase Empleado
class Empleado {
    private $nombre;
    private $puesto;
    private $salario;

    // Constructor
    public function __construct($nombre, $puesto, $salario) {
        $this->nombre = $nombre;
        $this->puesto = $puesto;
        $this->salario = $salario;
    }

    // Getters
    public function getNombre() {
        return $this->nombre;
    }

    public function getPuesto() {
        return $this->puesto;
    }

    public function getSalario() {
        return $this->salario;
    }

    // Setters
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setPuesto($puesto) {
        $this->puesto = $puesto;
    }

    public function setSalario($salario) {
        $this->salario = $salario;
    }
}

?>