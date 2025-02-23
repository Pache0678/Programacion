<?php
class Usuario {
    protected $nombre;
    protected $email;

    public function __construct($nombre, $email) {
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function mostrarInfo() {
        echo "Nombre: " . $this->nombre . "\n";
        echo "Email: " . $this->email . "\n";
    }
}

class Administrador extends Usuario {
    private $nivelAcceso;

    public function __construct($nombre, $email, $nivelAcceso) {
        parent::__construct($nombre, $email);
        $this->nivelAcceso = $nivelAcceso;
    }

    public function mostrarInfo() {
        parent::mostrarInfo();
        echo "Nivel de Acceso: " . $this->nivelAcceso . "\n";
    }
}

$usuario = new Usuario("Carlos Lopez", "carlos@example.com");
$usuario->mostrarInfo();

$admin = new Administrador("Ana Gomez", "ana@example.com", "SuperAdmin");
$admin->mostrarInfo();
?>