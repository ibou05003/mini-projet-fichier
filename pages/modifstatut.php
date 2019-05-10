<?php

        $ch="";
        $t=false;
        $nomfile='../files/user.csv';
        if(file_exists($nomfile)){
            $f=fopen("../files/user.csv","r");
            while($tab=fgetcsv($f,1000,";"))
            {
                if(strcmp($_GET['login'],$tab[0])==0)
                {
                    if($tab[6]=="débloquer?"){
                        $tab[6]="bloquer?";
                    }
                    else{
                        $tab[6]="débloquer?";
                    }
                }
                $ch=$ch.$tab[0].";".$tab[1].";".$tab[2].";".$tab[3].";".$tab[4].";".$tab[5].";".$tab[6].";".$tab[7]."\n";
            }
            fclose($f);
            $f=fopen("../files/user.csv","w");
            fputs($f,$ch);
            fclose($f);
            header('location:listeUsers.php');
        }
    
        
        
?>