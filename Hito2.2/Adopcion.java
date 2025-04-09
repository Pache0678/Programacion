package Animales;

import java.util.ArrayList;
import java.util.Scanner;

public class Adopcion {
    private ArrayList<Animal> animales;
    private Scanner scanner = new Scanner(System.in);
    
    // Constructor que recibe la lista de animales
    public Adopcion(ArrayList<Animal> animales) {
        this.animales = animales;
    }

    // Método para realizar la adopción
    public void realizarAdopcion() {
        System.out.print("Ingrese el número de chip del animal a adoptar: ");
        String input = scanner.nextLine();



        int chip = Integer.parseInt(input);
        Animal animalAdoptado = null;

        // Buscar el animal por número de chip
        for (Animal a : animales) {
            if (a.numerochip == chip) {
                animalAdoptado = a;
                break;
            }
        }

        if (animalAdoptado == null) {
            System.out.println("No se encontró ningún animal " + chip);
            return;
        }

        if (animalAdoptado.adoptado) {
            System.out.println("El animal con el chip " + chip + "  ha sido adoptado.");
            return;
        }

        // Solicitar los datos de la persona que adopta
        System.out.print("Ingrese el nombre de la persona que adopta al animal: ");
        String nombrePersona = scanner.nextLine();

        // Marcar al animal como adoptado
        animalAdoptado.adoptado = true; // Cambiar el estado de adoptado
        System.out.println("El animal con el chip " + chip + " ha sido adoptado por " + nombrePersona + ".");
    }
}