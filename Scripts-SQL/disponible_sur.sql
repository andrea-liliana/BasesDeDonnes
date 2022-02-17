CREATE TABLE IF NOT EXISTS Disponible_Sur (
	nom_serie VARCHAR(50) NOT NULL, 
	nom_platf VARCHAR(50) NOT NULL,
	
	PRIMARY KEY (nom_serie, nom_platf),
	FOREIGN KEY (nom_serie) REFERENCES Serie(nom),
	FOREIGN KEY (nom_platf) REFERENCES Plateforme_streaming(nom)
	
) engine = InnoDB; 

INSERT INTO `Disponible_Sur` (`nom_serie`, `nom_platf`) VALUES
('The Witcher', 'Amazon Prime Video'),
('Black Mirror', 'Apple TV+'),
('Mr. Robot', 'Apple TV+'),
('Peaky Blinders', 'Apple TV+'),
('Stranger Things', 'Apple TV+'),
('Casa de Papel', 'Canal+'),
('Sherlock', 'Canal+'),
('The Witcher', 'Canal+'),
('Game of Thrones', 'Disney+'),
('Peaky Blinders', 'Disney+'),
('Black Mirror', 'Hulu'),
('Breaking Bad', 'Hulu'),
('Game of Thrones', 'Hulu'),
('Sherlock', 'Hulu'),
('Under the Dome', 'Hulu'),
('Casa de Papel', 'Netflix'),
('Game of Thrones', 'Netflix'),
('Peaky Blinders', 'Netflix'),
('Black Mirror', 'Youtube Premium'),
('Casa de Papel', 'Youtube Premium'),
('Sherlock', 'Youtube Premium'),
('The Witcher', 'Youtube Premium');