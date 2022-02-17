<?php

include("functions.php");
include("db.php");

forConnected();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if (!ctype_digit($_POST["nom"]) && !ctype_digit($_POST["synopsis"]) && !ctype_digit($_POST["nomActeur"]) && !ctype_digit($_POST["prenomActeur"]) && is_numeric($_POST["n_saison"]) && is_numeric($_POST["n_episode"]) && is_numeric($_POST["duree"])){
	
		$_SESSION["nom"] = str_replace("'", "\'",$_POST["nom"]);
		$synopsis = str_replace("'", "\'",$_POST["synopsis"]);
		$_SESSION["n_saison"] = str_replace("'", "\'",$_POST["n_saison"]);
		$_SESSION["n_episode"] = str_replace("'", "\'",$_POST["n_episode"]);
		$duree = str_replace("'", "\'",$_POST["duree"]);
		$nomActeur = str_replace("'", "\'",$_POST["nomActeur"]);
		$prenomActeur = str_replace("'", "\'",$_POST["prenomActeur"]);
		
		if(isset($_SESSION["nom"]) && isset($synopsis) && isset($_SESSION["n_saison"])&& isset($_SESSION["n_episode"])&& isset($duree) && isset($nomActeur) && isset($prenomActeur) && strlen($_SESSION["nom"]) != 0 && strlen($synopsis) != 0 && strlen($_SESSION["n_saison"]) !=0 && strlen($_SESSION["n_episode"]) != 0 && strlen($duree) != 0 && strlen($nomActeur) !=0 && strlen($prenomActeur) != 0) {
			
			try{
				$bdd->beginTransaction();
				$sql = "SELECT nom FROM Serie WHERE nom = '".$_SESSION["nom"]."'";
				$res = $bdd->query($sql);
				
				if ($tuple = $res->fetch()){
					
					$sql2 = "SELECT * FROM Episodes WHERE nom = '".$_SESSION["nom"]."' AND n_saison = ".$_SESSION["n_saison"]." AND n_episode = ".$_SESSION["n_episode"];
					$res2 = $bdd->query($sql2);
					
					if ($tuple2 = $res2->fetch()){
						$_SESSION['message'] = "Cet épisode existe déjà dans la base de données";
						$bdd->rollBack();
					}
					
					else {
	
						$sql4 = "SELECT numero FROM Personne NATURAL JOIN Acteur WHERE nom = '".$nomActeur."' AND prenom = '".$prenomActeur."'";
						$res3 = $bdd->query($sql4);
						
						if ($tuple3 = $res3->fetch()){
						
							$sql3 = "INSERT INTO Episodes (n_saison, n_episode, duree, synopsis, nom) VALUES (?, ?, ?, ?, ?)";
							$stmt = $bdd->prepare($sql3);
							$stmt->execute(array($_SESSION["n_saison"], $_SESSION["n_episode"], $duree, $synopsis, $_SESSION["nom"]));
					
							$sql4 = "INSERT INTO Joue_Dans (numero, n_saison, n_episode, nom) VALUES (?, ?, ?, ?)";
							$stmt2 = $bdd->prepare($sql4);
							$stmt2->execute(array($tuple3["numero"], $_SESSION["n_saison"], $_SESSION["n_episode"], $_SESSION["nom"]));
								
							$bdd->commit(); 
			
							echo "<meta http-equiv='refresh' content='0; url=next_tache3.php' />";
							}
							
							else{
								$_SESSION['message'] = "Cette personne n'est pas un acteur";
								$bdd->rollBack();
							}
						
					}
				} 
			
				else { 
					$_SESSION['message'] = "Cette série n'existe pas dans la base de données";
					$bdd->rollBack();
				}

			}
			
			catch (Exception $e) {
				$bdd->rollBack();
				echo "Failed: " . $e->getMessage();
			}
		} 

		else {
		
			$_SESSION['message'] = "Tous les champs sont obligatoires";
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

    <title>Groupe 29 : Ajout d'épisode</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="text-center">
	
	<div class="container">
	
	<h1>Ajoutez un épisode</h1>

    <form class="form-signin" method="POST" action="">  

<?php 


if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-dark' role='alert'>";

    echo $_SESSION['message'];

    echo "</div>";

    unset($_SESSION['message']);
}

?>

		<input type="text" name="nom" class="form-control" placeholder="Nom de la série" required="1">
		<textarea name="synopsis" rows="5" cols="33" class="form-control" placeholder="Synopsis" required="1"></textarea>
		<input type="number" name="n_saison" class="form-control" placeholder="Numéro de saison" required="1">
		<input type="number" name="n_episode" class="form-control" placeholder="Numéro d'épisode" required="1">
		<input type="number" name="duree" class="form-control" placeholder="Durée de l'épisode" required="1">
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