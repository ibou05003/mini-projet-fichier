<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="acceuil.php">Acceuil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="listerProduits.php">Liste Produits </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="rechercherProduits.php">Rechercher Produits</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ajouterProduit.php">Ajouter Produit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="updateProduit.php">Modifier Produit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="supprimerProduit.php">Supprimer Produit</a>
      </li>
      <?php 
        if($_SESSION['profil']=="Administrateur"){?>
          <li class="nav-item">
          <a class="nav-link" href="user.php">Ajout Utilisateur</a>
          </li> 
          <li class="nav-item">
          <a class="nav-link" href="listeUsers.php">Liste Utilisateurs</a>
          </li>
    <?php
        }
    ?>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Deconnexion</a>
      </li>
    </ul>
    
  </div>
</nav>