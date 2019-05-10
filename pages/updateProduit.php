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
    <title>Modification d'un Produit</title>
</head>
<body>
    <?php include_once 'header.php' ?>
    <!-- Recherche de produits à partir du seuil -->
    <div class="marge">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center"><h1>Modifier un Produit</h1></div>
        </div>
        <div class="offset-md-3 col-12 col-md-6">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" required class="form-control" name="nom" id="nom" placeholder="Entrer le nom du produit à modifier">
                </div>
                <div class="form-group">
                    <label for="quantite">Quantité</label>
                    <input type="number" min=1 required class="form-control" name="quantite" id="quantite" placeholder="Entrer la quantité">
                </div>
                <div class="form-group">
                    <label for="prix">Prix Unitaire</label>
                    <input type="number" min=100 required class="form-control" name="prix" id="prix" placeholder="Entrer le prix unitaire">
                </div>
                <button type="submit" value="modifier" name="modifier" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    
    
    <?php
    $nomfile='../files/produit.csv';
    require_once 'liste.php';
    if(empty($_POST['modifier'])){
        if(file_exists($nomfile)){ 
            afficheProduit();
        }
    }
    else{
            $nom=$_POST['nom'];
            $qte=$_POST['quantite'];
            $prix=$_POST['prix'];
            $mtt=$qte*$prix;
            $t=false;
            $ch="";
			if(file_exists($nomfile)){
                $f=fopen("../files/produit.csv","r");
			while($tab=fgetcsv($f,1000,";"))
			{
				if(strcasecmp($nom,$tab[0])==0)
				{
                    $t=true;
                    $ch=$ch.$tab[0].";".$qte.";".$prix.";".$mtt."\n";
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
                ?>
            <center><h1>Liste des produits</h1></center>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead class="thead-dark">
                                    <tr class='text-center'>
                                        <th>#</th>
                                        <th>Nom Produit</th>
                                        <th>Quantité</th>
                                        <th>Prix Unitaire</th>
                                        <th>Montant</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $f=fopen("../files/produit.csv","r");
                                        $i=1;
                                        while($tab=fgetcsv($f,1000,";"))
                                        {
                                            if($tab[1]<=10){
                                                echo "<tr class='text-center table-danger'>";
                                            }
                                            else{
                                                echo "<tr class='text-center'>";
                                            }
                                            if($tab[0]==$nom){
                                                echo "<tr class='text-center table-success'>";
                                            }
                                            echo "<td>".$i."</td>";
                                            echo "<td>".$tab[0]."</td>";
                                            echo "<td>".$tab[1]."</td>";
                                            echo "<td>".$tab[2]."</td>";
                                            echo "<td>".$tab[3]."</td>";
                                            echo "</tr>";
                                            $i++;
                                        }
                                        fclose($f);
                                    ?>
                                </tbody>
                            </table> <?php
            }
            else{
                echo 'ce nom de produit n\'existe pas';
                afficheProduit();
            }
                
	}
?>
</div>
</div>
    <?php include_once 'footer.php' ?>
</body>
</html>