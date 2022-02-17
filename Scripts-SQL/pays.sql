CREATE TABLE IF NOT EXISTS Pays (
	nom VARCHAR(50) NOT NULL,
	ordre INT NOT NULL,
	pays VARCHAR(50) NOT NULL,
	
	PRIMARY KEY (nom, ordre),
	FOREIGN KEY (nom) REFERENCES Plateforme_streaming (nom)
	
) engine = InnoDB; 

INSERT INTO `Pays` (`nom`, `ordre`, `pays`) VALUES
('Amazon Prime Video', 1, 'Brésil'),
('Amazon Prime Video', 2, 'Royaume Uni'),
('Amazon Prime Video', 3, 'Japon'),
('Amazon Prime Video', 4, 'Chili'),
('Amazon Prime Video', 5, 'Irlande'),
('Amazon Prime Video', 6, 'Pays Bas'),
('Apple TV+', 1, 'Argentine'),
('Apple TV+', 2, 'Hongrie'),
('Apple TV+', 3, 'Chine'),
('Apple TV+', 4, 'Italie'),
('Apple TV+', 5, 'Allemagne'),
('Apple TV+', 6, 'Pays Bas'),
('Canal+', 1, 'Italie'),
('Canal+', 2, 'Espagne'),
('Disney+', 1, 'Allemagne'),
('Hulu', 1, 'Hongrie'),
('Hulu', 2, 'Italie'),
('Hulu', 3, 'Grèce'),
('Netflix', 1, 'Autriche'),
('Netflix', 2, 'Japon'),
('Youtube Premium', 1, 'Pays Bas'),
('Youtube Premium', 2, 'Luxembourg'),
('Youtube Premium', 3, 'France'),
('Youtube Premium', 4, 'Italie'),
('Youtube Premium', 5, 'Chili'),
('Youtube Premium', 6, 'Japon'),
('Youtube Premium', 7, 'Finlande'),
('Youtube Premium', 8, 'Autriche'),
('Youtube Premium', 9, 'Danemark');