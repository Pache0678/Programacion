package Cine;

import java.util.Scanner;

public class Menu {

    public static void main(String[] args) {

        Scanner scanner = new Scanner(System.in); // Lectura de entrada
        int opcion;

        do {
            // Menú principal
            System.out.println("\n=== MENÚ ===");
            System.out.println("Pulsa 1 – Ver películas");
            System.out.println("Pulsa 2– Añadir películas");
            System.out.println("Pulsa 3– Eliminar películas");
            System.out.println("Pulsa 4– Editar películas");
            System.out.println("Pulsa 5 – Salir");
            System.out.print("Seleccione una opción: ");

            opcion = scanner.nextInt();
            scanner.nextLine(); 

            switch (opcion) {
                case 1:
                    Conexion.mostrarPeliculas(); // Mostrar lista de películas
                    break;

                case 2:
                    anadir.anadirPelicula(); // Añadir películas
                    break;
                    
                case 3:
                	Eliminar.eliminarPelicula(); // Eliminar películas
                	break;
                case 4:
                	Editar.editarPelicula(); // Editar películas
                	break;
                case 5:
                    System.out.println("Saliendo"); // Cierre del programa
                    break;
            }

        } while (opcion != 5); 

        scanner.close(); // Cierra el scanner
    }
}
