package Animales;

import java.util.ArrayList;
import java.util.Scanner;

public class Baja {
    private ArrayList<Animal> animales;
    private Scanner scanner = new Scanner(System.in);

    // Constructor que recibe la lista de animales
    public Baja(ArrayList<Animal> animales) {
        this.animales = animales;
    }

    // Método para dar de baja un animal
    public void darDeBaja() {
        System.out.print("Ingrese el número de chip del animal a dar de baja: ");
        String input = scanner.nextLine();

        int chip = Integer.parseInt(input);
        Animal animalABorrar = null;

        // Buscar el animal por número de chip
        for (Animal a : animales) {
            if (a.numerochip == chip) {
                animalABorrar = a;
                break;
            }
        }

        if (animalABorrar == null) {
            System.out.println("No se encontró ningún animal con el chip " + chip);
            return;
        }

        // Eliminar el animal de la lista
        animales.remove(animalABorrar);
        System.out.println("El animal con el chip " + chip + " ha sido dado de baja.");
    }
}