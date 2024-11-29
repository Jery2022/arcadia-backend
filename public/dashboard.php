

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ZOO ARCADIA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>

  <header class="container-fluid container-header bg-light text-dark p-3 mb-4">
    <div class="container-fluid ">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Zoo Arcadia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
    </div>
  </header>
  <main class="container">
    <div class="container col-xl-10 col-xxl-10 px-2 py-2">
      <div class="row align-items-center g-lg-5 py-5">
        <div class="col-md-10 mx-auto col-lg-5">
          <h1 class="display-4 fw-bold lh-1 text-body-emphasis text-center pb-5">Login</h1>
          <p class="lead">Connectez-vous et accéder à votre compte.</p>
          <form class="p-5 p-md-5 border rounded-3 bg-body-tertiary needs-validation" id="loginForm" 
            name="loginForm" action="" method="post" onsubmit="validateFormLogin()"  novalidate>
            <div class="form-floating mb-3" id="emailContainer"> 
              <input type="email" class="form-control" id="validationCustom01" placeholder="email" required>
              <label for="validationCustom01" class="form-label">Email</label>
              <div class="valid-feedback" >ok !</div>
              <div id="emailFeedBack"></div>
            </div>
            <div class="form-floating mb-3" id="passwordContainer">
              <input type="password" class="form-control" id="validationCustom02" placeholder="password" required>
              <label for="validationCustom02">Password </label>
              <div class="valid-feedback" >Ok !</div>
              <div id="passwordFeedBack"></div>
            </div>
            <div class="checkbox mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                  J'accepte les conditions d'utilisation
                </label>
                <div class="invalid-feedback">
                  Vous devez accepter les conditions avant de soumettre.
                </div>
              </div>
            </div>
            <div class="p-5  p-md-5"> 
              <button class="w-100 btn btn-lg btn-primary mt-2 " type="submit">Connexion</button>
              <button class="w-100 btn btn-lg btn-primary  mt-2" type="submit">Annuler</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <footer>
    <div class="container text-center bg-light text-dark p-3 mt-4">
      <p>&copy; 2024 ZOO ARCADIA. Tous droits réservés.</p>
      <div class="social-icons">
        <a href="#" class="me-2"><img src="./assets/icones/facebook-icon.svg " width="50px" height="50px" alt="Facebook"></a>
        <a href="#" class="me-2"><img src="./assets/icones/twitterX.svg" width="50px" height="50px"  alt="Twitter"></a>
        <a href="#" class="me-2"><img src="./assets/icones/instagram-icon.png" width="30px" height="30px"  alt="Instagram"></a>
      </div>
    </div>
    <div class="container d-flex align-items-center justify-content-between text-light py-5">
      <div class="float-end mb-1">
        <a href="#">Back to top</a>
      </div>
      <div class="float-center mb-1">
        <a href="#">Privacy</a>
        <a href="#">Terms</a>
        <a href="#">Support</a>
      </div>
      <div class="float-start mb-1">
        <p class="mb-1">Addresse : 21 avenue Pierre Alain, Longueil Annel, 65150 France</p>
        <p class="mb-1">Téléphone : 066 91 23 243</p>
        <p class="mb-1">Email : contact@zoo-arcadia.org</p>
      </div>
      <div class="float-start mb-1"> 
        <p class="mb-1">Ouvert : Lundi - Dimanche</p>
        <p class="mb-1">Horaires : 11h00 - 19h00</p>
        <p class="mb-1">Fermé : Hiver</p>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
  <script src="./js/main.js "></script>
</body>
</html>
