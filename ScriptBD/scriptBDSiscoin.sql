CREATE TABLE Usuario (
    usuario_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL, -- Se recomienda almacenar hashes de contraseñas
    email VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE Tema (
    tema_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT
);

CREATE TABLE Comentario (
    comentario_id INT AUTO_INCREMENT PRIMARY KEY,
    tema_id INT NOT NULL,
    comment TEXT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (tema_id) REFERENCES Tema(tema_id) ON DELETE CASCADE
);

CREATE TABLE Estudiante (
    estudiante_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    carrera VARCHAR(100) NOT NULL,
    ciclo CHAR(2) NOT NULL,
    usuario_id INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES Usuario(usuario_id) ON DELETE CASCADE
);

CREATE TABLE Perfil (
    perfil_id INT AUTO_INCREMENT PRIMARY KEY,
    estudiante_id INT NOT NULL,
    habilidades VARCHAR(100) NOT NULL,
    caracteristicas VARCHAR(100) NOT NULL,
    FOREIGN KEY (estudiante_id) REFERENCES Estudiante(estudiante_id) ON DELETE CASCADE
);

CREATE TABLE Profesor (
    profesor_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    carrera VARCHAR(100) NOT NULL,
    ciclo CHAR(2) NOT NULL,
    usuario_id INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES Usuario(usuario_id) ON DELETE CASCADE
);

CREATE TABLE Repositorio (
    repositorio_id INT AUTO_INCREMENT PRIMARY KEY, 
    titulo VARCHAR(100) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    curso VARCHAR(100) NOT NULL,
    lineaInv VARCHAR(100) NOT NULL,
    estudiante_id INT NOT NULL,
    FOREIGN KEY (estudiante_id) REFERENCES Estudiante(estudiante_id) ON DELETE CASCADE
);
CREATE TABLE Grupo (
    grupo_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT
);

INSERT INTO Grupo (nombre, descripcion) VALUES 
('Círculo de Estudio de Filosofía Política', 'Un grupo dedicado al estudio de las ideas políticas fundamentales y su aplicación en el mundo contemporáneo. Analizamos textos clásicos y debates actuales en filosofía política.'),
('Grupo de Estudio de Psicología del Desarrollo', 'Un espacio para explorar los procesos de desarrollo humano desde la infancia hasta la adultez. Discutimos teorías, investigaciones y aplicaciones prácticas en el campo de la psicología del desarrollo.'),
('Grupo de Estudio de Ingeniería de Software', 'Un equipo de estudiantes apasionados por la ingeniería de software y el desarrollo de aplicaciones. Nos reunimos para discutir conceptos de diseño, programación y metodologías ágiles.');

/*INSERTAR DATOS EN LA BD*/
-- Insertando datos en la tabla Usuario
INSERT INTO Usuario (username, password, email) VALUES 
('johndoe', 'password123', 'johndoe@ucvvirtual.edu.pe'),
('janedoe', 'qwerty789', 'janedoe@ucvvirtual.edu.pe'),
('samsmith', 'sammy456', 'samsmith@ucvvirtual.edu.pe');

-- Insertando datos en la tabla Tema
INSERT INTO Tema (nombre, descripcion) VALUES 
('Introducción a la Programación', 'Conceptos básicos de programación'),
('Desarrollo Web', 'HTML, CSS, JavaScript'),
('Bases de Datos', 'Modelado de datos y SQL');

-- Insertando datos en la tabla Comentario
INSERT INTO Comentario (tema_id, comment) VALUES 
(1, '¡Interesante tema!'),
(1, '¿Alguien sabe dónde encontrar más información?'),
(2, 'Aquí hay un buen recurso para aprender CSS: https://example.com/css-tutorial');

-- Insertando datos en la tabla Estudiante
INSERT INTO Estudiante (nombre, apellido, email, carrera, ciclo, usuario_id) VALUES 
('Carlos', 'González', 'cgonzalez@ucvvirtual.edu.pe', 'Ingeniería de Sistemas', '10', 1),
('Ana', 'Martínez', 'amartinez@ucvvirtual.edu.pe', 'Ingeniería de Software', '8', 2),
('Pedro', 'Díaz', 'pdiaz@ucvvirtual.edu.pe', 'Ciencia de la Computación', '7', 3);

-- Insertando datos en la tabla Perfil
INSERT INTO Perfil (estudiante_id, habilidades, caracteristicas) VALUES 
(1, 'Java, C++, Git', 'Responsable y orientado a resultados'),
(2, 'HTML, CSS, JavaScript', 'Creativa y colaborativa'),
(3, 'Python, SQL, Linux', 'Analítico y autodidacta');

-- Insertando datos en la tabla Profesor
INSERT INTO Profesor (nombre, apellido, email, carrera, ciclo, usuario_id) VALUES 
('María', 'López', 'mlopez@ucvvirtual.edu.pe', 'Ingeniería de Sistemas', '5', 1),
('Juan', 'Rodríguez', 'jrodriguez@ucvvirtual.edu.pe', 'Ingeniería de Software', '7', 2),
('Sofía', 'García', 'sgarcia@ucvvirtual.edu.pe', 'Ciencia de la Computación', '6', 3);

-- Insertando datos en la tabla Repositorio
INSERT INTO Repositorio (titulo, curso, lineaInv, estudiante_id) VALUES 
('Proyecto de Estructuras de Datos', 'Estructuras de Datos', 'Algoritmos de búsqueda', 1),
('Sitio Web Personal', 'Desarrollo Web', 'Diseño Responsivo', 2),
('Base de Datos para Gestión de Inventarios', 'Bases de Datos', 'Modelado ER', 3);
