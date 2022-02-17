<?php

header('X-XSS-Protection:0');

function forConnected()
{
    session_start();

    if ( !isset( $_SESSION['login'] )) {
        
        header('Location: index.php');   
        $_SESSION['message'] = "Vous n'êtes pas connecte";
    }
}




function forNotConnected()
{
    session_start();

    if ( isset( $_SESSION['login'] )) {
        
        header('Location: menu.php');     
        $_SESSION['message'] = "Vous etes deja connecte!";
    }
}

function logOut()
{
    session_start();

    if (isset( $_SESSION['login'])) {
        unset($_SESSION['login']);

        $_SESSION['message'] = "Vous etes deonnecte";

        header('Location: index.php');  
    }
    
}


function display_personne($bdd, $query){


    if ( $query == "") {
        $query = "SELECT * FROM Personne";
    }

    try {  
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $bdd->beginTransaction();

        $query = $bdd->prepare($query);
        $query->execute();

        $result = $query -> fetchAll();

        echo '<table class="table">
                <thead>
                    <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Date de naissance</th>
                    </tr>
                </thead>

                <tbody>';
  



        foreach( $result as $row ) {

            echo '<tr>';
            echo '<th scope="row">'.$row['numero'].'</th>';
            echo '<td>'.$row['nom'].'</td>';
            echo '<td>'.$row['prenom'].'</td>';
            echo '<td>'.$row['date_naissance'].'</td>';
            echo '</tr>';
 
        }

        echo '</tbody>
        </table>';

        $bdd->commit();
      
      } catch (Exception $e) {
        $bdd->rollBack();
        echo "Failed: " . $e->getMessage();
      }


}

function display_serie($bdd, $query){


    if ( $query == "") {
        $query = "SELECT * FROM Serie";
    }

    try {  
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $bdd->beginTransaction();

        $query = $bdd->prepare($query);
        $query->execute();

        $result = $query -> fetchAll();

        echo '<table class="table">
                <thead>
                    <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    </tr>
                </thead>

                <tbody>';
  



        foreach( $result as $row ) {

            echo '<tr>';

            echo '<td>'.$row['nom'].'</td>';
            echo '<td>'.$row['description'].'</td>';

            echo '</tr>';
 
        }

        echo '</tbody>
        </table>';

        $bdd->commit();
      
      } catch (Exception $e) {
        $bdd->rollBack();
        echo "Failed: " . $e->getMessage();
      }


}



function display_episode($bdd, $query){


    if ( $query == "") {
        $query = "SELECT * FROM Episodes";
    }

    try {  
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $bdd->beginTransaction();

        $query = $bdd->prepare($query);
        $query->execute();

        $result = $query -> fetchAll();

        echo '<table class="table">
                <thead>
                    <tr>
                    <th scope="col">Saison</th>
                    <th scope="col">Episode</th>
                    <th scope="col">Duree</th>
                    <th scope="col">Synopsis</th>
                    <th scope="col">Serie</th>
                    </tr>
                </thead>

                <tbody>';
  



        foreach( $result as $row ) {

            echo '<tr>';

            echo '<td>'.$row['n_saison'].'</td>';
            echo '<td>'.$row['n_episode'].'</td>';
            echo '<td>'.$row['duree'].'</td>';
            echo '<td>'.$row['synopsis'].'</td>';
            echo '<td>'.$row['nom'].'</td>';

            echo '</tr>';
 
        }

        echo '</tbody>
        </table>';

        $bdd->commit();
      
      } catch (Exception $e) {
        $bdd->rollBack();
        echo "Failed: " . $e->getMessage();
      }


}


function display_acteur($bdd, $query){


    if ( $query == "") {
        $query = "SELECT * FROM Acteur";
    }

    try {  
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $bdd->beginTransaction();

        $query = $bdd->prepare($query);
        $query->execute();

        $result = $query -> fetchAll();

        echo '<table class="table">
                <thead>
                    <tr>
                    <th scope="col">Acteur</th>
                    <th scope="col">Golden Globes</th>
                    <th scope="col">Emmy Awards</th>
                    </tr>
                </thead>

                <tbody>';
  



        foreach( $result as $row ) {

            echo '<tr>';

            echo '<td>'.$row['numero'].'</td>';
            echo '<td>'.$row['golden_globes'].'</td>';
            echo '<td>'.$row['emmay_awards'].'</td>';


            echo '</tr>';
 
        }

        echo '</tbody>
        </table>';

        $bdd->commit();
      
      } catch (Exception $e) {
        $bdd->rollBack();
        echo "Failed: " . $e->getMessage();
      }


}

function display_utilisateur($bdd,$query){
    
     if ( $query == "") {
            $query = "SELECT * FROM Utilisateur";
        }

    try {  

   
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $bdd->beginTransaction();

        $query = $bdd->prepare($query);
        $query->execute();

        $result = $query -> fetchAll();

        echo '<table class="table">
                <thead>
                    <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Adresse email</th>
                      </tr>
                </thead>

                <tbody>';
  



        foreach( $result as $row ) {

            echo '<tr>';

            echo '<td>'.$row['numero'].'</td>';
            echo '<td>'.$row['adresse_email'].'</td>';

            echo '</tr>';
 
        }

        echo '</tbody>
        </table>';

        $bdd->commit();
      
      } catch (Exception $e) {
        $bdd->rollBack();
        echo "Failed: " . $e->getMessage();
      }


}




function display_pays($bdd,$query){
    
    if ( $query == "") {
           $query = "SELECT * FROM Pays";
       }

   try {  

  
       $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $bdd->beginTransaction();

       $query = $bdd->prepare($query);
       $query->execute();

       $result = $query -> fetchAll();

       echo '<table class="table">
               <thead>
                   <tr>
                   <th scope="col">Plateforme</th>
                   <th scope="col">Ordre</th>
                   <th scope="col">Pays</th>
                     </tr>
               </thead>

               <tbody>';
 



       foreach( $result as $row ) {

           echo '<tr>';

           echo '<td>'.$row['nom'].'</td>';
           echo '<td>'.$row['ordre'].'</td>';
           echo '<td>'.$row['pays'].'</td>';

           echo '</tr>';

       }

       echo '</tbody>
       </table>';

       $bdd->commit();
     
     } catch (Exception $e) {
       $bdd->rollBack();
       echo "Failed: " . $e->getMessage();
     }


}

function display_disponible_sur($bdd,$query){
	
	if ( $query == "") {
        $query = "SELECT * FROM Disponible_Sur";
    }

    try {  
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $bdd->beginTransaction();

        $sql = $bdd->prepare($query);
        $sql->execute();

        $result = $sql -> fetchAll();

        echo '<table class="table">
                <thead>
                    <tr>
                    <th scope="col">Serie</th>
                    <th scope="col">Plateforme</th>
                    </tr>
                </thead>

                <tbody>';
  



        foreach( $result as $row ) {

            echo '<tr>';

            echo '<td>'.$row['nom_serie'].'</td>';
            echo '<td>'.$row['nom_platf'].'</td>';

            echo '</tr>';
 
        }

        echo '</tbody>
        </table>';

        $bdd->commit();
      
      } catch (Exception $e) {
        $bdd->rollBack();
        echo "Failed: " . $e->getMessage();
      }
	
}

function display_est_abonne($bdd,$query) {
	
	if ( $query == "") {
        $query = "SELECT * FROM Est_Abonne";
    }

    try {  
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $bdd->beginTransaction();

        $sql = $bdd->prepare($query);
        $sql->execute();

        $result = $sql -> fetchAll();

        echo '<table class="table">
                <thead>
                    <tr>
                    <th scope="col">Date de debut</th>
                    <th scope="col">Date de fin</th>
					<th scope="col">Numero</th>
					<th scope="col">Plateforme</th>
                    </tr>
                </thead>

                <tbody>';
  



        foreach( $result as $row ) {

            echo '<tr>';

            echo '<td>'.$row['date_debut'].'</td>';
            echo '<td>'.$row['date_fin'].'</td>';
			echo '<td>'.$row['numero'].'</td>';
			echo '<td>'.$row['nom'].'</td>';

            echo '</tr>';
 
        }

        echo '</tbody>
        </table>';

        $bdd->commit();
      
      } catch (Exception $e) {
        $bdd->rollBack();
        echo "Failed: " . $e->getMessage();
      }
	
}

function display_joue_dans($bdd,$query) {
	
	if ( $query == "") {
        $query = "SELECT * FROM Joue_Dans";
    }

    try {  
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $bdd->beginTransaction();

        $sql = $bdd->prepare($query);
        $sql->execute();

        $result = $sql -> fetchAll();

        echo '<table class="table">
                <thead>
                    <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Saison</th>
					<th scope="col">Episode</th>
					<th scope="col">Serie</th>
                    </tr>
                </thead>

                <tbody>';
  



        foreach( $result as $row ) {

            echo '<tr>';

            echo '<td>'.$row['numero'].'</td>';
            echo '<td>'.$row['n_saison'].'</td>';
			echo '<td>'.$row['n_episode'].'</td>';
			echo '<td>'.$row['nom'].'</td>';

            echo '</tr>';
 
        }

        echo '</tbody>
        </table>';

        $bdd->commit();
      
      } catch (Exception $e) {
        $bdd->rollBack();
        echo "Failed: " . $e->getMessage();
      }
	
}

function display_plateforme_streaming($bdd,$query) {
	
	if ( $query == "") {
        $query = "SELECT * FROM Plateforme_streaming";
    }

    try {  
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $bdd->beginTransaction();

        $sql = $bdd->prepare($query);
        $sql->execute();

        $result = $sql -> fetchAll();

        echo '<table class="table">
                <thead>
                    <tr>
                    <th scope="col">Plateforme</th>
                    <th scope="col">Societe</th>
                    </tr>
                </thead>

                <tbody>';
  



        foreach( $result as $row ) {

            echo '<tr>';

            echo '<td>'.$row['nom'].'</td>';
            echo '<td>'.$row['societe'].'</td>';

            echo '</tr>';
 
        }

        echo '</tbody>
        </table>';

        $bdd->commit();
      
      } catch (Exception $e) {
        $bdd->rollBack();
        echo "Failed: " . $e->getMessage();
      }
	
}

function display_regarde($bdd,$query){
	
	if ( $query == "") {
        $query = "SELECT * FROM Regarde";
    }

    try {  
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $bdd->beginTransaction();

        $sql = $bdd->prepare($query);
        $sql->execute();

        $result = $sql -> fetchAll();

        echo '<table class="table">
                <thead>
                    <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Plateforme</th>
					<th scope="col">Episode</th>
					<th scope="col">Saison</th>
					<th scope="col">Serie</th>
					<th scope="col">Date de debut</th>
                    </tr>
                </thead>

                <tbody>';
  



        foreach( $result as $row ) {

            echo '<tr>';

            echo '<td>'.$row['numero'].'</td>';
            echo '<td>'.$row['nom_platf'].'</td>';
			echo '<td>'.$row['n_episode'].'</td>';
			echo '<td>'.$row['n_saison'].'</td>';
			echo '<td>'.$row['nom_serie'].'</td>';
			echo '<td>'.$row['date_debut'].'</td>';

            echo '</tr>';
 
        }

        echo '</tbody>
        </table>';

        $bdd->commit();
      
      } catch (Exception $e) {
        $bdd->rollBack();
        echo "Failed: " . $e->getMessage();
      }
	
}

function unsetVar(){
	if (isset( $_SESSION["n_saison"])) {
        unset($_SESSION["n_saison"]);
		unset($_SESSION["n_episode"]);
		unset($_SESSION["nom"]);
	}
}

?>