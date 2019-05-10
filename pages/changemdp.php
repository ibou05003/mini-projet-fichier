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
    <title>Change Password</title>
</head>
<body>
<?php include_once 'header.php' ?>
    <div class="marge">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center"><h1>Réinitialiser Mot De Passe</h1></div>
        </div>
<div class="offset-md-3 col-12 col-md-6">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="password">Nouveau Mot de passe</label>
                    <input type="password" required class="form-control" name="password" id="password" placeholder="Entrer le mot de passe">
                </div>
                <button type="submit" value="modifier" name="modifier" class="btn btn-primary">Modifier</button>
            </form>
        </div>

    <?php
        if(isset($_POST['modifier'])){
            $mdp=$_POST['password'];
            $ch="";
            $f=fopen("../files/user.csv","r");
            while($tab=fgetcsv($f,1000,";"))
            {
                if($tab[0]==$_SESSION['login'])
                {
                    $tab[1]=$mdp;
                    $tab[7]++;
                }
                $ch=$ch.$tab[0].";".$tab[1].";".$tab[2].";".$tab[3].";".$tab[4].";".$tab[5].";".$tab[6].";".$tab[7]."\n";
                
            }
            fclose($f);
            $f=fopen("../files/user.csv","w");
            fputs($f,$ch);
            fclose($f);
            header("location:acceuil.php");
            }
    ?>
    </div>
        </div>
    <?php include_once 'footer.php' ?>
</body>
</html>