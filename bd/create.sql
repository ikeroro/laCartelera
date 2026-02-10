DROP DATABASE IF EXISTS `laCartelera`;

CREATE DATABASE `laCartelera`;

USE `laCartelera`;

CREATE TABLE `directores` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `generos` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `actores` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `peliculas` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `titulo` VARCHAR(255) NOT NULL,
    `idDirector` INT NOT NULL,
    `Duracion` INT NOT NULL,
    `anho` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`idDirector`) REFERENCES `directores`(`id`)
);

CREATE TABLE `peliculasActores` (
    `idPelicula` INT NOT NULL,
    `idActor` INT NOT NULL,
    PRIMARY KEY (`idPelicula`, `idActor`),
    FOREIGN KEY (`idPelicula`) REFERENCES `peliculas`(`id`),
    FOREIGN KEY (`idActor`) REFERENCES `actores`(`id`)
);

CREATE TABLE `peliculasGeneros` (
    `idPelicula` INT NOT NULL,
    `idGenero` INT NOT NULL,
    PRIMARY KEY (`idPelicula`, `idGenero`),
    FOREIGN KEY (`idPelicula`) REFERENCES `peliculas`(`id`),
    FOREIGN KEY (`idGenero`) REFERENCES `generos`(`id`)
);

CREATE TABLE `usuarios` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `usuario` VARCHAR(255) NOT NULL UNIQUE,
    `email` VARCHAR(255) NOT NULL,
    `contrasena` VARCHAR(255) NOT NULL,
    `rol` VARCHAR(50) NOT NULL DEFAULT 'usuario',
    `fotoPerfil` VARCHAR(255),
    PRIMARY KEY (`id`)
);

CREATE TABLE `valoracionesUsuarios` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `idUsuario` INT NOT NULL,
    `idPelicula` INT NOT NULL,
    `puntuacion` INT NOT NULL,
    `texto` TEXT,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`idUsuario`) REFERENCES `usuarios`(`id`),
    FOREIGN KEY (`idPelicula`) REFERENCES `peliculas`(`id`)
);

-- Inserción de datos

INSERT INTO `directores` (`nombre`) VALUES
('Steven Spielberg'),
('Christopher Nolan'),
('Quentin Tarantino'),
('Martin Scorsese'),
('James Cameron');

INSERT INTO `generos` (`nombre`) VALUES
('Acción'),
('Comedia'),
('Drama'),
('Ciencia Ficción'),
('Terror');

INSERT INTO `actores` (`nombre`) VALUES
('Leonardo DiCaprio'),
('Brad Pitt'),
('Scarlett Johansson'),
('Tom Hanks'),
('Meryl Streep');

INSERT INTO `peliculas` (`titulo`, `idDirector`, `Duracion`, `anho`) VALUES
('Inception', 2, 148, 2010),
('Pulp Fiction', 3, 154, 1994),
('The Shawshank Redemption', 4, 142, 1994),
('Avatar', 5, 162, 2009),
('The Wolf of Wall Street', 4, 180, 2013);

INSERT INTO `peliculasActores` (`idPelicula`, `idActor`) VALUES
(1, 1),
(1, 3),
(2, 2),
(2, 4),
(3, 1),
(3, 5),
(4, 2),
(4, 3),
(5, 1),
(5, 4);

INSERT INTO `peliculasGeneros` (`idPelicula`, `idGenero`) VALUES
(1, 4),
(2, 1),
(2, 3),
(3, 3),
(4, 4),
(5, 1),
(5, 3);

INSERT INTO `usuarios` (`usuario`, `email`, `contrasena`, `rol`, `fotoPerfil`) VALUES
('juan', 'juan@gmail.com', 'abc123.', 'usuario', NULL),
('maria_gomez', 'maria@gmail.com', 'abc123', 'usuario', NULL),
('admin', 'admin@lacartelera.com', 'abc123', 'administrador', NULL);