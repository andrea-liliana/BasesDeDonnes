<?php

include("functions.php");
include('db.php');

forConnected();

 ?>

<!doctype html>
    <html lang="fr">

    <head>
        <meta charset="utf-8">

        <title>Groupe 29 : Selection et affichage de tuples</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">

    </head>

    <body class="text-center">

        <div class="container">
           
        <h1>Table Disponible_Sur</h1>


<form method="POST" action="#">
    <div class="form-row">
        <div class="col">
            <input name="nom_serie" type="text" class="form-control" placeholder="Serie" >
        </div>
        <div class="col">
		<input name="nom_platf" type="text" class="form-control" placeholder="Plateforme" >
		</div>
        <button type="submit" class="btn btn-primary">Rechercher</button>
		<a type="button" href="menu.php" class="btn btn-outline-danger">Retour</a>
    </div>
</form>
           


<?php


$query = "";


if ( $_SERVER['REQUEST_METHOD'] == 'POST') {


    $query = "SELECT * FROM Disponible_Sur WHERE true ";

    foreach($_POST as $key => $value){
        
        if(strlen($value) != 0){

            if (!ctype_digit($value) ) {
				
				$value = str_replace("'", "\'",$value);
                $query = $query."and ".$key . " LIKE '%" . $value . "%' " ;
            }


        }

        
    } 

}

display_disponible_sur($bdd,$query);

?>
           
        </div>

    </body>

    </html>