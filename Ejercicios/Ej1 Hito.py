print("Iván Pacheco Perez") 
print("*** Ejecución iniciada ***") #Simulación de inicio 
# Mostrar el menú de opciones
print("Menú")
print("1 - Cuadrado")
print("2 - Rectángulo")
print("3 - Salir")

# Bucle principal del programa
while True:
    # Solicitar al usuario que ingrese una opción
    numero = int(input("Dime una opción: "))
    
    # Validar si la opción ingresada es incorrecta
    if numero != 1 and numero != 2 and numero != 3:
        print("Opción incorrecta.")
    
    # Opción para calcular el área y perímetro del cuadrado
    elif numero == 1:
        Ladoc = int(input("Dime el lado del cuadrado: "))  # Ingresar el lado del cuadrado
        A = Ladoc * Ladoc  # Calcular el área
        P = Ladoc * 4  # Calcular el perímetro
        
        # Dibujar el cuadrado usando #
        for i in range(Ladoc):
            for J in range(Ladoc):
                print("#", end="")  # Imprimir el carácter #
            print()  # Nueva línea después de cada fila
        
        # Mostrar resultados
        print(f"Su área es: {A}")
        print(f"Su perímetro es: {P}")
        
        # Volver a mostrar el menú
        print("Menú")
        print("1 - Cuadrado")
        print("2 - Rectángulo")
        print("3 - Salir")
    
    # Opción para calcular el área y perímetro del rectángulo
    elif numero == 2:
        Base = int(input("Dime la base del rectángulo: "))  # Ingresar la base del rectángulo
        Altura = int(input("Dime la altura del rectángulo: "))  # Ingresar la altura
        
        Ar = Base * Altura  # Calcular el área
        Pr = (Base * 2) + (Altura * 2)  # Calcular el perímetro
        
        # Dibujar el rectángulo usando #
        for r in range(Altura):
            for e in range(Base):
                print("#", end="")  # Imprimir el carácter #
            print()  # Nueva línea después de cada fila
        
        # Mostrar resultados
        print(f"Su área es: {Ar}")
        print(f"Su perímetro es: {Pr}")
        
        # Volver a mostrar el menú
        print("Menú")
        print("1 - Cuadrado")
        print("2 - Rectángulo")
        print("3 - Salir")
    
    # Salir del programa
    elif numero == 3:
        print("Saliendo del programa. ¡Adiós!")  # Mensaje de despedida
        break  # Termina el bucle