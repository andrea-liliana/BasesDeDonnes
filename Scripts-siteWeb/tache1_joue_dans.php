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
           
        <h1>Table Joue_Dans</h1>


<form method="POST" action="#">
    <div class="form-row">
        <div class="col">
            <input name="numero" type="number" class="form-control" placeholder="Numero" >
        </div>
        <div class="col">
            <input name="n_saison" type="number" class="form-control" placeholder="Saison" >
        </div>
        <div class="col">
            <input name="n_episode" type="number" class="form-control" placeholder="Episode" >
        </div>
        <div class="col-3">
            <input  name="nom" type="text" class="form-control"   placeholder="Serie" >
        </div>
        <button type="submit" class="btn btn-primary">Rechercher</button>
		<a type="button" href="menu.php" class="btn btn-outline-danger">Retour</a>
    </div>
</form>
           


<?php


$query = "";


if ( $_SERVER['REQUEST_METHOD'] == 'POST') {


    $query = "SELECT * FROM Joue_Dans WHERE true ";

    foreach($_POST as $key => $value){
        
        if(strlen($value) != 0){
			
			$value = str_replace("'", "\'",$value);

            if (ctype_digit($value)) {
                
                $query = $query."and " . $key . " = '" . $value . "' " ;

            }else{
                $query = $query."and " . $key . " LIKE '%" . $value . "%' " ;
            }
   
		} 

	}
}

display_joue_dans($bdd,$query);



?>
           
        </div>

    </body>

    </html>