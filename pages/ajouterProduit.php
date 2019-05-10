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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../css/style.css">
    <title>Ajouter Produit</title>
</head>
<body>
<?php include_once 'header.php' ?>
    <div class="marge">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center"><h1>Ajout Produit</h1></div>
        </div>
<div class="offset-md-3 col-12 col-md-6">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" required class="form-control" name="nom" id="nom" placeholder="Entrer le nom du produit">
                </div>
                <div class="form-group">
                    <label for="quantite">Quantité</label>
                    <input type="number" min=1 required class="form-control" name="quantite" id="quantite" placeholder="Entrer la quantité">
                </div>
                <div class="form-group">
                    <label for="prix">Prix Unitaire</label>
                    <input type="number" min=100 required class="form-control" name="prix" id="prix" placeholder="Entrer le prix unitaire">
                </div>
                <button type="submit" value="ajouter" name="ajouter" class="btn btn-primary">Ajouter</button>
            </form>
        </div>

    <?php
        $nomfile='../files/produit.csv';
        require_once 'liste.php';
        if(empty($_POST['ajouter'])){
            
            if(file_exists($nomfile)){ 
                afficheProduit();
            }
        }
        else{
            $nom=$_POST['nom'];
            $qte=$_POST['quantite'];
            $prix=$_POST['prix'];
            $mtt=$qte*$prix;
<<<<<<< HEAD
=======
            $ligne=10;
            $col=4;
>>>>>>> 457d4d8a723a24d8103a20fbce69aaa96743e611
            $t=false;
			if(file_exists($nomfile)){
                $f=fopen("../files/produit.csv","r");
			while($tab=fgetcsv($f,1000,";"))
			{
				if(strcasecmp($nom,$tab[0])==0)
				{
					echo "ce produit est déjà enregistré";
					$t=true;
				}
			}
			fclose($f);
            }
			if($t==false)
			{
				$ch=$nom.";".$qte.";".$prix.";".$mtt."\n";
				$f=fopen("../files/produit.csv","a");
				fputs($f,$ch);
			    fclose($f);
                }
                afficheProduit();
			}
    
    ?>
    </div>
        </div>
    <?php include_once 'footer.php' ?>
</body>
</html>
