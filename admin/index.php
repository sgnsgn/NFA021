<!DOCTYPE html>
<html>
    <head>

    <div id="content">
            
            <a href='index.php?deconnexion=true'><div>Déconnexion</div></a>
            
            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:login.php");
                   }
                }
                if(!isset($_SESSION["username"])){
                    header("Location: login.php");
                    exit(); 
                }                
            ?>
            
        </div>

        <title>NFA021 Burger Site - Admin dashboard</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1 class="text-logo"><span class="bi-shop"></span> NFA021 Burger Site <span class="bi-shop"></span></h1>
            <div class="container admin">
                <div class="row">
                    <h1><strong>Liste des items   </strong><a href="insert.php" class="btn btn-success btn-lg"><span class="bi-plus"></span> Ajouter</a></h1>
                    <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Catégorie</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require('database.php');
                        $db = Database::connect();
                        $statement = $db->query('
                        SELECT items.id, items.name, items.description, items.price, categories.name AS category 
                        FROM items INNER JOIN categories ON items.category = categories.id
                        ORDER BY items.id DESC;
                        ');

                        // checkPoint : Var Dump pour checker le résultat de la requete
                        // var_dump($statement->fetchAll(PDO::FETCH_ASSOC));

                        while($item = $statement->fetch()){
                            echo '<tr>';
                            echo '<td>' . $item['name'] . '</td>';
                            echo '<td>' . $item['description'] . '</td>';
                            echo '<td>' . number_format((float)$item['price'],2,'.','') . '€</td>';
                            echo '<td>' . $item['category'] . '</td>';
                            echo '<td width=330>';
                            echo '<a class="btn btn-secondary" href="view.php?id=' . $item['id'] . '"><span class="bi-eye"></span> Voir</a>';
                            echo ' ';
                            echo '<a class="btn btn-primary" href="update.php?id=' . $item['id'] . '"><span class="bi-pencil"></span> Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id=' . $item['id'] . '"><span class="bi-x"></span> Supprimer</a>';  
                            echo ' ';                     
                            echo '</td>';
                        }

                        Database::disconnect();

                        ?>

                    </tbody>                
                </div>                
            </div>
        
    </body>
    
</html>