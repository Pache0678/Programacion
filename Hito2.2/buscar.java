package Animales;

import java.util.ArrayList;
import java.util.Scanner;

public class buscar {
    private ArrayList<Animal> animales = new ArrayList<>();
    private Scanner scanner = new Scanner(System.in);

    // Método para registrar animales de ejemplo
    public void registrarAnimales() {
        animales.add(new Perro(123, "TObby", 5, "Labrador", false, "Grande"));
        animales.add(new Gato(456, "Sombra", 3, "Siames", true, true));
        animales.add(new Perro(789, "Galletita", 4, "Bulldog", false, "Mediano"));
    }

    // Método para buscar animales por número de chip
    public void buscarAnimales() {
        while (true) {
            System.out.print("Ingrese número de chip (o 'salir' para terminar): ");
            String input = scanner.nextLine();

            if (input.equalsIgnoreCase("salir")) {
                break;
            }

            int chip = Integer.parseInt(input);
            boolean encontrado = false;

            for (Animal a : animales) {
                if (a.numerochip == chip) { 
                    System.out.println("Animal encontrado:");
                    a.mostrar();
                    encontrado = true;
                    break;
                }
            }

            if (!encontrado) {
                System.out.println("No se encontró ningún animal con el chip " + chip);
            }
        }
    }
}