CREATE TABLE IF NOT EXISTS Utilisateur (
	numero INT NOT NULL, 
	adresse_email VARCHAR (50) NOT NULL,
	
	PRIMARY KEY (numero),
	FOREIGN KEY (numero) REFERENCES Personne(numero)
	
) engine = InnoDB; 

INSERT INTO `Utilisateur` (`numero`, `adresse_email`) VALUES
(1, 'Jacques.Jean.195@fakeemail.com'),
(2, 'Dupont.Simon.855@fakeemail.com'),
(3, 'Vermeylen.Ivan.920@fakeemail.com'),
(4, 'Bernard.Adrien.5@fakeemail.com'),
(5, 'Razat.François.334@fakeemail.com'),
(6, 'Spacey.Kevin.207@fakeemail.com'),
(7, 'Houbner.Marc.221@fakeemail.com'),
(8, 'Mestdag.Dave.693@fakeemail.com'),
(9, 'Klapky.John.514@fakeemail.com'),
(10, 'Mifune.Alain.339@fakeemail.com'),
(11, 'Freeman.Caroline.145@fakeemail.com'),
(13, 'Nicholson.Steve.557@fakeemail.com'),
(14, 'Brando.James.608@fakeemail.com'),
(15, 'Johansson.Matthew.208@fakeemail.com'),
(16, 'Phoenix.Henry.182@fakeemail.com'),
(17, 'Olsen.Dustin.693@fakeemail.com'),
(18, 'Pesci.Beniccio.950@fakeemail.com'),
(19, 'Wan.Bruce.836@fakeemail.com'),
(20, 'Hardi.Denzel.396@fakeemail.com'),
(21, 'Jackson.Yves.339@fakeemail.com'),
(22, 'Ventura.Robert.527@fakeemail.com'),
(23, 'Penn.Maurice.545@fakeemail.com'),
(24, 'Jonas.Élisabeth.191@fakeemail.com'),
(25, 'Oldman.Matts.246@fakeemail.com'),
(26, 'Bale.Christophe.834@fakeemail.com'),
(27, 'Hopkins.Jeanne.248@fakeemail.com'),
(28, 'Holden.Ralph.978@fakeemail.com'),
(29, 'Lewis.River.40@fakeemail.com'),
(30, 'Hackman.Eliott.841@fakeemail.com'),
(31, 'Roux.Armand.693@fakeemail.com'),
(32, 'Leroy.Arnaud.775@fakeemail.com'),
(33, 'Simon.Christian.994@fakeemail.com'),
(34, 'Lambert.Joseph.195@fakeemail.com'),
(35, 'Bonnet.Alexandre.150@fakeemail.com'),
(36, 'Girard.Jérôme.769@fakeemail.com'),
(37, 'Perrin.Jules.730@fakeemail.com'),
(38, 'Morin.Léo.275@fakeemail.com'),
(39, 'Leclerc.Dan.853@fakeemail.com'),
(40, 'Spencer.Serge.113@fakeemail.com'),
(41, 'Perrot.Théodore.639@fakeemail.com'),
(42, 'Bonnet.Yoann.167@fakeemail.com'),
(43, 'Michaud.Donald.485@fakeemail.com'),
(44, 'Rodriguez.Marie.434@fakeemail.com'),
(45, 'Carlier.Sophie.421@fakeemail.com'),
(47, 'Vasquau.Octave.137@fakeemail.com'),
(48, 'Durand.Martin.100@fakeemail.com'),
(49, 'Lefebvre.Lucie.156@fakeemail.com'),
(50, 'Hackman.Coralie.778@fakeemail.com');