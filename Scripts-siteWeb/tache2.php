<?php

include("functions.php");

forConnected();


 ?>

<?php include('db.php'); ?>


    <!doctype html>
    <html lang="fr">

    <head>
        <meta charset="utf-8">

        <title>Groupe 29: Pays où les plateformes sont disponibles</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">

    </head>

    <body class="text-center">

        <div class="container">
           
        <h1>Pays où les plateformes sont disponibles</h1>


<form method="POST" action="#">

    <div class="input-group mb-3">
        <input name="nom" type="text" class="form-control" placeholder="Plateforme">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" >Rechercher</button>
            <a type="button" href="menu.php" class="btn btn-outline-danger">Retour</a>
        </div>
    </div>
</form>
           


<?php


$query = "";


if ( $_SERVER['REQUEST_METHOD'] == 'POST') {

    
    if ( isset($_POST['nom']) && !empty($_POST['nom'])) {

        $nom = str_replace("'", "\'",$_POST["nom"]);

        $query = "SELECT pays FROM Pays WHERE nom = '$nom' ";
        

        try {  

            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $bdd->beginTransaction();

            $query = $bdd->prepare($query);
            $query->execute();

            if($query->rowCount()){
                
            $result = $query -> fetchAll();

            echo '<table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Plateforme</th>
                        <th scope="col">Pays</th>
                        </tr>
                    </thead>

                    <tbody>';
        



            foreach( $result as $row ) {

                echo '<tr>';

                echo '<td>'.$nom.'</td>';
                echo '<td>'.htmlentities($row['pays']).'</td>';

                echo '</tr>';

            }

            echo '</tbody>
            </table>';

            }else{
                echo "Plateforme ".$nom." introuvable.";
				
            }


            $bdd->commit();
            
            } catch (Exception $e) {
                $bdd->rollBack();
                echo "Failed: " . $e->getMessage();
            }

    }

}

?>
           
        </div>

    </body>

    </html>