package Cine;
import java.sql.*;
public class Conexion {
	
 public static void mostrarPeliculas() {
 
 try {
	 Connection miConexion=DriverManager.getConnection("jdbc:mysql://localhost:3306/Cine_Peliculas", "root","curso");
	 
 //2. CREAR OBJETO STATMENT
	 Statement miStatetement =miConexion.createStatement();
	 
     String CONSULTA = "SELECT p.idpelicula, p.nombre_pelicula, p.director, p.fecha_estreno, g.nombre AS genero " +
             "FROM Peliculas p " +
             "JOIN generos g ON p.id_genero = g.id_genero";
	//3. EJECUTAR SQL 
	 ResultSet miResultset =miStatetement.executeQuery(CONSULTA);
	 
 //4.RECORRER EL RESULTSET
	 while(miResultset.next()) {
		 
		 System.out.println(
         miResultset.getString("idpelicula") + " - " +
         miResultset.getString("nombre_pelicula") + " - " +
         miResultset.getString("director") + " - " +
         miResultset.getString("fecha_estreno") + " - " +
         miResultset.getString("genero")
     );
 }
		 
	 
 }catch(Exception e) {
	 
	 System.out.println("No conecta!!!!");
 }
 }
 }
