<?php

class Empleado {
    protected $nombre;
    protected $sueldo;
    protected $aniosExperiencia;

    public function __construct($nombre, $sueldo, $aniosExperiencia) {
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
        $this->aniosExperiencia = $aniosExperiencia;
    }

    public function calcularBonus() {
        $bonus = ($this->aniosExperiencia / 2) * 0.05 * $this->sueldo; 
        return $bonus;
    }

    public function mostrarDetalles() {
        echo "Nombre: {$this->nombre}\n";
        echo "Sueldo: {$this->sueldo}€\n";
        echo "Años de Experiencia: {$this->aniosExperiencia}\n";
    }
}

class Consultor extends Empleado {
    private $horasPorProyecto;

    public function __construct($nombre, $sueldo, $aniosExperiencia, $horasPorProyecto) {
        parent::__construct($nombre, $sueldo, $aniosExperiencia);  
        $this->horasPorProyecto = $horasPorProyecto;
    }

    public function calcularBonus() {
        $bonus = parent::calcularBonus();

        if ($this->horasPorProyecto > 100) {
            $bonus += 0.1 * $this->sueldo;  
        }

        return $bonus;
    }

    public function mostrarDetalles() {
        parent::mostrarDetalles();  // Mostrar detalles del empleado
        echo "Horas por Proyecto: {$this->horasPorProyecto}\n";
    }
}

$empleado = new Empleado("Carlos Pérez", 2500, 6);

$consultor = new Consultor("Ana Gómez", 3000, 5, 120);

echo "Detalles del Empleado:\n";
$empleado->mostrarDetalles();
echo "Bonus del Empleado: " . $empleado->calcularBonus() . "€\n\n";

echo "Detalles del Consultor:\n";
$consultor->mostrarDetalles();
echo "Bonus del Consultor: " . $consultor->calcularBonus() . "€\n";

?>
