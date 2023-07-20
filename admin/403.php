
<?php
session_start();
    // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
        exit(); 
    }
?>
 
<!DOCTYPE html>
<html>
<h1>Erreur 403</h1>
<h3>L'affichage de cette page n'est pas autorisé</h3>
</html>