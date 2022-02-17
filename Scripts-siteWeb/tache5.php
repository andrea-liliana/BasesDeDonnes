<?php

include("functions.php");
include("db.php");

forConnected();

 ?>
 
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">

    <title>Groupe 29 : Classement des épisodes les plus vus</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="text-center">

<div class="container">

<h1>Classement des épisodes les plus vus</h1> 

<div class="form-signin">


<?php

try{
			
	$bdd->beginTransaction();
	$query = "SELECT n_episode, n_saison, nom_serie, COUNT( DISTINCT numero ) AS nb_vues
				FROM Regarde
				GROUP BY n_episode, n_saison, nom_serie
				ORDER BY nb_vues DESC , nom_serie, n_saison, n_episode";
				
	 $res = $bdd->query($query);
	 
	 while ($tuple = $res->fetch()){
		echo "<p class='form-control'>".$tuple["nom_serie"]." S".$tuple["n_saison"]."E".$tuple["n_episode"]." : ".$tuple["nb_vues"]." vues</p>"; 
	 }
	 
	 $query2 = "SELECT nom, Episodes.n_episode, Episodes.n_saison, 0 as nb_vues
			FROM Episodes
			LEFT JOIN Regarde ON Episodes.n_episode = Regarde.n_episode AND Episodes.n_saison = Regarde.n_saison AND Episodes.nom = Regarde.nom_serie
			WHERE numero IS NULL
			ORDER BY nom, n_saison, n_episode";

	$res2 = $bdd->query($query2);

	while ($tuple2 = $res2->fetch()){
		echo "<p class='form-control'>".$tuple2["nom"]." S".$tuple2["n_saison"]."E".$tuple2["n_episode"]." : ".$tuple2["nb_vues"]." vues</p>"; 
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