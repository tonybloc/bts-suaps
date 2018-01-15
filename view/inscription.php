<?php
require_once(__DIR__ .'/../config.php');


if(!isset($_SESSION))
{
    session_start();
}


$title = "inscription";
?>

<?php ob_start(); ?>

<?php require( ROOT_FOLDER.DS.'view'.DS.'header.php')?>
<section class="container" id="inscription">
    <div class="setup-wrapper">
      <!-- en-tête -->
      <div class="account_header">
        <h2>Compte utilisateur</h2>
      </div>
      <!-- Inscription -->
      <div class="account_form">
      
        <form id="formInscription" action="" methode="post">
          <fieldset>
            <legend>Créer un compte SUAPS</legend>
            <div class="row">
              <div class="form-group col-md-6">
 				
                <label for="inscriptionFirstName">Nom</label>
                <input type="text" class="form-control" name="inscriptionFirstName" id="inscriptionFirstName" placeholder="Votre nom" required>
                <div class="invalid-feedback">
                  Nom invalide.
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="inscriptionLastName">Prénom</label>
                <input type="text" class="form-control" name="inscriptionLastName" id="inscriptionLastName" placeholder="Votre prénom" required>
                <div class="invalid-feedback">
                  Prénom invalide.
                </div>
              </div>
              <div class="form-group col-md-12">
                <label for="inscriptionEmail">Email</label>
                <input type="email" class="form-control" name="inscriptionEmail" id="inscriptionEmail" placeholder="Email" required>
                <div class="invalid-feedback">
                  Email invalide.
                </div>
              </div>
              <div class="form-group col-md-12">
                <label for="inscriptionPwd">Mot de passe</label>
                <input type="password" class="form-control" name="inscriptionPwd" id="inscriptionPwd" placeholder="Mot de passe" required>
                <div class="invalid-feedback">
                  Mot de passe invalide.
                </div>
              </div>
              <div class="form-group col-md-12">
                <label for="inscriptionPwdComfirm">Confirmer le mot de passe</label>
                <input type="password" class="form-control" name="inscriptionPwdComfirm" id="inscriptionPwdComfirm" placeholder="Confirmer le mot de passe" required>
                <div class="invalid-feedback">
                  Le mot de passe de correspond pas.
                </div>
              </div>
            </div>
            <button class="btn btn-primary" type="submit">Inscription</button>
          </fieldset>
          
        </form>
      </div>
    </div>
	</section>
</main>

<?php $content = ob_get_clean();?>
<?php require(ROOT_FOLDER.DS.'view'.DS.'template.php') ?>
