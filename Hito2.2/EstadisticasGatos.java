package Animales;

import java.util.ArrayList;

public class EstadisticasGatos {
    private ArrayList<Animal> animales;

    // Constructor que recibe la lista de animales
    public EstadisticasGatos(ArrayList<Animal> animales) {
        this.animales = animales;
    }

    // Método para mostrar estadísticas de gatos
    public static void mostrarEstadisticas() {
        int totalGatos = 0;
        int gatosConTestLeucemia = 0;

        for (Animal a : animales) {
            if (a instanceof Gato) { 
                totalGatos++;
                Gato gato = (Gato) a; 
                if (gato.testLeucemia()) { 
                    gatosConTestLeucemia++;
                }
            }
        }

        System.out.println("Estadísticas de gatos:");
        System.out.println("Número total de gatos: " + totalGatos);
        System.out.println("Número de gatos con test de leucemia: " + gatosConTestLeucemia);
    }
}