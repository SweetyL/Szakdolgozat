 <!-- Carousel Start -->
 <div class="container-fluid p-0 pb-5">
        <div class="owl-carousel header-carousel position-relative mb-5">
            <div class="owl-item position-relative">
                <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(6, 3, 21, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Transport & Logistics Solution</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">I. számú megoldás <span class="text-primary">sofőrök</span> számára</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Vállalatot keresne ahol munkába állhat? Velünk megteheti!</p>
                                <?php
                                    if(empty($_SESSION["id"])){
                                        echo '<a href="index.php?page=register" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Regisztrálok!</a>';
                                        echo '<a href="index.php?page=login" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Belépek!</a>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item position-relative">
                <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(6, 3, 21, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Transport & Logistics Solution</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">I. számú megoldás <span class="text-primary">vállalatok</span> számára</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Sofőrt keresne, aki el tudna vállalni egy vagy több megbízást? Velünk megteheti!</p>
                                <?php
                                    if(empty($_SESSION["id"])){
                                        echo '<a href="index.php?page=register" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Regisztrálok!</a>';
                                        echo '<a href="index.php?page=login" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Belépek!</a>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
