<?php 
require_once(ROOT_FOLDER . DS .'model'. DS .'user.class.php');

if(isset($_SESSION['user']))
{
    $lastName = unserialize($_SESSION['user'])->getLastName();
    $firstName = unserialize($_SESSION['user'])->getFirstName();
}
?>
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
                  echo '<li><a>Connecté : '.$lastName.' '.$firstName.'</a></li>';
              }
              else
              {
                  echo '<a href="/Projet_SUAPS/view/connectUserView.php">Connexion</a>';
              }
          ?>
          </li>
          <li><a href="#">Association AGJSEP</a></li>
          <li><a href="/Projet_SUAPS/view/reservView.php">Réservation</a></li>
          <li><a href="#">Autre...</a></li>
          <li>
          <?php
              if(isset($_SESSION['user']))
              {
                  echo '<li><a href="/Projet_SUAPS/controler/connexion.php?disc=1">Deconnexion</a></li>';
              }
          ?>
        </ul>
   </div>
</header>
