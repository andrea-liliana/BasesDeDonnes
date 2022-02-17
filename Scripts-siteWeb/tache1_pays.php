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
           
        <h1>Table Pays</h1>


<form method="POST" action="#">
    <div class="form-row">
        <div class="col">
            <input name="nom" type="text" class="form-control" placeholder="Plateforme" >
        </div>
        <div class="col">
            <input name="ordre" type="number" class="form-control" placeholder="Ordre" >
        </div>
        <div class="col">
            <input name="pays" type="text" class="form-control" placeholder="Pays" >
        </div>

        <button type="submit" class="btn btn-primary">Rechercher</button>
        <a type="button" href="menu.php" class="btn btn-outline-danger">Retour</a>
    </div>
</form>
           


<?php


$query = "";


if ( $_SERVER['REQUEST_METHOD'] == 'POST') {


    $query = "SELECT * FROM Pays WHERE true ";

    foreach($_POST as $key => $value){
        
        if( strlen($value) != 0 ){

            $value = str_replace("'", "\'",$value);

            if (ctype_digit($value) ) {
                
                $query .= "and " . $key . " = '" . $value . "' " ;

            }else{
                $query .= "and " . $key . " LIKE '%" . $value . "%' " ;
            }

        }

        
    } 

}

display_pays($bdd,$query);


?>
           
        </div>

    </body>

    </html>