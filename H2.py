print("***Ivan Pacheco***")
 # Inicializa los contadores de victorias
victorias_jugador = 0
victorias_maquina = 0

# Bucle que se ejecuta mientras ninguno de los dos haya ganado 3 partidas
while victorias_jugador < 3 and victorias_maquina < 3:
    print(f"Ronda actual: Jugador {victorias_jugador} - Máquina {victorias_maquina}") 
    print("***Ejecución iniciada***")
    
    # Instrucciones para que el jugador elija su movimiento
    print("Elige 1-Piedra | 2-Papel | 3-Tijera")
    
    # Importa la librería random para la máquina
    import random
    
    # Obtiene el movimiento del jugador
    movimiento = int(input())
    
    # Genera un movimiento aleatorio para la máquina
    rival = random.randint(1, 3)
    
    # Verifica que el movimiento del jugador sea válido
    if movimiento != 1 and movimiento != 2 and movimiento != 3:
        print("Introduce el número de nuevo")
    else:
        # Muestra la elección del jugador
        match movimiento:
            case 1:
                print("El jugador ha elegido piedra")
            case 2:
                print("El jugador ha elegido papel")
            case 3:
                print("El jugador ha elegido tijera")
            case _:
                print("Imposible")  

        # Muestra la elección de la máquina
        match rival:
            case 1:
                print("La máquina ha elegido piedra")
            case 2:
                print("La máquina ha elegido papel")
            case 3:
                print("La máquina ha elegido tijera")
            case _:
                print("Imposible")  # Esta línea no debería alcanzarse con la lógica

        # Determina el resultado de la ronda
        if movimiento == rival:
            print("¡Habéis empatado!")
            print("***Ejecución Finalizada***")
        elif movimiento == 1 and rival == 3:
            print("¡Has ganado!!!")
            print("***Ejecución Finalizada***")
            victorias_jugador += 1  # Incrementa victorias del jugador
        elif movimiento == 2 and rival == 1:
            print("¡Has ganado!!!")
            print("***Ejecución Finalizada***")
            victorias_jugador += 1  # Incrementa victorias del jugador
        elif movimiento == 3 and rival == 2:
            print("¡Has ganado!!!")
            print("***Ejecución Finalizada***")
            victorias_jugador += 1  # Incrementa victorias del jugador
        else:
            print("¡Has perdido!!!")
            victorias_maquina += 1  # Incrementa victorias de la máquina
            print("***Ejecución Finalizada***")

# Mensaje final según el resultado del juego
if victorias_jugador == 3:
    print("¡Felicidades! Has ganado el juego.")
else:
    print("La máquina ha ganado el juego. ¡Inténtalo de nuevo!")