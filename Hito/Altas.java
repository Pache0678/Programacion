package Animales;

import java.util.ArrayList;
import java.util.Scanner;


public class Altas {
    private ArrayList<String> tareas = new ArrayList<>();
    private Scanner scanner = new Scanner(System.in);
    public void registrarAnimales() { 
    while (true) {
        System.out.print("Ingrese número de chip (o 'salir' para terminar): ");
        String chip = scanner.nextLine();
        
        boolean existe = false;
        for (String c : tareas) {
            if (c.equals(chip)) {
                existe = true;
                break;
            }
        }
        
        if (existe) {
            System.out.println("El chip ya está registrado.");
            continue;
        }
        
        System.out.print("pon el nombre del animal: ");
        String nombre = scanner.nextLine();
        
        tareas.add(chip);
        System.out.println("Animal registrado: Chip " + chip + " - " + nombre);
    }
}
}
