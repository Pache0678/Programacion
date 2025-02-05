<?php

class Tarea {
    private $nombre;
    private $descripcion;
    private $fechaLimite;
    private $estado;

    public function __construct($nombre, $descripcion, $fechaLimite) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fechaLimite = $fechaLimite;
        $this->estado = "pendiente";  
    }

    public function marcarComoCompletada() {
        $this->estado = "completada";
    }

    public function editarDescripcion($nuevaDescripcion) {
        $this->descripcion = $nuevaDescripcion;
    }

    public function mostrarTarea() {
        echo "Nombre: {$this->nombre}\n";
        echo "Descripción: {$this->descripcion}\n";
        echo "Fecha Límite: {$this->fechaLimite}\n";
        echo "Estado: {$this->estado}\n";
    }
}

$tareas = [
    new Tarea("Tarea 1", "Descripción de la tarea 1", "2025-02-10"),
    new Tarea("Tarea 2", "Descripción de la tarea 2", "2025-02-15"),
    new Tarea("Tarea 3", "Descripción de la tarea 3", "2025-02-20"),
];

echo "Mostrando todas las tareas:\n";
foreach ($tareas as $tarea) {
    $tarea->mostrarTarea();
    echo "\n";
}

$tareas[0]->marcarComoCompletada();

$tareas[1]->editarDescripcion("Nueva descripción para la tarea 2");

echo "Mostrando tareas después de modificaciones:\n";
foreach ($tareas as $tarea) {
    $tarea->mostrarTarea();
    echo "\n";
}

?>
