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
    <title>Recherche des Produits</title>
</head>
<body>
    <?php include_once 'header.php' ?>
    <div class="marge">
    <!-- Recherche de produits -->
    <div class="container">
        <div class="row">
            <div class="col-12 text-center"><h1>Rechercher Produits</h1></div>
        </div>
        <div class="offset-md-1 col-12 col-md-10">
            <form class="form-inline my-2 my-lg-0" method="post" action="">
                <input class="form-control mr-sm-2" type="number" min=1 name="seuil" placeholder="Entrer la quantité seuil" <?php if(!empty($_POST['seuil'])){echo'value="'.$_POST['seuil'].'"';}?>>
                <input class="form-control mr-sm-2" type="number" min=100 name="pmin" placeholder="Entrer le prix min" <?php if(!empty($_POST['pmin'])){echo'value="'.$_POST['pmin'].'"';}?>>
                <input class="form-control mr-sm-2" type="number" min=100 name="pmax" placeholder="Entrer le prix max" <?php if(!empty($_POST['pmax'])){echo'value="'.$_POST['pmax'].'"';}?>>
                <button class="btn btn-outline-success my-2 my-sm-0" name="rechercher" type="submit" value="rechercher">Rechercher</button>
            </form>
        </div>
    
    
    <?php
    $nomfile='../files/produit.csv';
    require_once 'liste.php';
    if(empty($_POST['rechercher'])){
        if(file_exists($nomfile)){ 
            afficheProduit();
        }
    }
    else{
        //si c'est la quantite qui est saisie et non les prix
        if(!empty($_POST['seuil']) && empty($_POST['pmin']) && empty($_POST['pmax'])){
            $seuil=$_POST['seuil'];
        //affichage
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
                                            if($seuil<=$tab[1]){
                                                if($tab[1]<=10){
                                                    echo "<tr class='text-center table-danger'>";
                                                }
                                                else{
                                                    echo "<tr class='text-center'>";
                                                }
                                                echo "<td>".$i."</td>";
                                                echo "<td>".$tab[0]."</td>";
                                                echo "<td>".$tab[1]."</td>";
                                                echo "<td>".$tab[2]."</td>";
                                                echo "<td>".$tab[3]."</td>";
                                                echo "</tr>";
                                                $i++;
                                            }
                                        }
                                        fclose($f);
                                    ?>
                                </tbody>
                            </table> <?php
        }
        elseif(empty($_POST['seuil']) && !empty($_POST['pmin']) && empty($_POST['pmax'])){
            $pmin=$_POST['pmin'];
        //affichage
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
                                            if($pmin<=$tab[2]){
                                                if($tab[1]<=10){
                                                    echo "<tr class='text-center table-danger'>";
                                                }
                                                else{
                                                    echo "<tr class='text-center'>";
                                                }
                                                echo "<td>".$i."</td>";
                                                echo "<td>".$tab[0]."</td>";
                                                echo "<td>".$tab[1]."</td>";
                                                echo "<td>".$tab[2]."</td>";
                                                echo "<td>".$tab[3]."</td>";
                                                echo "</tr>";
                                                $i++;
                                            }
                                        }
                                        fclose($f);
                                    ?>
                                </tbody>
                            </table> <?php
        }
        elseif(empty($_POST['seuil']) && empty($_POST['pmin']) && !empty($_POST['pmax'])){
            $pmax=$_POST['pmax'];
        //affichage
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
                                            if($pmax>=$tab[2]){
                                                if($tab[1]<=10){
                                                    echo "<tr class='text-center table-danger'>";
                                                }
                                                else{
                                                    echo "<tr class='text-center'>";
                                                }
                                                echo "<td>".$i."</td>";
                                                echo "<td>".$tab[0]."</td>";
                                                echo "<td>".$tab[1]."</td>";
                                                echo "<td>".$tab[2]."</td>";
                                                echo "<td>".$tab[3]."</td>";
                                                echo "</tr>";
                                                $i++;
                                            }
                                        }
                                        fclose($f);
                                    ?>
                                </tbody>
                            </table> <?php
        }
        elseif(empty($_POST['seuil']) && !empty($_POST['pmin']) && !empty($_POST['pmax'])){
            //l'utilisateur saisi le pmin et le pmax
            $pmin=$_POST['pmin'];
            $pmax=$_POST['pmax'];
            if($pmin<$pmax){
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
                                            if($pmin<=$tab[2] && $pmax>=$tab[2]){
                                                if($tab[1]<=10){
                                                    echo "<tr class='text-center table-danger'>";
                                                }
                                                else{
                                                    echo "<tr class='text-center'>";
                                                }
                                                echo "<td>".$i."</td>";
                                                echo "<td>".$tab[0]."</td>";
                                                echo "<td>".$tab[1]."</td>";
                                                echo "<td>".$tab[2]."</td>";
                                                echo "<td>".$tab[3]."</td>";
                                                echo "</tr>";
                                                $i++;
                                            }
                                        }
                                        fclose($f);
                                    ?>
                                </tbody>
                            </table> <?php
            }
            else{
                echo 'le prix minimum ne doit pas etre  superieur au prix max';
                afficheProduit();
            }
        }
        elseif(!empty($_POST['seuil']) && !empty($_POST['pmin']) && !empty($_POST['pmax'])){
            //l'utilisateur saisi toutes les valeurs
            $seuil=$_POST['seuil'];
            $pmin=$_POST['pmin'];
            $pmax=$_POST['pmax'];
            if($pmin<$pmax){
                //affichage
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
                                            if($seuil<=$tab[1] && $pmin<=$tab[2] && $pmax>=$tab[2]){
                                                if($tab[1]<=10){
                                                    echo "<tr class='text-center table-danger'>";
                                                }
                                                else{
                                                    echo "<tr class='text-center'>";
                                                }
                                                echo "<td>".$i."</td>";
                                                echo "<td>".$tab[0]."</td>";
                                                echo "<td>".$tab[1]."</td>";
                                                echo "<td>".$tab[2]."</td>";
                                                echo "<td>".$tab[3]."</td>";
                                                echo "</tr>";
                                                $i++;
                                            }
                                        }
                                        fclose($f);
                                    ?>
                                </tbody>
                            </table> <?php
            }
            else{
                echo 'le prix minimum ne doit pas etre  superieur au prix max';
                afficheProduit();
            }
        }
        elseif(!empty($_POST['seuil']) && !empty($_POST['pmin']) && empty($_POST['pmax'])){
            //l'utilisateur saisi le seuil et pmin
            $seuil=$_POST['seuil'];
            $pmin=$_POST['pmin'];
            
                //affichage
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
                                                if($seuil<=$tab[1] && $pmin<=$tab[2]){
                                                    if($tab[1]<=10){
                                                        echo "<tr class='text-center table-danger'>";
                                                    }
                                                    else{
                                                        echo "<tr class='text-center'>";
                                                    }
                                                    echo "<td>".$i."</td>";
                                                    echo "<td>".$tab[0]."</td>";
                                                    echo "<td>".$tab[1]."</td>";
                                                    echo "<td>".$tab[2]."</td>";
                                                    echo "<td>".$tab[3]."</td>";
                                                    echo "</tr>";
                                                    $i++;
                                                }
                                            }
                                            fclose($f);
                                        ?>
                                    </tbody>
                                </table> <?php
            
        }
        elseif(empty($_POST['seuil']) && empty($_POST['pmin']) && empty($_POST['pmax'])){
            echo 'vous n\'avez selectionné aucun critere de recherche';
            afficheProduit();
        }
        else{
            $seuil=$_POST['seuil'];
            $pmax=$_POST['pmax'];
            
                //affichage
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
                                            if($seuil<=$tab[1] && $pmax>=$tab[2]){
                                                if($tab[1]<=10){
                                                    echo "<tr class='text-center table-danger'>";
                                                }
                                                else{
                                                    echo "<tr class='text-center'>";
                                                }
                                                echo "<td>".$i."</td>";
                                                echo "<td>".$tab[0]."</td>";
                                                echo "<td>".$tab[1]."</td>";
                                                echo "<td>".$tab[2]."</td>";
                                                echo "<td>".$tab[3]."</td>";
                                                echo "</tr>";
                                                $i++;
                                            }
                                        }
                                        fclose($f);
                                    ?>
                                </tbody>
                            </table> <?php
        }
    }
?>
</div>
</div>
    <?php include_once 'footer.php' ?>
</body>
</html>