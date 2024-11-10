import mysql.connector

# Establecer conexión con la base de datos
conexion = mysql.connector.connect(
    host="localhost",       # Dirección del servidor (localhost para base de datos local)
    user="root",            # Usuario de la base de datos
    password="curso",       # Contraseña del usuario
    database="supermercado" # Nombre de la base de datos
)
cursor = conexion.cursor()
menu=int(input("Elige el menu 1 para categoria y 2 para productos"))

while menu == 1:
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


while menu==2:
    print("=== Gestión de productos===")
    print("Seleccione una opción:")
    print("1. Crear nuevo producto") 
    print("2. Leer productos existentes")
    print("3. Actualiza un producto")
    print("4. Eliminar un producto")
    print("5. Salir")

    Eleccion=int(input("Escribe el numero de la opción que deseas realizar"))

    if Eleccion == 1:
        idproducto = int(input("Introduce el ID del producto: "))
        nombre_producto= input("Introduce el nombre del producto : ")
        idcategoria = int(input("Introduce el ID de la categoría: "))
        medida= float(input("Introduce la medida asignada"))
        precio =float(input("Introduce el precio asignado "))
        stock= int(input("Introduce el stock asignado "))
        sql = "INSERT INTO producto (idproducto, nombre, idcategoria,medida,precio,stock) VALUES (%s, %s, %s, %s, %s, %s)"
        valores = (idproducto,nombre_producto, idcategoria,medida, precio, stock)
        cursor.execute(sql, valores)
        conexion.commit()  # Confirmar los cambios en la base de datos
        print(f"La categoria con ID {nombre_producto} ha sido creada con exito")

    elif Eleccion ==2:
        sql = "SELECT * FROM producto"
        cursor.execute(sql)
        productos = cursor.fetchall()  
        print("Listado de productos:")
        for producto in productos:
            print(f"ID Producto: {producto[0]}, Nombre: {producto[1]}, ID Categoría: {producto[2]}, Medida: {producto[3]}, Precio: {producto[4]}, Stock: {producto[5]}")

    elif Eleccion ==3:
        idproducto = int(input("Introduce el ID de la categoría a modificar: "))
        nuevo_precio = int(input("Introduce el nuevo precio del producto: "))

        sql = "UPDATE producto SET precio= %s WHERE idproducto= %s"
        valores = (nuevo_precio, idproducto)


        cursor.execute(sql, valores)
        conexion.commit()  
        
        print(f"La categoria con ID {idproducto} ha sido cambiada a {nuevo_precio}")

    elif Eleccion == 4:
        idproducto = int(input("Introduce el ID del producto que deseas eliminar: "))

        sql = "DELETE FROM producto WHERE idproducto = %s"
        valores = (idproducto,)

        cursor.execute(sql, valores)
        conexion.commit()  
        print(f"La categoria con ID {idproducto} ha sido eliminada")
        
    elif Eleccion == 5:
        print("Saliendo de la gestión de productos. ¡Hasta pronto!")
        break




cursor.close()
conexion.close()
