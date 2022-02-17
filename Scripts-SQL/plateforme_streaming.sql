CREATE TABLE IF NOT EXISTS Plateforme_streaming (
	nom VARCHAR(50) NOT NULL,
	societe VARCHAR (50) NOT NULL,
	
	PRIMARY KEY (nom)
	
) engine = InnoDB; 

INSERT INTO `Plateforme_streaming` (`nom`, `societe`) VALUES
('Amazon Prime Video', 'Amazon.com Inc.'),
('Apple TV+', 'Apple Inc.'),
('Canal+', 'Canal+ Group'),
('Disney+', 'The Walt Disney Company'),
('Hulu', 'The Walt Disney Company'),
('Netflix', 'Netflix Inc.'),
('Youtube Premium', 'Google LLC');