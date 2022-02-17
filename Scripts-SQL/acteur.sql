CREATE TABLE IF NOT EXISTS Acteur (
	numero INT NOT NULL, 
	golden_globes INT,
	emmy_awards INT,
	
	PRIMARY KEY (numero),
	FOREIGN KEY (numero) REFERENCES Personne(numero)
	
) engine = InnoDB; 


INSERT INTO `Acteur` (`numero`, `golden_globes`, `emmy_awards`) VALUES
(10, 5, 3),
(12, 4, 2),
(17, 2, 0),
(19, 2, 1),
(20, 4, 4),
(27, 1, 2),
(31, 2, 4),
(32, 2, 5),
(33, 2, 0),
(36, 1, 3),
(37, 2, 2),
(38, 1, 3),
(39, 2, 3),
(42, 2, 4),
(43, 4, 2),
(46, 4, 4);