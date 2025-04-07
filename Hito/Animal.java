package Animales;

public abstract class Animal {
	
	int numerochip;
	String nombre;
	int edad;
	String raza;
	boolean adoptado;
	
	
public Animal(int numerochip, String nombre,int edad, String raza, boolean adoptado) {
	this.numerochip = numerochip;
	this.nombre = nombre;
	this.edad = edad;
	this.raza = raza;
	this.adoptado = adoptado;
}
public abstract void mostrar();
}
