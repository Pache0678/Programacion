import mysql.connector

# Establecer conexión con la base de datos
conexion = mysql.connector.connect(
    host="localhost",       # Dirección del servidor (localhost para base de datos local)
    user="root",            # Usuario de la base de datos
    password="curso",       # Contraseña del usuario
    database="supermercado" # Nombre de la base de datos
)
cursor = conexion.cursor()
menu=int(input("Elige el menu 1 para categoria, 2 para productos y 3 para clientes"))

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
    print("1. Crear nuevo {cliente") 
    print("2. Leer productos existentes")
    print("3. Actualiza un {cliente")
    print("4. Eliminar un {cliente")
    print("5. Salir")

    Eleccion=int(input("Escribe el numero de la opción que deseas realizar"))

    if Eleccion == 1:
        idproducto = int(input("Introduce el ID del {cliente: "))
        nombre_producto= input("Introduce el nombre del {cliente : ")
        idcategoria = int(input("Introduce el ID de la categoría: "))
        medida= float(input("Introduce la medida asignada"))
        precio =float(input("Introduce el precio asignado "))
        stock= int(input("Introduce el stock asignado "))
        sql = "INSERT INTO {cliente (idproducto, nombre, idcategoria,medida,precio,stock) VALUES (%s, %s, %s, %s, %s, %s)"
        valores = (idproducto,nombre_producto, idcategoria,medida, precio, stock)
        cursor.execute(sql, valores)
        conexion.commit()  # Confirmar los cambios en la base de datos
        print(f"La categoria con ID {nombre_producto} ha sido creada con exito")

    elif Eleccion ==2:
        sql = "SELECT * FROM {cliente"
        cursor.execute(sql)
        productos = cursor.fetchall()  
        print("Listado de productos:")
        for cliente in productos:
            print(f"ID Producto:  {cliente[0]}, Nombre:  {cliente[1]}, ID Categoría:  {cliente[2]}, Medida:  {cliente[3]}, Precio:  {cliente[4]}, Stock:  {cliente[5]}")

    elif Eleccion ==3:
        idproducto = int(input("Introduce el ID de la categoría a modificar: "))
        nuevo_precio = int(input("Introduce el nuevo precio del {cliente: "))

        sql = "UPDATE {cliente SET precio= %s WHERE idproducto= %s"
        valores = (nuevo_precio, idproducto)


        cursor.execute(sql, valores)
        conexion.commit()  
        
        print(f"La categoria con ID {idproducto} ha sido cambiada a {nuevo_precio}")

    elif Eleccion == 4:
        idproducto = int(input("Introduce el ID del {cliente que deseas eliminar: "))

        sql = "DELETE FROM {cliente WHERE idproducto = %s"
        valores = (idproducto,)

        cursor.execute(sql, valores)
        conexion.commit()  
        print(f"La categoria con ID {idproducto} ha sido eliminada")
        
    elif Eleccion == 5:
        print("Saliendo de la gestión de productos. ¡Hasta pronto!")
        break


while menu ==3:
    print("=== Gestión de clientes===")
    print("Seleccione una opción:")
    print("1. Crear nuevo cliente") 
    print("2. Leer clientes existentes")
    print("3. Actualiza un cliente")
    print("4. Eliminar un cliente")
    print("5. Salir")

    Eleccion=int(input("Escribe el numero de la opción que deseas realizar"))
    if Eleccion == 1:
        idcliente = int(input("Introduce el ID del Cliente: "))
        cia= input("Introduce la cia : ")
        contacto = input("Introduce el contacto: ")
        cargo= input("Introduce el cargo asignado")
        direccion =input("Introduce la direccion asignada ")
        ciudad= (input("Introduce la Ciudad asignada "))
        region=input("Introduce la region asignada ")
        cp= int(input("Introduce el cp "))
        pais= input("Introduce el pais ")
        tlf= int(input("Introduce el telefono "))
        fax= int(input("Introduce el fax "))

        sql = "INSERT INTO  cliente (idcliente, cia, contacto,cargo,direccion,ciudad, region, cp, pais, tlf, fax) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s,%s)"
        valores = (idcliente,cia, contacto,cargo, direccion, ciudad, region, cp, pais, tlf, fax)

        cursor.execute(sql, valores)
        conexion.commit()  
        print(f"EL cliente con ID {idcliente} ha sido creada con exito")

    elif Eleccion == 2 :
        sql = "SELECT * FROM cliente"

        cursor.execute(sql)
        clientes = cursor.fetchall()  

        print("Listado de productos:")
        for cliente in clientes:
            print(f"ID Cliente: {cliente[0]}, Compañía: {cliente[1]}, Contacto: {cliente[2]}, Cargo: {cliente[3]}, Dirección: {cliente[4]}, Ciudad: {cliente[5]}, Región: {cliente[6]}, CP: {cliente[7]}, País: {cliente[8]}, Teléfono: {cliente[9]}, Fax:  {cliente[10]}")

    elif Eleccion == 3 :
        idcliente = input("Introduce el ID del cliente a modificar: ")
        nuevo_contacto = input("Introduce el nuevo contacto : ")

        sql = "UPDATE cliente SET contacto= %s WHERE idcliente= %s"
        valores = (nuevo_contacto, idcliente)

        cursor.execute(sql, valores)
        conexion.commit()  
        
        print(f"La categoria con ID {idcliente} ha sido cambiada a {nuevo_contacto}")
    
    elif Eleccion ==4: 
        idcliente = input("Introduce el ID del cliente que deseas eliminar: ")

        sql = "DELETE FROM cliente WHERE idcliente = %s"
        valores = (idcliente,)


        cursor.execute(sql, valores)
        conexion.commit()  
        print(f"La categoria con ID {idcliente} ha sido eliminada")

    elif Eleccion == 5:
        print("Saliendo de la gestión de clientes. ¡Hasta pronto!")
        break



cursor.close()
conexion.close()
