-- Tabla Usuarios
CREATE TABLE Usuarios (
    ID_User INT AUTO_INCREMENT PRIMARY KEY,
    Name_Complete VARCHAR(50) UNIQUE NOT NULL,
    Email VARCHAR(255) UNIQUE NOT NULL, -- Se recomienda almacenar hashes de contraseñas
    User VARCHAR(50) UNIQUE NOT NULL,
    Password VARCHAR(255) NOT NULL -- Es recomendable almacenar el hash de la contraseña, y no la contraseña en sí
);

-- Tabla Tema
CREATE TABLE Tema (
    tema_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT
);

-- Tabla Comentario
CREATE TABLE Comentario (
    comentario_id INT AUTO_INCREMENT PRIMARY KEY,
    tema_id INT NOT NULL,
    comentario TEXT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (tema_id) REFERENCES Tema(tema_id) ON DELETE CASCADE
);

-- Tabla Estudiante
CREATE TABLE Estudiante (
    estudiante_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    carrera VARCHAR(100) NOT NULL,
    ciclo CHAR(2) NOT NULL,
    usuario_id INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(ID_User) ON DELETE CASCADE
);

-- Tabla Perfil
CREATE TABLE Perfil (
    perfil_id INT AUTO_INCREMENT PRIMARY KEY,
    estudiante_id INT NOT NULL,
    habilidades VARCHAR(100) NOT NULL,
    caracteristicas VARCHAR(100) NOT NULL,
    FOREIGN KEY (estudiante_id) REFERENCES Estudiante(estudiante_id) ON DELETE CASCADE
);

-- Tabla Profesor
CREATE TABLE Profesor (
    profesor_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    carrera VARCHAR(100) NOT NULL,
    ciclo CHAR(2) NOT NULL,
    usuario_id INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(ID_User) ON DELETE CASCADE
);

-- Tabla Repositorio
CREATE TABLE Repositorio (
    repositorio_id INT AUTO_INCREMENT PRIMARY KEY, 
    titulo VARCHAR(100) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    curso VARCHAR(100) NOT NULL,
    linea_investigacion VARCHAR(100) NOT NULL,
    estudiante_id INT NOT NULL,
    FOREIGN KEY (estudiante_id) REFERENCES Estudiante(estudiante_id) ON DELETE CASCADE
);



/* Insertando datos en la tabla Usuarios */
INSERT INTO Usuarios (Name_Complete, Email, User, Password) VALUES 
('johndoe', 'johndoe@ucvvirtual.edu.pe', 'johndoe', 'password123'),
('janedoe', 'janedoe@ucvvirtual.edu.pe', 'janedoe', 'qwerty789'),
('samsmith', 'samsmith@ucvvirtual.edu.pe', 'samsmith', 'sammy456');

/* Insertando datos en la tabla Tema */
INSERT INTO Tema (nombre, descripcion) VALUES 
('Introducción a la Programación', 'Conceptos básicos de programación'),
('Desarrollo Web', 'HTML, CSS, JavaScript'),
('Bases de Datos', 'Modelado de datos y SQL');

/* Insertando datos en la tabla Comentario */
INSERT INTO Comentario (tema_id, comentario) VALUES 
(1, '¡Interesante tema!'),
(1, '¿Alguien sabe dónde encontrar más información?'),
(2, 'Aquí hay un buen recurso para aprender CSS: https://example.com/css-tutorial');

/* Insertando datos en la tabla Estudiante */
INSERT INTO Estudiante (nombre, apellido, email, carrera, ciclo, usuario_id) VALUES 
('Carlos', 'González', 'cgonzalez@ucvvirtual.edu.pe', 'Ingeniería de Sistemas', '10', 1),
('Ana', 'Martínez', 'amartinez@ucvvirtual.edu.pe', 'Ingeniería de Software', '8', 2),
('Pedro', 'Díaz', 'pdiaz@ucvvirtual.edu.pe', 'Ciencia de la Computación', '7', 3);

/* Insertando datos en la tabla Perfil */
INSERT INTO Perfil (estudiante_id, habilidades, caracteristicas) VALUES 
(1, 'Java, C++, Git', 'Responsable y orientado a resultados'),
(2, 'HTML, CSS, JavaScript', 'Creativa y colaborativa'),
(3, 'Python, SQL, Linux', 'Analítico y autodidacta');

/* Insertando datos en la tabla Profesor */
INSERT INTO Profesor (nombre, apellido, email, carrera, ciclo, usuario_id) VALUES 
('María', 'López', 'mlopez@ucvvirtual.edu.pe', 'Ingeniería de Sistemas', '5', 1),
('Juan', 'Rodríguez', 'jrodriguez@ucvvirtual.edu.pe', 'Ingeniería de Software', '7', 2),
('Sofía', 'García', 'sgarcia@ucvvirtual.edu.pe', 'Ciencia de la Computación', '6', 3);

/* Insertando datos en la tabla Repositorio */
INSERT INTO Repositorio (titulo, curso, linea_investigacion, estudiante_id) VALUES 
('Proyecto de Estructuras de Datos', 'Estructuras de Datos', 'Algoritmos de búsqueda', 1),
('Sitio Web Personal', 'Desarrollo Web', 'Diseño Responsivo', 2),
('Base de Datos para Gestión de Inventarios', 'Bases de Datos', 'Modelado ER', 3);
