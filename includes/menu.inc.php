<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow border-top border-5 border-primary sticky-top p-0">
  <a href="index.php?page=index" class="navbar-brand bg-primary d-flex align-items-center px-4 px-lg-5">
    <h2 class="mb-2 text-white">App neve</h2>
  </a>
  <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto p-4 p-lg-0">
      <?php
      
        foreach($menupontok as $key => $value) {
            $active = '';
            if($_SERVER['REQUEST_URI'] == '/Szakdolgozat/index.php?page='.$key) $active = ' active';
            if(!empty($_SESSION["id"]) and $key=="login"){
                echo '<a class="nav-item nav-link" href="index.php?page=loginPanel&amp;action=logout">Kilépés</a>';
                continue;
            }
            if(!empty($_SESSION["id"]) and $key=="register"){
              continue;
            }
            if(empty($_SESSION["id"]) and ($key=="myProfile" or $key=="search" or $key=="advancedSearch" or $key=="browser")){
              continue;
            }
            ?>
                <a class="nav-item nav-link" href="index.php?page=<?php echo $key; ?>"><?php echo $value; ?></a>
            <?php            
        }

      ?>
      </div>
  </div>
</nav>