CREATE DATABASE apprentissage;

USE apprentissage;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    handicap ENUM('sourd', 'malvoyant', 'aucun') NOT NULL,
    classe ENUM('6em', '5em') NOT NULL
);

CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    classe ENUM('6em', '5em') NOT NULL,
    subject VARCHAR(50) NOT NULL,
    content TEXT NOT NULL
);

CREATE TABLE exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT NOT NULL,
    question TEXT NOT NULL,
    answers TEXT NOT NULL, -- Stocker les réponses sous forme JSON
    correct_answer INT NOT NULL,
    FOREIGN KEY (course_id) REFERENCES courses(id)
);
