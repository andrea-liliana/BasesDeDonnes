<?php

include("functions.php");

forConnected();
unsetVar();

 ?>

    <!doctype html>
    <html lang="fr">

    <head>
        <meta charset="utf-8">

        <title>Groupe 29 : Menu</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">

    </head>

    <body class="text-center">

        <div class="container">
            <h1>Menu</h1>
			<div id="MainMenu">
				<div class="list-group panel">
					<a href="#demo3" class="list-group-item list-group-item-action" data-toggle="collapse" data-parent="#MainMenu">Sélection et affichage de tuples<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></a>
					<div class="collapse" id="demo3">
						  <a href="tache1_personne.php" class="list-group-item">Personne</a>
						  <a href="tache1_episode.php" class="list-group-item">Episodes</a>
						  <a href="tache1_serie.php" class="list-group-item">Serie</a>
						  <a href="tache1_utilisateur.php" class="list-group-item">Utilisateur</a>
						  <a href="tache1_acteur.php" class="list-group-item">Acteur</a>
						  <a href="tache1_pays.php" class="list-group-item">Pays</a>
						  <a href="tache1_disponible_sur.php" class="list-group-item">Disponible_Sur</a>
						  <a href="tache1_est_abonne.php" class="list-group-item">Est_Abonne</a>
						  <a href="tache1_joue_dans.php" class="list-group-item">Joue_Dans</a>
						  <a href="tache1_plateforme_streaming.php" class="list-group-item">Plateforme_streaming</a>
						  <a href="tache1_regarde.php" class="list-group-item">Regarde</a>
					</div>
                <a href="tache2.php" class="list-group-item list-group-item-action" >Pays où les plateformes sont disponibles</a>
                <a type="button" class="list-group-item list-group-item-action" href="tache3.php">Ajout d'épisode</a>
                <a type="button" class="list-group-item list-group-item-action" href="tache4.php">Utilisateurs ayant regardé tous les épisodes de Black Mirror</a>
				<a type="button" class="list-group-item list-group-item-action" href="tache5.php">Classement des épisodes les plus vus</a>
				<a href="logout.php" class="list-group-item list-group-item-danger" >Se deconnecter</a>
				</div>
            </div>
        </div>
		
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>

    </html>