<?php
    session_start();
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
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            margin: 0px;
            padding: 0px;
            background-image: url(./img/2.png);
            background-size:cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
    <title>Connexion</title>
</head>
<body class="fondGris">
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form action="" method="POST" class="formulaire">
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" id="login" name="login" placeholder="Entrer votre login">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Entrer votre mot de passe">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
                    </div>
                    <button type="submit" name="connexion" class="btn btn-primary">Connexion</button>
                </form>
                <?php
                
                //extract($_POST);
                if(isset($_POST['connexion'])){
                    $log=$_POST['login'];
                    $mdp=$_POST['password'];
                    //parcours
                    $trouve=false;
                    $ok=false;
                    $f=fopen("./files/user.csv","r");
                    $i=0;
                    while($tab=fgetcsv($f,1000,";"))
                    {
                        if($log==$tab[0] && $mdp==$tab[1]){
                            $trouve=true;
                            if($tab[6]=="bloquer?"){
                                $ok=true;
                                $nb=$tab[7];
                                $_SESSION['login']=$tab[0];
                                $_SESSION['nom']=$tab[2];
                                $_SESSION['profil']=$tab[5];
                            }
                            else
                                echo '<h5 style="color:dark;">utilisateur bloqué, veuillez contacter l\'administrateur</h5>';
                        }
                    }
                    fclose($f);
                    if($ok==true){
                        if($nb==0){
                            header("location:pages/changemdp.php");
                        }
                        else{
                            $f=fopen("../files/user.csv","r");
                            while($tab=fgetcsv($f,1000,";"))
                            {
                                if($log==$tab[0])
                                {
                                    $tab[7]++;
                                }
                                $ch=$ch.$tab[0].";".$tab[1].";".$tab[2].";".$tab[3].";".$tab[4].";".$tab[5].";".$tab[6].";".$tab[7]."\n";
                                
                            }
                            fclose($f);
                            $f=fopen("../files/user.csv","w");
                            fputs($f,$ch);
                            fclose($f);
                            header("location:pages/acceuil.php");
                        }
                    }
                    if($trouve==false)
                        echo "login ou passe incorrect";
                }
            ?>
            </div>
        </div>
    </div>
</body>
</html>