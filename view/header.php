
<header>
  <div class="header_content">
  	<div class="header_brand">
    	<div class="header_title">
        	<h1>Réservations golf de la Wantzenau</h1>
            <p>Année 2017 - 2018</p>
       </div>
    </div>
  </div>
  <div class="navigation">
        <ul class="nav nav-pills">
          <li>
          <?php
              if(isset($_SESSION['user']))
              {
                  echo '<li><a>Connecté : '.$_SESSION['user']['prenom'].' '.$_SESSION['user']['nom'].'</a></li>';
              }
              else
              {
                  echo '<a href="/Projet_SUAPS/view/connectUserView.php">Connexion</a>';
              }
          ?>
          </li>
          <li><a href="#">Association AGJSEP</a></li>
          <li><a href="#">Autre...</a></li>
          <li>
          <?php
              if(isset($_SESSION['user']))
              {
                  echo '<li><a href="/Projet_SUAPS/controler/connexion.php?disc=1">Deconnection</a></li>';
              }
          ?>
        </ul>
   </div>
</header>
