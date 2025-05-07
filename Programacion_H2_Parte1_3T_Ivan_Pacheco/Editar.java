package Cine;

import java.sql.*;
import java.util.Scanner;
public class Editar{
public static void editarPelicula() {
    String url = "jdbc:mysql://localhost:3306/Cine_Peliculas";
    String usuario = "root";
    String contraseña = "curso"; 

    Scanner scanner = new Scanner(System.in);
    

    try (Connection conexion = DriverManager.getConnection(url, usuario, contraseña)) {

        System.out.print("Ingrese el ID de la película a editar: ");
        int id = scanner.nextInt();
        scanner.nextLine(); 

        // Verificar si existe
        String consulta = "SELECT COUNT(*) FROM Peliculas WHERE idpelicula = ?";
        try (PreparedStatement checkStmt = conexion.prepareStatement(consulta)) {
            checkStmt.setInt(1, id);
            ResultSet rs = checkStmt.executeQuery();
            rs.next();
            if (rs.getInt(1) == 0) {
                System.out.println(" No existe una película con ese ID.");
                return;
            }
        }

        // Pedir nuevos datos
        System.out.print("Nuevo nombre de la película: ");
        String nombre = scanner.nextLine();

        System.out.print("Nuevo director: ");
        String director = scanner.nextLine();

        System.out.print("Nueva fecha de estreno (YYYY-MM-DD): ");
        String fecha = scanner.nextLine();

        System.out.print("Nuevo ID del género: ");
        int idGenero = scanner.nextInt();
        scanner.nextLine(); // limpiar buffer

        // Actualizar película
        String updateSQL = "UPDATE Peliculas SET nombre_pelicula = ?, director = ?, fecha_estreno = ?, id_genero = ? WHERE idpelicula = ?";
        try (PreparedStatement updateStmt = conexion.prepareStatement(updateSQL)) {
            updateStmt.setString(1, nombre);
            updateStmt.setString(2, director);
            updateStmt.setString(3, fecha);
            updateStmt.setInt(4, idGenero);
            updateStmt.setInt(5, id);

            int filas = updateStmt.executeUpdate();
            if (filas > 0) {
                System.out.println("Película actualizada correctamente.");
            } else {
                System.out.println("No se pudo actualizar la película.");
            }
        }

    } catch (SQLException e) {
        System.out.println("Error en la base de datos: " + e.getMessage());
    }

}
}

