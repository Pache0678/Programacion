<?php
class Persona {
    private $nombre;
    private $edad;
    private $genero;

    public function __construct($nombre, $edad, $genero) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->genero = $genero;
    }

    public function presentar() {
        echo "Hola, mi nombre es $this->nombre, tengo $this->edad años y soy $this->genero." . PHP_EOL;
    }
}

// Crear una instancia de Persona
echo "Ingrese su nombre: ";
$nombre = trim(fgets(STDIN));

echo "Ingrese su edad: ";
$edad = trim(fgets(STDIN));
$edad = is_numeric($edad) ? (int)$edad : 0;

echo "Ingrese su género: ";
$genero = trim(fgets(STDIN));

$persona = new Persona($nombre, $edad, $genero);
$persona->presentar();
?>