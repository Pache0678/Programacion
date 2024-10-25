print("***Ivan Pacheco Perez")
print("***Ejecución iniciada***")

# Solicitar el saldo inicial
while True:
    Saldo = float(input("Inserte su saldo correspondiente: "))
    # Validar que el saldo sea no negativo
    if Saldo < 0:
        print("Introduce un saldo válido")
    else:
        # Si el saldo es válido, mostrar las opciones de operación
        print("1-ingresar dinero, 2-retirar dinero, 3-mostrar saldo, 4-salir, 5-Estadísticas")
        break  # Salir del bucle de ingreso de saldo

# Inicializar contadores para el historial de operaciones
Historialn = 0  # Historial de retiradas
Historialp = 0  # Historial de ingresos

# Bucle principal para realizar operaciones
while True:
    Movimiento = int(input("Escribe el número de la función que desea realizar: "))
    match Movimiento:
        case 1:  # Opción para ingresar dinero
            Ingreso = float(input("Deposite dinero: "))
            if Ingreso <= 0:
                print("No se puede ingresar una cantidad negativa")
                print("1-ingresar dinero, 2-retirar dinero, 3-mostrar saldo, 4-salir, 5-Estadísticas")
            else:
                Saldo += Ingreso  # Sumar ingreso al saldo
                print(f"Nuevo saldo: {Saldo}€")
                print("1-ingresar dinero, 2-retirar dinero, 3-mostrar saldo, 4-salir, 5-Estadísticas")
                Historialp += 1  # Incrementar contador de ingresos
        case 2:  # Opción para retirar dinero
            Retiro = float(input("Marca el saldo a retirar: "))
            if Retiro > Saldo:
                print("No tienes suficiente saldo.")
                print("1-ingresar dinero, 2-retirar dinero, 3-mostrar saldo, 4-salir, 5-Estadísticas")
            else:
                Saldo -= Retiro  # Restar retiro del saldo
                print(f"Nuevo saldo: {Saldo}€")
                print("1-ingresar dinero, 2-retirar dinero, 3-mostrar saldo, 4-salir, 5-Estadísticas")
                Historialn += 1  # Incrementar contador de retiradas
        case 3:  # Opción para mostrar el saldo
            print(f"Este es su saldo: {Saldo}€")
            print("1-ingresar dinero, 2-retirar dinero, 3-mostrar saldo, 4-salir, 5-Estadísticas")
        case 4:  # Opción para salir
            print("Adiós, buen día.")
            print("***Ejecución finalizada***")
            break  # Salir del bucle
        case 5:  # Opción para mostrar estadísticas
            print(f"Se han efectuado {Historialp} ingresos")
            print(f"Se han efectuado {Historialn} retiradas")
        case _:  # Opción inválida
            print("Opción inválida, por favor elige nuevamente.")