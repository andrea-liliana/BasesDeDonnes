<?php

include("functions.php");
include("db.php");

forConnected();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if (!ctype_digit($_POST["nomActeur"]) && !ctype_digit($_POST["prenomActeur"])){
	
		$nomActeur = str_replace("'", "\'",$_POST["nomActeur"]);
		$prenomActeur = str_replace("'", "\'",$_POST["prenomActeur"]);

		if (isset($nomActeur) && isset($prenomActeur) && strlen($nomActeur) != 0 && strlen($prenomActeur) != 0){

			try{
				$bdd->beginTransaction();
				$sql = "SELECT numero FROM Personne NATURAL JOIN Acteur WHERE nom = '".$nomActeur."' AND prenom = '".$prenomActeur."'";
				$res = $bdd->query($sql);
				
				if ($tuple = $res->fetch()){
					
					$sql3 = "SELECT * FROM Joue_Dans WHERE numero = ".$tuple["numero"]." AND n_saison = ".$_SESSION["n_saison"]." AND n_episode = ".$_SESSION["n_episode"]." AND nom = '".$_SESSION["nom"]."'";
					$res2 = $bdd->query($sql3);
					
					if ($tuple2 = $res2->fetch()){
						$_SESSION['message'] = "L'acteur a déjà été associé à S".$_SESSION["n_saison"]."E".$_SESSION["n_episode"]." de ".$_SESSION["nom"];
						$bdd->rollBack();
					}
					
					else {
					
						$sql2 = "INSERT INTO Joue_Dans (numero, n_saison, n_episode, nom) VALUES (?, ?, ?, ?)";
						$stmt = $bdd->prepare($sql2);
						$stmt->execute(array($tuple["numero"], $_SESSION["n_saison"], $_SESSION["n_episode"], $_SESSION["nom"]));
						
						$_SESSION['message'] = "L'acteur a bien été associé à S".$_SESSION["n_saison"]."E".$_SESSION["n_episode"]." de ".$_SESSION["nom"];
						
						$bdd->commit();
					}
				}
					
				else {
					$_SESSION['message'] = "Cette personne n'est pas un acteur";
					$bdd->rollBack();
				}
				
			}
			
			catch (Exception $e) {
				$bdd->rollBack();
				echo "Failed: " . $e->getMessage();
			}
			
		}
		
	}
	
	else {
		$_SESSION['message'] = "Valeurs invalides";
	}
}

 ?>
 
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">

    <title>Groupe 29 : Ajout d'acteur(s)</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="text-center">

	<div class="container">

<?php	echo "<h1>Ajoutez un acteur à S".$_SESSION["n_saison"]."E".$_SESSION["n_episode"]." de ".$_SESSION["nom"]."</h1>" ?>

	<form class="form-signin" method="POST" action=""> 

<?php 


if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-dark' role='alert'>";

    echo $_SESSION['message'];

    echo "</div>";

    unset($_SESSION['message']);
}

?>

		<input type="text" name="nomActeur" class="form-control" placeholder="Nom de l'acteur" required="1">
		<input type="text" name="prenomActeur" class="form-control" placeholder="Prénom de l'acteur" required="1">
		<br/>
		
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ajouter</button>
		
		<br/>
		
		<a type="button" class="btn btn-lg btn-block btn-danger" href="menu.php" >Retour</a>
    </form>
	</div>
	
</body>

</html>