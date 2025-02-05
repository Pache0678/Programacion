<?php


class Personaje {
    private $nombre;
    private $nivel;
    private $puntosVida;
    private $puntosAtaque;


    public function __construct($nombre, $nivel, $puntosVida, $puntosAtaque) {
        $this->nombre = $nombre;
        $this->nivel = $nivel;
        $this->puntosVida = $puntosVida;
        $this->puntosAtaque = $puntosAtaque;
    }


    public function atacar(Personaje $objetivo) {
        echo "{$this->nombre} ataca a {$objetivo->nombre} causando {$this->puntosAtaque} puntos de daño.\n";
        $objetivo->recibirAtaque($this->puntosAtaque);
    }


    public function recibirAtaque($danio) {
        $this->puntosVida -= $danio;
        if ($this->puntosVida < 0) {
            $this->puntosVida = 0;
        }
        echo "{$this->nombre} tiene {$this->puntosVida} puntos de vida restantes.\n";
    }


    public function curarse() {
        $curacion = 20;
        $this->puntosVida += $curacion;
        echo "{$this->nombre} se ha curado, restaurando {$curacion} puntos de vida. Ahora tiene {$this->puntosVida} puntos de vida.\n";
    }


    public function subirNivel() {
        $this->nivel++;
        $this->puntosVida += 10;  // Incrementa 10 puntos de vida
        $this->puntosAtaque += 5; // Incrementa 5 puntos de ataque
        echo "{$this->nombre} ha subido al nivel {$this->nivel}! Ahora tiene {$this->puntosVida} puntos de vida y {$this->puntosAtaque} puntos de ataque.\n";
    }

 
    public function mostrarDetalles() {
        echo "Nombre: {$this->nombre}\n";
        echo "Nivel: {$this->nivel}\n";
        echo "Puntos de Vida: {$this->puntosVida}\n";
        echo "Puntos de Ataque: {$this->puntosAtaque}\n";
    }
}


$personaje1 = new Personaje("Guerrero", 1, 100, 15);
$personaje2 = new Personaje("Mago", 1, 80, 12);


echo "Detalles del personaje 1 (Guerrero):\n";
$personaje1->mostrarDetalles();
echo "\n";
echo "Detalles del personaje 2 (Mago):\n";
$personaje2->mostrarDetalles();
echo "\n";

echo "¡Comienza la batalla!\n\n";

$personaje1->atacar($personaje2);

$personaje2->curarse();

$personaje2->atacar($personaje1);

$personaje1->subirNivel();

$personaje2->atacar($personaje1);

echo "\nEstado final de los personajes:\n";
$personaje1->mostrarDetalles();
echo "\n";
$personaje2->mostrarDetalles();

?>
