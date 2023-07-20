
<?php
session_start();
    // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
        exit(); 
    }
?>
 
<!DOCTYPE html>
<h1>Erreur 404</h1>
<h3>La page recherchée est inexistante</h3>
</html>