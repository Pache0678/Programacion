package Animales;

import java.util.ArrayList;
import java.util.Scanner;

public class Principal2 {
    public static void main(String[] args) {
        ArrayList<Animal> animales = new ArrayList<>();
        animales.add(new Perro(123, "TObby", 5, "Labrador", false, "Grande"));
        animales.add(new Gato(456, "Sombra", 3, "Siames", true, true));
        animales.add(new Perro(789, "Galletita", 4, "Bulldog", false, "Mediano"));

        Adopcion adopcion = new Adopcion(animales);
        Baja baja = new Baja(animales);
        EstadisticasGatos Estadisticas = new EstadisticasGatos(animales);
        Scanner scanner = new Scanner(System.in);

        while (true) {
            System.out.println("\n--- Menú Principal ---");
            System.out.println("1. Realizar adopción");
            System.out.println("2. Dar de baja un animal");
            System.out.println("3. Salir");
            System.out.print("Seleccione una opción: ");
            String opcion = scanner.nextLine();

            switch (opcion) {
                case "1":
                    adopcion.realizarAdopcion();
                    break;
                case "2":
                    baja.darDeBaja();
                    break;
                case "3":
                	EstadisticasGatos.mostrarEstadisticas();                    
                	break;
                case "4":
                    System.out.println("Saliendo del programa...");
                    return;
                default:
                    System.out.println("Opción no válida. Intente nuevamente.");
            }
        }
    }
}