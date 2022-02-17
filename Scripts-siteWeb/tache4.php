<?php

include("functions.php");
include("db.php");

forConnected();

 ?>
 
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">

    <title>Groupe 29 : Utilisateurs ayant regardé Black Mirror</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="text-center">

<div class="container">

<h1>Utilisateurs ayant regardé tous les épisodes de Black Mirror</h1> 

<div class="form-signin">

<?php

try {	 
	 $bdd->beginTransaction();
	 $query = "SELECT nom, prenom
				FROM Regarde NATURAL JOIN Personne
				WHERE nom_serie = 'Black Mirror'
				GROUP BY numero
				HAVING COUNT( n_episode ) IN (SELECT COUNT( * ) FROM Episodes WHERE nom = 'Black Mirror')";
				
	 $res = $bdd->query($query);

	$count = 0;
	 while ($tuple = $res->fetch()){
		echo "<p class='form-control'>".$tuple["nom"]." ".$tuple["prenom"]."</p>"; 
		$count++;
	 }
	 
	 if ($count == 0){
		 echo "<div class='alert alert-dark' role='alert'> Aucun utilisateur n'a regardé tous les épisodes de Black Mirror</div>"; 
	}

	$bdd->commit();
}

catch (Exception $e) {
	$bdd->rollBack();
	echo "Failed: " . $e->getMessage();
}

     
?>

<a type="button" class="btn btn-lg btn-block btn-danger" href="menu.php" >Retour</a>

</div>

</div>
    
</body>
</html>