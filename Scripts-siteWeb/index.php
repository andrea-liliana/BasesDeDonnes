<?php

include("credentials.php");
include("functions.php");


forNotConnected();
		

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
    if ( isset($_POST['login']) && isset($_POST['pass']) && !empty($_POST['login']) && !empty($_POST['pass'])  ) {
        
        $my_login = $_POST['login'];
        $my_pass = $_POST['pass'];

        if ( $my_login == $login && $my_pass == $pass) {
            
            $_SESSION['login'] = $login;
            header('Location: menu.php');  

        }else{
            $_SESSION['message'] = "Login ou mot de passe invalide";
        }
    }




}


?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">

    <title>Groupe 29 : Accueil</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body class="text-center">
    <form class="form-signin" method="POST" action="">



        <h1 class="h3 mb-3 font-weight-normal">Bienvenue sur l'interface du groupe 29<br /><br />Connectez-vous</h1>

<?php

if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-dark' role='alert'>";

    echo $_SESSION['message'];

    echo "</div>";

    unset($_SESSION['message']);
}


?>
        


        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="login" id="inputEmail" class="form-control" placeholder="Login"  required autofocus>
        
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Mot de passe" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>


    </form>
</body>





</html>

