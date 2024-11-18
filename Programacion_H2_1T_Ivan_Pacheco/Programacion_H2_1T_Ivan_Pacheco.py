# Diccionarios y listas para almacenar clientes, productos y pedidos
Clientes = {}
Productos = [
    {"Nombre": "Teclado", "Precio": 50},
    {"Nombre": "Ratón", "Precio": 30},
    {"Nombre": "Monitor", "Precio": 95},
    {"Nombre": "PlayStation 5", "Precio": 350},
    {"Nombre": "Mando PS5", "Precio": 70}
]
Pedidos = {}

# Función para registrar un cliente
def Cliente_Registro():
    print("¡Bienvenido!, Regístrate para poder hacer compras")
    # Solicita la información del cliente (Nombre, País, Dirección, Correo, ID)
    Nombre = input("Nombre: ")
    Pais = input("País: ")
    Direccion = input("Dirección: ")
    Correo = input("Correo: ")
    ID = int(input("ID: "))

    # Verifica si el ID ya está registrado
    if ID in Clientes:
        print("Esta ID ya está registrada, inserte una nueva.")
        return

    # Si no está registrado, se agrega al diccionario Clientes
    Clientes[ID] = {
        "Nombre": Nombre,
        "Pais": Pais,
        "Direccion": Direccion,
        "Correo": Correo,
        "ID": ID
    }
    print(f"Cliente {Nombre} registrado.")

# Función para realizar una compra
def compra():
    print("Obtener productos")
    ID = int(input("Ingrese el ID del cliente: "))
    
    # Verifica si el cliente existe
    if ID not in Clientes:
        print("Usuario no encontrado.")
        return
    
    # Muestra los productos disponibles con su precio
    print("Productos disponibles:")
    for i, producto in enumerate(Productos, start=1):
        print(f"{i}. {producto['Nombre']} - {producto['Precio']}€")

    Comprados = []  # Lista para almacenar los productos comprados
    while True:
        # Solicita la selección de productos por número
        Seleccion = int(input("Selecciona el número del producto que desees, pulsa 11 para salir: "))
        if Seleccion == 11:
            break  # Sale del bucle si se elige '11'
        elif 1 <= Seleccion <= len(Productos):
            # Agrega el producto seleccionado a la lista de compras
            Comprados.append(Productos[Seleccion - 1])
            print(f"{Productos[Seleccion - 1]['Nombre']} añadido a la compra.")
        else:
            print("Número erróneo, intente nuevamente.")
    
    # Si no se compró nada, termina la función
    if not Comprados:
        print("No se realizó ninguna compra.")
        return
    
    # Calcula el total de la compra
    total = sum(producto["Precio"] for producto in Comprados)
    
    # Genera un ID único para el pedido
    ID_Pedido = len(Pedidos) + 1

    # Registra el pedido en el diccionario Pedidos
    Pedidos[ID_Pedido] = {
        "Cliente": Clientes[ID],
        "Productos": Comprados,
        "Total": total
    }

    # Muestra un mensaje con la confirmación de la compra
    print(f"¡Compra completada! ID del pedido: {ID_Pedido}. Total: {total}€.")

# Función para realizar seguimiento de un pedido
def seguimiento():
    ID_Pedido = int(input("Ingrese el ID de su pedido para realizar el seguimiento: "))
    
    # Verifica si el pedido existe
    if ID_Pedido not in Pedidos:
        print("Pedido no encontrado.")
        return

    pedido = Pedidos[ID_Pedido]
    Cliente = pedido["Cliente"]
    productos = pedido["Productos"]
    total = pedido["Total"]

    # Muestra la información del cliente y productos del pedido
    print(f"Cliente: {Cliente['Nombre']}")
    print(f"Dirección: {Cliente['Direccion']}")
    print(f"Correo: {Cliente['Correo']}")
    print("Productos en la compra:")
    for producto in productos:
        print(f"- {producto['Nombre']} - {producto['Precio']}€")
    print(f"Valor de la compra: {total}€")

# Función para visualizar los clientes registrados
def visualizar():
    if not Clientes:
        print("No hay ningún cliente registrado.")
        return
    
    # Muestra todos los clientes registrados
    print("Clientes actuales registrados:")
    for ID, Cliente in Clientes.items():
        print(f"ID: {ID} | Nombre: {Cliente['Nombre']} | Correo: {Cliente['Correo']} | País: {Cliente['Pais']} | Dirección: {Cliente['Direccion']}")
    
    # Opción para buscar un cliente específico
    buscar = input("¿Quieres buscar a algún cliente en específico? (si/no): ")
    if buscar == "si":
        ID_Buscar = int(input("Ingrese el ID del cliente: "))
        if ID_Buscar in Clientes:
            Cliente = Clientes[ID_Buscar]
            print(f"Cliente encontrado: ID: {Cliente['ID']} | Nombre: {Cliente['Nombre']} | Correo: {Cliente['Correo']} | País: {Cliente['Pais']} | Dirección: {Cliente['Direccion']}")
        else:
            print("Cliente inexistente.")

# Función principal para el menú de la aplicación
def menu():
    print("Ivan Pacheco")
    while True:
        print("\n--- Menú ---")
        print("1. Registrar cliente")
        print("2. Realizar compra")
        print("3. Seguimiento de pedido")
        print("4. Visualizar clientes")
        print("5. Salir")
        
        opcion = input("Selecciona una opción: ")

        if opcion == "1":
            Cliente_Registro()  # Llama a la función para registrar un cliente
        elif opcion == "2":
            compra()  # Llama a la función para realizar una compra
        elif opcion == "3":
            seguimiento()  # Llama a la función para hacer seguimiento de un pedido
        elif opcion == "4":
            visualizar()  # Llama a la función para visualizar clientes registrados
        elif opcion == "5":
            print("¡Hasta luego!")  # Mensaje de despedida
            break  # Sale del bucle y termina el programa
        else:
            print("Opción inválida. Intente de nuevo.")

# Ejecuta el menú principal para interactuar con la aplicación
menu()