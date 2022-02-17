<?php

include("functions.php");

forConnected();


 ?>

<?php include('db.php'); ?>


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
           
        <h1>Table Utilisateur</h1>


<form method="POST" action="#">
    <div class="form-row">
        <div class="col">
            <input name="numero" type="number" class="form-control" placeholder="Numero" >
        </div>
        <div class="col">
            <input name="adresse_email" type="text" class="form-control" placeholder="Adresse email" >
        </div>
        <button type="submit" class="btn btn-primary">Rechercher</button>
        <a type="button" href="menu.php" class="btn btn-outline-danger">Retour</a>
    </div>
</form>
           


<?php


$query = "";


if ( $_SERVER['REQUEST_METHOD'] == 'POST') {


    $query = "SELECT * FROM Utilisateur WHERE true ";

    foreach($_POST as $key => $value){
        
        if( strlen($value) != 0 ){

            $value = str_replace("'", "\'",$value);

            if ( ctype_digit($value) ) {
                
                $query .= "and " . $key . " = '" . $value . "' " ;

            }else{
                $query .= "and " . $key . " LIKE '%" . $value . "%' " ;
            }


        }

        
    } 

}

display_utilisateur($bdd,$query);


?>
           
        </div>

    </body>

    </html>