<?php 
require_once(ROOT_FOLDER . DS .'model'. DS .'user.class.php');


// Vérifie si une session existe déja sinon on la crée
if(!isset($_SESSION))
{
    session_start();
}

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
        	<h1><a href="/Projet_SUAPS/view/indexView.php">Réservations golf de la Wantzenau</a></h1>
            <p>Année 2017 - 2018</p>
       </div>
    </div>
  </div>
  <div class="navigation">
  		<nav class="navbar navbar-default">
  			<div class="container-fluid">
  				<div class="navbar-header">
  					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-mobile" aria-expanded="false">
  						<span></span>	
  					</button>
  					<div class="navbar-brand">
  						<a href="/Projet_SUAPS/index.php">
  							<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
  						</a>
  					</div>
  				</div>
  				
  				<div class="collapse navbar-collapse" id="navbar-collapse-mobile">
  					<ul class="nav navbar-nav">
  						<li><a href="/Projet_SUAPS/view/reservView.php">Réservation</a></li>
  						<li><a href="#">Association</a></li>
  						<li><a href="#">Autre...</a></li>
  					</ul>
  					<ul class="nav navbar-nav navbar-right">
  						<?php 
  						if(isset($_SESSION['user']))
  						{
  						    echo '<li><a>Connecté : '.$lastName.' '.$firstName.'</a></li>';
  						    echo '<li><a href="/Projet_SUAPS/controler/connexion.php?disc=1">Se déconnecter</a></li>';
  						}
  						else
  						{
  						    echo '<li><a href="/Projet_SUAPS/view/connectUserView.php">Se connecter</a></li>';
  						}
  						?>		
  					</ul>
  				</div>
  			</div>
  		</nav>
  	</div>
</header>
        