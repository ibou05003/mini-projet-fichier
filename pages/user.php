<?php
	if(empty($_SESSION))
	{
        session_start();
        if(!isset($_SESSION['profil'])){
            header("location:../index.php");
        }
        else{
            if($_SESSION['profil']=="Utilisateur"){
                header("location:acceuil.php");
            }
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
    <title>Ajouter User</title>
</head>
<body>
<?php include_once 'header.php' ?>
    <div class="marge">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center"><h1>Ajout Utilisateur</h1></div>
        </div>
<div class="offset-md-3 col-12 col-md-6">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" required class="form-control" name="login" id="login" placeholder="Entrer le login">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" required class="form-control" name="password" id="password" placeholder="Entrer le mot de passe">
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" required class="form-control" name="nom" id="nom" placeholder="Entrer le nom">
                </div>
                <div class="form-group">
                    <label for="tel">Telephone</label>
                    <input type="number" min=300000000 max=790000000 required class="form-control" name="tel" id="tel" placeholder="Entrer le téléphone">
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" required class="form-control" name="adresse" id="adresse" placeholder="Entrer l'adresse">
                </div>
                <div class="form-group">
                    <label for="profil">Profil</label>
                    <select class="form-control" id="profil" name="profil">
                    <option value="Administrateur">Administrateur</option>
                    <option value="Utilisateur">Utilisateur</option>
                    </select>
                </div>
                <button type="submit" value="ajouter" name="ajouter" class="btn btn-primary">Ajouter</button>
            </form>
        </div>

    <?php
        $nomfile='../files/user.csv';
        require_once 'liste.php';
        if(empty($_POST['ajouter'])){
            
            if(file_exists($nomfile)){ 
                afficheUser();
            }
        }
        else{
            $login=$_POST['login'];
            $mdp=$_POST['password'];
            $nom=$_POST['nom'];
            $tel=$_POST['tel'];
            $adr=$_POST['adresse'];
            $profil=$_POST['profil'];
            $statut="bloquer?";
            $nb=0;
            $t=false;
			if(file_exists($nomfile)){
                $f=fopen("../files/user.csv","r");
			while($tab=fgetcsv($f,1000,";"))
			{
				if(strcasecmp($login,$tab[0])==0)
				{
					echo "ce login est déjà enregistré";
					$t=true;
				}
			}
			fclose($f);
            }
			if($t==false)
			{
				$ch=$login.";".$mdp.";".$nom.";".$tel.";".$adr.";".$profil.";".$statut.";".$nb."\n";
				$f=fopen("../files/user.csv","a");
				fputs($f,$ch);
			    fclose($f);
                }
                afficheUser();
			}
    
    ?>
    </div>
        </div>
    <?php include_once 'footer.php' ?>
</body>
</html>