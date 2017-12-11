<main>
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
<main>
