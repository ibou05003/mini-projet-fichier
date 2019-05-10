<?php
	if(empty($_SESSION))
	{
        session_start();
        if(!isset($_SESSION['profil'])){
            header("location:../index.php");
        }
	}
	else
	{
        session_destroy();
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>ACCUEIL</title>
</head>
<body>

<?php include_once 'header.php' ?>
    <div class="marge">
    

    <div class="container-fluid">
        <div class="row">
        <div class="col-12 text-center"><h1>ACCEUIL</h1></div>
            <div class="col-md-3 ou"><a href="logout.php"><center>DECONNEXION </center> </a></div>
            <div class="col-md-3 ou"> <a href="listerProduits.php"><center>LISTER PRODUIT</center> </a></div>
            <div class="col-md-3 ou"><a href="recherchreProduits.php"><center> RECHERCHER PRODUIT </center></a></div>
        </div>
    </div>

    <div class="container-fluid">
            <div class="row">
            <div class="col-md-3 ou"><a href="ajouterProduit.php"><center>  AJOUTER PRODUIT</center></a></div>
            <div class="col-md-3 ou"><a href="updateProduits.php"><center>  UPDATE PRODUIT</center></a></div>
            <div class="col-md-3 ou"><a href="supprimerProduits.php"><center>  SUPPRIMER PRODUIT</center></a></div>
            </div>
    </div>

    <?php 
        if($_SESSION['profil']=="Administrateur"){?>
            <div class="container-fluid">
            <div class="row">
            <div class="col-3"></div>
            <div class="col-md-3 ou"><a href="user.php"><center>  AJOUTER USER</center></a></div>
            <div class="col-md-3 ou"><a href="listeUsers.php"><center>  LISTE USERS</center></a></div>
            <div class="col-3"></div>
            </div>
    </div><?php
        }
    ?>
    
    </div>
    <?php include_once 'footer.php' ?>
</body>
</html>