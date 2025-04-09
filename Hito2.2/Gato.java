package Animales;

public class Gato extends Animal {
	
	private boolean testLeucemia;
	
	public Gato(int numerochip, String nombre,int edad, String raza, boolean adoptado, boolean testLeucemia) {
	super(numerochip,nombre,edad,raza, adoptado);
	this.testLeucemia= testLeucemia;
	}
    @Override
public void mostrar() {
	System.out.println("Perro- Nombre" + nombre + ",Chip"+ numerochip + ",edad"+ edad +",raza" + raza + "test de Leucemia" + testLeucemia + "Estado");
}
	public boolean testLeucemia() {
		return false;
	}
}