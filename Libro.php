<?php
class Libro {
    public $titulo;
    public $autor;
    public $Npaginas;

    //Metodo para leer la informacion del libro
    public function mostrarinfo(){
        echo "Título: " . $this->titulo . "\n";
        echo "Autor: " . $this->autor . "\n";
        echo "Número de Páginas: " . $this->Npaginas . "\n";
    }
}
    //Objeto basado en libro

$miLibro = new Libro;
$miLibro->titulo="Harry Potter";
$miLibro->autor="J.K.Rowling";
$miLibro->Npaginas="438";

//Metodo
$miLibro->mostrarinfo();
?>
