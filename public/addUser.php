<?php

require_once './functions.php';
require_once './src/partials/header_part.php';
?>

<div class="container-fluid">
  <div class="row">
    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Zoo Arcadia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active " aria-current="page" href="#">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                Dashboard
              </a>
            </li>

            <!-- Sidebar section administrateur et employés -->
            <?php   
              foreach (getMenuSidebar() as $key=>$menu) {  ?>
                <?php require './src/partials/sidebar_part.php'; ?>
              <?php } ?>
            <!-- Sidebar section véterinaire -->
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
            <span>Véterinaire</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <svg class="bi"><use xlink:href="#plus-circle"/></svg>
            </a>
          </h6>
          <ul class="nav flex-column mb-auto">
            <?php   
              foreach (getMenuSidebarVeto() as $key=>$menu) {  ?>
                <?php require './src/partials/sidebar_veto_part.php'; ?>
              <?php } ?>
          </ul>

          <hr class="my-3">
          <!-- Sidebar section paramètres -->
          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                Paramètres
              </a>
            </li>
            <li class="nav-item mb-5">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#door-closed"/></svg>
                Quitter
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <main class="col-md-9 col-lg-10 ms-sm-auto px-md-4">
      <div class="row pt-3 pb-2 mb-3 border-bottom d-flex d-nowwrap">
        <div class="col-md-6 col-lg-6 d-flex justify-content-center mb-3">
          <h1 class="h2">Espace Administration</h1>
        </div>  
        <div class="col-md-3 col-lg-4 btn-toolbar d-flex justify-content-center 
          align-items-center mb-3">
          <div class="filters-input "> 
            <input type="text" id="search" placeholder="Rechercher...">
            <svg class="bi"><use xlink:href="#search"/></svg>
          </div>
        </div>
        <div class="col-md-3 col-lg-2 btn-toolbar d-flex justify-content-center 
          align-items-center mb-3">
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
            <svg class="bi"><use xlink:href="#search"/></svg>
            Trier par 
          </button>
        </div>
      </div>

      <div class="container">
      <?php 
        echo '
          <div class="row">
              <div class="col-12 d-flex justify-content-start mb-3">
                <h5>Utilisateurs</h5>
              </div>
          </div>  
          <div class="row">
          <form class="row gx-3 gy-2 align-items-center">
            <div class="row">
                <div class="col-sm-3 mb-3">
                  <label class="visually-hidden" for="specificSizeInputName">Name</label>
                  <input type="text" class="form-control" id="specificSizeInputName" placeholder="Nom">
                </div>
                <div class="col-sm-3 mb-3">
                  <label class="visually-hidden" for="specificSizeInputLastName">LastName</label>
                  <input type="text" class="form-control" id="specificSizeInputLastName" placeholder="Prénom">
                </div>
                <div class="col-sm-3  mb-3">
                  <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
                  <div class="input-group">
                    <div class="input-group-text">@</div>
                    <input type="text" class="form-control" id="specificSizeInputGroupUsername" placeholder="Username">
                  </div>
                </div>
                <div class="col-sm-3 mb-3">
                  <label class="visually-hidden" for="specificSizeInputPassword">Password</label>
                  <input type="password" class="form-control" id="specificSizeInputPassword" placeholder="Password">
                </div>
                <div class="col-sm-3  mb-3">
                  <label class="visually-hidden" for="specificSizeSelect">Preference</label>
                  <select class="form-select" id="specificSizeSelect">
                    <option selected>Rôle...</option>
                    <option value="1">Administrateur</option>
                    <option value="2">Employé</option>
                    <option value="3">Vétéinaire</option>
                  </select>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
                </div>
                <div class="col-auto">
                <button type="submit" class="btn btn-danger mt-3">Annuler</button>
            </div>
          </form>
        </div>';
        ?>
      </div>
    </main>
  </div>
</div>

<?php 
require_once './src/partials/footer_part.php';
?>
