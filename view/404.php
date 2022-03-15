<!-- 404 Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                <h1 class="display-1">404</h1>
                <h1 class="mb-4">A keresett oldal nem található!</h1>
                <?php
                    if(empty($_SESSION["id"])){
                        echo '<p class="mb-4">A keresett oldal nem található vagy nem vagy <a href="index.php?page=login">bejelentkezve!</a></p>';
                    }else{
                        echo '<p class="mb-4">A keresett oldal nem található!</p>';
                    }
                ?>
                <p class="mb-4">We’re sorry, the page you have looked for does not exist in our website! Maybe go to our home page or try to use a search?</p>
                <a class="btn btn-primary rounded-pill py-3 px-5" href="index.php?page=index">Vissza a főoldalra</a>
            </div>
        </div>
    </div>
</div>
<!-- 404 End -->