<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php
      
        foreach($menupontok as $key => $value) {
            $active = '';
            if($_SERVER['REQUEST_URI'] == '/Szakdolgozat/index.php?page='.$key) $active = ' active';
            if(!empty($_SESSION["id"]) and $key=="register"){
              continue;
            }
            if(empty($_SESSION["id"]) and $key=="myProfile"){
              continue;
            }
            ?>
            <li class="nav-item<?php echo $active; ?>">
                <a class="nav-link" href="index.php?page=<?php echo $key; ?>"><?php echo $value; ?></a>
            </li>
            <?php            
        }

      ?>
    </ul>
  </div>
</nav>