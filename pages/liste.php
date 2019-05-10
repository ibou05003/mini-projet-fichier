<?php 
    function afficheProduit(){
        $nomfile='../files/produit.csv';
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
    function afficheUser(){
        $nomfile='../files/user.csv';
        ?>
            <center><h1>Liste des Utilisateurs</h1></center>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead class="thead-dark">
                                    <tr class='text-center'>
                                        <th>#</th>
                                        <th>Login</th>
                                        <th>Nom</th>
                                        <th>Téléphone</th>
                                        <th>Adresse</th>
                                        <th>Profil</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $f=fopen("../files/user.csv","r");
                                        $i=1;
                                        while($tab=fgetcsv($f,1000,";"))
                                        {
                                            
                                            echo "<tr class='text-center'>";
                                            echo "<td>".$i."</td>";
                                            echo "<td>".$tab[0]."</td>";
                                            echo "<td>".$tab[2]."</td>";
                                            echo "<td>".$tab[3]."</td>";
                                            echo "<td>".$tab[4]."</td>";
                                            echo "<td>".$tab[5]."</td>";
                                            if($i==1){
                                                echo "<td><button class='btn btn-outline-success' disabled>".$tab[6]."</button></td>";
                                            }
                                            else{
                                                if($tab[6]=="bloquer?")
                                                echo "<td><a href='modifstatut.php?login=$tab[0]'><button class='btn btn-outline-success'>".$tab[6]."</button></a></td>";
                                                else
                                                echo "<td><a href='modifstatut.php?login=$tab[0]'><button class='btn btn-outline-danger'>".$tab[6]."</button></a></td>";
                                            }
                                            echo "</tr>";
                                            $i++;
                                        }
                                        fclose($f);
                                    ?>
                                </tbody>
                            </table> <?php
    }
?>