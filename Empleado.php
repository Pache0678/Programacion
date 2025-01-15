<?php
class empleado {
    public $nombre;
    public $sueldo;

    public function __construct($nombre, $sueldo) {
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
    }
    public function mostrardetalles(){
        echo "Imprimiendo datos de el empleado\n". $this->nombre;
        echo "Su dinero es \n". $this->sueldo;
    }
}

class gerente extends empleado{
    public $departamento;

    public function __construct($nombre, $sueldo, $departamento) {
        parent::__construct($nombre, $sueldo);
        $this->departamento = $departamento;
    }

    public function mostrarDetalles() {
        echo "Imprimiendo datos del gerente\n";
        echo "Nombre: " . $this->nombre . "\n";
        echo "Sueldo: " . $this->sueldo . "\n";
        echo "Departamento: " . $this->departamento . "\n";




    }
}

$empleado = new Empleado("Juan Perez", 50000);
$gerente = new Gerente("Laura Gomez", 80000, "Recursos Humanos");

$empleado->mostrardetalles();
$gerente->mostrardetalles();

?>