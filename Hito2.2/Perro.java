package Animales;

public class Perro extends Animal {
	
	private String Tamano;
    // Constructor que incluye atributos de Animal más los específicos de Perro
	public Perro(int numerochip, String nombre,int edad, String raza, boolean adoptado, String Tamano) {
	super(numerochip,nombre,edad,raza, adoptado);
	this.Tamano= Tamano;
	}
	
    // Implementación específica del método mostrar() para perros

    @Override
public void mostrar() {
	System.out.println("Perro- Nombre" + nombre + ",Chip"+ numerochip + ",edad"+ edad +",raza" + raza + "Tamaño" + Tamano + "Estado"+ adoptado);
}
}





