<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Suaps</title>

    <!-- CND Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Style -->
    <link rel="stylesheet" href="./../asset/css/header.css">
    <link rel="stylesheet" href="./../asset/css/join.css">


  </head>
  <body>
    <header>
      <div class="header_content">
        <div class="header_brand">
          <div class="row">
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                  <div class="header_img">
                    <img src="./../asset/img/logo_suaps.png" alt="logo Suaps" />
                  </div>
              </div>
              <div class="col-12 col-sm-6 col-md-8 col-lg-9 col-xl-9">
                <div class="header_title">
                  <h1>Réservations golf de la wantzenau</h1>
                  <p>Année 2017 - 2018</p>
                </div>

              </div>
          </div>
        </div>
        <div class="header_nav">
          <nav class="nav">
            <a class="nav-link active" href="#">Connexion</a>
            <a class="nav-link" href="#">Association AGJSEP</a>
            <a class="nav-link" href="#">Inscription</a>
          </nav>
        </div>
      </div>
    </header>
    <section>
      <div class="setup-wrapper">
        <!-- en-tête -->
        <div class="account_header">
          <h2>Compte utilisateur</h2>
        </div>
        <!-- Inscription -->
        <div class="account_form">
          <form id="user_inscription" novalidate>
            <fieldset>
              <legend>Créer votre compte SUAPS</legend>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="input_firstName">Nom</label>
                  <input type="text" class="form-control" id="input_firstName" placeholder="Votre nom" required>
                  <div class="invalid-feedback">
                    Nom invalide.
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="input_lastName">Prénom</label>
                  <input type="text" class="form-control" id="input_lastName" placeholder="Votre prénom" required>
                  <div class="invalid-feedback">
                    Prénom invalide.
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <label for="input_email">Email</label>
                  <input type="email" class="form-control" id="input_email" placeholder="Email" required>
                  <div class="invalid-feedback">
                    Email invalide.
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <label for="input_pwd">Mot de passe</label>
                  <input type="password" class="form-control" id="input_pwd" placeholder="Mot de passe" required>
                  <div class="invalid-feedback">
                    Mot de passe invalide.
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <label for="input_pwd2">Confirmer le mot de passe</label>
                  <input type="password" class="form-control" id="input_pwd2" placeholder="Confirmer le mot de passe" required>
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

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <script type="text/javascript">
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
    'use strict';

    window.addEventListener('load', function() {
      var form = document.getElementById('user_inscription');
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    }, false);
    })();
    </script>
  </body>
</html>
