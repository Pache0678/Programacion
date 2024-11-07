import mysql.connector

# Establecer conexión con la base de datos
conexion = mysql.connector.connect(
    host="localhost",       # Dirección del servidor (localhost para base de datos local)
    user="root",            # Usuario de la base de datos
    password="curso",       # Contraseña del usuario
    database="supermercado" # Nombre de la base de datos
)
cursor = conexion.cursor()

while True:
    print("=== Gestión de Categorías ===")
    print("Seleccione una opción:")
    print("1. Crear nueva categoría") 
    print("2. Leer categorías existentes")
    print("3. Actualizar una categoría")
    print("4. Eliminar una categoría")
    print("5. Salir")

    Eleccion = int(input()) 

    if Eleccion == 1:
        # Solicitar datos al usuario
        idcategoria = int(input("Introduce el ID de la categoría: "))
        nombre_categoria = input("Introduce el nombre de la categoría: ")
        sql = "INSERT INTO categoria (idcategoria, categoria) VALUES (%s, %s)"
        valores = (idcategoria, nombre_categoria)
        cursor.execute(sql, valores)
        conexion.commit()  
        print(f"La categoria con ID {idcategoria} y nombre {nombre_categoria} ha sido creada con éxito")

    elif Eleccion == 2:
        sql = "SELECT * FROM categoria"
        cursor.execute(sql)
        categorias = cursor.fetchall()  

        print("Listado de Categorías:")
        for categoria in categorias:
            print(f"ID: {categoria[0]}, Nombre: {categoria[1]}")

    elif Eleccion == 3:
        idcategoria = int(input("Introduce el ID de la categoría a modificar: "))
        nuevo_nombre = input("Introduce el nuevo nombre de la categoría: ")
        sql = "UPDATE categoria SET categoria = %s WHERE idcategoria = %s"
        valores = (nuevo_nombre, idcategoria)
        cursor.execute(sql, valores)
        conexion.commit()  
        print(f"La categoria con ID {idcategoria} ha sido cambiada a {nuevo_nombre}")

    elif Eleccion == 4:
        idcategoria = int(input("Introduce el ID de la categoría que deseas eliminar: "))
        sql = "DELETE FROM categoria WHERE idcategoria = %s"
        valores = (idcategoria,)
        cursor.execute(sql, valores)
        conexion.commit()  
        print(f"La categoria con ID {idcategoria} ha sido eliminada")

    elif Eleccion == 5:
        print("Saliendo de la gestión de categorías. ¡Hasta pronto!")
        break

cursor.close()
conexion.close()
