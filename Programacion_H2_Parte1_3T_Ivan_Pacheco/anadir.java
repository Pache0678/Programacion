package Cine;

import java.sql.*;
import java.util.Scanner;

public class anadir {

    public static void anadirPelicula() {
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
                if (rs.getInt(1) > 0) {
                    System.out.println("Ya existe una película con ese ID. No se puede registrar.");
                    return;
                }
            }

            // Pedir el resto de datos
            System.out.print("\nNombre de la película: ");
            String nombre = scanner.nextLine();

            System.out.print("Director: ");
            String director = scanner.nextLine();

            System.out.print("Fecha de estreno (YYYY-MM-DD): ");
            String fecha = scanner.nextLine();

            System.out.print("ID del género: ");
            int idGenero = scanner.nextInt();
            scanner.nextLine(); // Limpiar buffer

            // Insertar la película
            String sql = "INSERT INTO Peliculas (idpelicula, nombre_pelicula, director, fecha_estreno, id_genero) VALUES (?, ?, ?, ?, ?)";
            try (PreparedStatement pstmt = conexion.prepareStatement(sql)) {
                pstmt.setInt(1, id);
                pstmt.setString(2, nombre);
                pstmt.setString(3, director);
                pstmt.setString(4, fecha);
                pstmt.setInt(5, idGenero);

                int filas = pstmt.executeUpdate();
                if (filas > 0) {
                    System.out.println("Película registrada correctamente.");
                } else {
                    System.out.println("No se pudo registrar la película.");
                }
            }

        } catch (SQLException e) {
            System.out.println("Error en la base de datos: " + e.getMessage());
        }

    }
}
