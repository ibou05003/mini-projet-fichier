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
    <title>Liste Users</title>
</head>
<body>
<?php include_once 'header.php' ?>
    <div class="marge">
    <div class="container">
        
        <?php
        $nomfile='../files/user.csv';
        require_once 'liste.php';
        if(file_exists($nomfile)){ 
            afficheUser();
        }
        ?>
        
        </div>
        </div>
    <?php include_once 'footer.php' ?>
</body>
</html>