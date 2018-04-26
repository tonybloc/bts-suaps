<?php
require_once(__DIR__ .'/../config.php');


if(!isset($_SESSION))
{
    session_start();
}


$title = "inscription";
?>

<?php ob_start(); ?>

<?php 

?>
<section class="container" id="inscription">
    <div class="setup-wrapper">
      <!-- en-tête -->
      <div class="account_header">
        <h2>Compte utilisateur</h2>
      </div>
      <!-- Inscription -->
      <div class="account_form">
      
        <form id="formInscription" action="/Projet_SUAPS/controler/controlerInscription.php" method="post">
          <fieldset>
            <legend>Créer un compte SUAPS</legend>
            <div class="row">
              <!-- FirstName -->
              <div class="form-group col-md-6">
                <label for="inscriptionFirstName">Nom</label>
                <input type="text" class="form-control" name="inscriptionFirstName" id="inscriptionFirstName" placeholder="Votre nom" data-error="errorFirstName">
                <div class="error errorFirstName">
                  
                </div>
              </div>
              <!-- LastName -->
              <div class="form-group col-md-6">
                <label for="inscriptionLastName">Prénom</label>
                <input type="text" class="form-control" name="inscriptionLastName" id="inscriptionLastName" placeholder="Votre prénom" data-error="errorLastName">
                <div class="error errorLastName">
                  
                </div>
              </div>
              <!-- Email -->
              <div class="form-group col-md-12">
                <label for="inscriptionEmail">Email</label>
                <input type="email" class="form-control" name="inscriptionEmail" id="inscriptionEmail" placeholder="Email" data-error="errorEmail">
                <div class="error errorEmail">
                  
                </div>
              </div>
              <!-- Password -->
              <div class="form-group col-md-12">
                <label for="inscriptionPwd">Mot de passe</label>
                <input type="password" class="form-control" name="inscriptionPwd" id="inscriptionPwd2" placeholder="Mot de passe" data-error="errorPwd">
                <div class="error errorPwd">
                  
                </div>
              </div>
              <!-- Password confirm -->
              <div class="form-group col-md-12">
                <label for="inscriptionPwdComfirm">Confirmer le mot de passe</label>
                <input type="password" class="form-control" name="inscriptionPwdComfirm" id="inscriptionPwdComfirm" placeholder="Confirmer le mot de passe" data-error="errorPwdConfirm">
                <div class="error errorPwdConfirm">
                  
                </div>
              </div>
            </div>
            
          </fieldset>
          <div class="form-group">
              <div class="col-sm-4">
              	<button type="submit" class="btn btn-default">Inscription</button>
              </div>          
              <div class="col-sm-4">
                		<?php
                		if(isset($_GET['insc'])){
                		    
                		    if($_GET['insc'] == "success" && isset($_SESSION['message_inscription_confirm']) && !empty($_SESSION['message_inscription_confirm']))
                		    {
                		        echo "<p style='color:green'><i style='padding:5px;color:green;'class='fa fa-check' aria-hidden='true'></i>" .  $_SESSION['message_inscription_confirm'] . "</p>";
                		    }
                		    else if($_GET['insc'] == "wrong" && isset($_SESSION['message_inscription_error']) && !empty($_SESSION['message_inscription_error']))
                		    {
                		        echo "<p style='color:red'><i style='padding:5px;color:red;'class='fa fa-times' aria-hidden='true'></i>" . $_SESSION['message_inscription_error'] . "</p>";
                		    }
                		    else {
                		        echo "";
                		    }
                		}                			
                		?>
            	</div>
          </div>
        </form>
      </div>
    </div>
	</section>
</main>

<?php $content = ob_get_clean();?>
<?php require(ROOT_FOLDER.DS.'view'.DS.'Layout'.DS.'LayoutSimple.php') ?>
