<?php

include("functions.php");

forConnected();


 ?>

<?php include('db.php'); ?>


    <html lang="fr">
    <html lang="en">

    <head>
        <meta charset="utf-8">

        <title>Groupe 29 : Selection et affichage de tuples</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">

    </head>

    <body class="text-center">

        <div class="container">
           
        <h1>Table Acteur</h1>


<form method="POST" action="#">
    <div class="form-row">
        <div class="col">
            <input name="numero" type="number" class="form-control" placeholder="Numero" >
        </div>

        <div class="col">
            <input name="golden_globes" type="number" class="form-control" placeholder="Golden Globes" >
        </div>

        <div class="col">
            <input name="emmay_awards" type="number" class="form-control" placeholder="Emmy awards" >
        </div>
        
        <button type="submit" class="btn btn-primary">Rechercher</button>
        <a type="button" href="menu.php" class="btn btn-outline-danger">Retour</a>
    </div>
</form>
           


<?php



$query = "";


if ( $_SERVER['REQUEST_METHOD'] == 'POST') {


    $query = "SELECT * FROM Acteur WHERE true ";

    foreach($_POST as $key => $value){
        
        if( strlen($value) != 0 ){ //Pas vérifier qu'on donne bien un chaine de caratère?

            $value = str_replace("'", "\'",$value);
        
            $query .= "and " . $key . " = '" . $value . "' " ;

        
    } 

}

}

display_acteur($bdd,$query);












?>
           
        </div>

    </body>

    </html>