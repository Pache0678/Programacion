CREATE DATABASE Cine_Peliculas;
USE Cine_Peliculas;


CREATE TABLE generos (
    id_genero INT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

CREATE TABLE Peliculas (
    idpelicula int PRIMARY KEY,
    nombre_pelicula VARCHAR(50),
    director VARCHAR(100),
    fecha_estreno datetime,
    id_genero int,
    FOREIGN KEY (id_genero) REFERENCES generos(id_genero)
);    

INSERT INTO generos (id_genero, nombre) VALUES
(1, 'Acción'),
(2, 'Comedia'),
(3, 'Drama'),
(4, 'Ciencia Ficción'),
(5, 'Terror');

INSERT INTO Peliculas (idpelicula, nombre_pelicula, director, fecha_estreno, id_genero) VALUES
(101, 'Mad Max: Furia en la carretera', 'George Miller', '2015-05-15 00:00:00', 1),
(102, 'La gran apuesta', 'Adam McKay', '2015-12-11 00:00:00', 2),
(103, 'El padrino', 'Francis Ford Coppola', '1972-03-24 00:00:00', 3),
(104, 'Interestelar', 'Christopher Nolan', '2014-11-07 00:00:00', 4),
(105, 'El conjuro', 'James Wan', '2013-07-19 00:00:00', 5);
