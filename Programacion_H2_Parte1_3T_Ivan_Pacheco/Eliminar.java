package Cine;

import java.sql.*;
import java.util.Scanner;

public class Eliminar {

    public static void eliminarPelicula() {
        String url = "jdbc:mysql://localhost:3306/Cine_Peliculas";
        String usuario = "root";
        String contraseña = "curso"; 

        Scanner scanner = new Scanner(System.in);

        try (Connection conexion = DriverManager.getConnection(url, usuario, contraseña)) {

            System.out.print("ID de la película: ");
            int id = scanner.nextInt();
            scanner.nextLine(); 

            // Verificar si ya existe el ID
            String consultaExistencia = "SELECT COUNT(*) FROM Peliculas WHERE idpelicula = ?";
            try (PreparedStatement checkStmt = conexion.prepareStatement(consultaExistencia)) {
                checkStmt.setInt(1, id);
                ResultSet rs = checkStmt.executeQuery();
                rs.next();
                if (rs.getInt(1) == 0) {
                    System.out.println("No se puede eliminar una pelicula inexistente.");
                    return;
                }
            }

            // Eliminar película
            String eliminar = "DELETE FROM Peliculas WHERE idpelicula = ?";
            try (PreparedStatement deleteStmt = conexion.prepareStatement(eliminar)) {
                deleteStmt.setInt(1, id);
                int filas = deleteStmt.executeUpdate();
                if (filas > 0) {
                    System.out.println("Película eliminada .");
                } else {
                    System.out.println("No se ha podido eliminar la película.");
                }
            }

        } catch (SQLException e) {
            System.out.println("Error en la base de datos: " + e.getMessage());
        }
    }
}
    