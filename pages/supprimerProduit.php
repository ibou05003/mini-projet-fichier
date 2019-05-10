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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="../css/style.css">
    <title>Suppression de Produit</title>
</head>
<body>
    <?php include_once 'header.php' ?>
    <div class="marge">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center"><h1>Rechercher Produit à Supprimer</h1></div>
        </div>
        <div class="offset-md-3 col-12 col-md-6">
            <form class="form-inline my-2 my-lg-0" method="post" action="">
                <input class="form-control mr-sm-2" type="text" required name="nom" placeholder="Nom produit à supprimer">
                <button class="btn btn-outline-success my-2 my-sm-0" name="supprimer" type="submit" value="supprimer">Supprimer</button>
            </form>
        </div>
    
    
    <?php
    $nomfile='../files/produit.csv';
    require_once 'liste.php';
    if(empty($_POST['supprimer'])){
        if(file_exists($nomfile)){ 
            afficheProduit();
        }
    }
    else{
        $nom=$_POST['nom'];
            $t=false;
            $ch="";
			if(file_exists($nomfile)){
                $f=fopen("../files/produit.csv","r");
			while($tab=fgetcsv($f,1000,";"))
			{
				if(strcasecmp($nom,$tab[0])==0)
				{
                    $t=true;
                }
                else{
                    $ch=$ch.$tab[0].";".$tab[1].";".$tab[2].";".$tab[3]."\n";
                }
			}
			fclose($f);
            }
			if($t==true)
			{
				$f=fopen("../files/produit.csv","w");
				fputs($f,$ch);
			    fclose($f);
            }
            else{
                echo 'ce nom de produit n\'existe pas';
            }
                afficheProduit();
	}

?>
</div>
</div>
    <?php include_once 'footer.php' ?>
</body>
</html>