package Cine;

import java.util.Scanner;

public class Menu {

    public static void main(String[] args) {

        Scanner scanner = new Scanner(System.in);
        int opcion;

        do {
            System.out.println("\n=== MENÚ ===");
            System.out.println("1 – Ver películas");
            System.out.println("2 – Salir");
            System.out.print("Seleccione una opción: ");

            opcion = scanner.nextInt();
            scanner.nextLine(); 

            switch (opcion) {
                case 1:
                    Conexion.mostrarPeliculas();
                    break;
                case 2:
                    System.out.println("Saliendo");
                    break;
            }

        } while (opcion != 2);

        scanner.close();
    }
}
