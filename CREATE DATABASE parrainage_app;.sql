CREATE DATABASE parrainage_app;

USE parrainage_app;

-- Table: filieres
CREATE TABLE filieres (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(255) NOT NULL
);

-- Table: parcours
CREATE TABLE parcours (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(255) NOT NULL,
  filiere_id INT,
  FOREIGN KEY (filiere_id) REFERENCES filieres(id)
);

-- Table: etudiants
CREATE TABLE etudiants (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(255) NOT NULL,
  filiere_id INT,
  parcours_id INT,
  niveau ENUM('1', '2') NOT NULL,
  FOREIGN KEY (filiere_id) REFERENCES filieres(id),
  FOREIGN KEY (parcours_id) REFERENCES parcours(id)
);

-- Table: parrainages
CREATE TABLE parrainages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  sponsor_id INT,
  sponsored_id INT,
  FOREIGN KEY (sponsor_id) REFERENCES etudiants(id),
  FOREIGN KEY (sponsored_id) REFERENCES etudiants(id)
);

-- Insert sample data into filieres
INSERT INTO filieres (nom) VALUES ('Informatique'), ('Mathématiques'), ('Physique');

-- Insert sample data into parcours
INSERT INTO parcours (nom, filiere_id) VALUES ('Développement Web', 1), ('Réseaux', 1), ('Statistiques', 2), ('Mécanique', 3);

-- Insert sample data into etudiants
INSERT INTO etudiants (nom, filiere_id, parcours_id, niveau) VALUES 
('Alice', 1, 1, '1'), 
('Bob', 1, 1, '2'), 
('Charlie', 2, 3, '1'), 
('David', 3, 4, '2');