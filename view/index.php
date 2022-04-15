 <!-- Carousel Start -->
 <div class="container-fluid p-0 pb-5">
        <div class="owl-carousel header-carousel position-relative mb-5">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(6, 3, 21, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown"><i>TransportGO</i></h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">I. számú megoldás <span class="text-primary">sofőrök</span> számára</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Vállalatot keresne ahol munkába állhat? Velünk megteheti!</p>
                                <?php
                                    if(empty($_SESSION['id'])){
                                        echo '<a href="index.php?page=register" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Regisztrálok!</a>';
                                        echo '<a href="index.php?page=login" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Belépek!</a>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(6, 3, 21, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown"><i>TransportGO</i></h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">I. számú megoldás <span class="text-primary">vállalatok</span> számára</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Sofőrt keresne, aki el tudna vállalni egy vagy több megbízást? Velünk megteheti!</p>
                                <?php
                                    if(empty($_SESSION['id'])){
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

        <!-- Fact Start -->
        <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase mb-3">Néhány tény</h6>
                    <h1 class="mb-5">I. számú hely sofőr-vállalat kapcsolatokra</h1>
                    <p class="mb-5">Számunkra fontosak a felhasználói vélemények és az, hogy mindenki megtalálhassa a problémájára a választ szoftverünk segítségével.</p>
                </div>
                <div class="col-lg-6">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm-6">
                            <div class="bg-primary p-4 mb-4 wow fadeIn" data-wow-delay="0.3s">
                                <i class="fa fa-users fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up">3258</h2>
                                <p class="text-white mb-0">Boldog felhasználó</p>
                            </div>
                            <div class="bg-secondary p-4 wow fadeIn" data-wow-delay="0.5s">
                                <i class="fa fa-briefcase fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up">14965</h2>
                                <p class="text-white mb-0">Létrehozott megbízás</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="bg-success p-4 wow fadeIn" data-wow-delay="0.7s">
                                <i class="fa fa-star fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up">200</h2>
                                <p class="text-white mb-0">Vélemény</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->

     <!-- Service Start -->
     <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">Amit kínálunk</h6>
                <h1 class="mb-5">Fedezze fel szolgáltatásainkat</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item p-4">
                        <h4 class="mb-3">Cégek és sofőrök keresése</h4>
                        <p>Hogy mindenki megtalálja a számára azt, ami jó.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item p-4">
                        <h4 class="mb-3">Megbízások</h4>
                        <p>Egyből jelentkezne munkára? Itt megteheti szinte azonnal!</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item p-4">
                        <h4 class="mb-3">ADR tanúsítványok</h4>
                        <p>Igen ez a program még ilyenekkel is foglalkozik!</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item p-4">
                        <h4 class="mb-3">QR kód generálás</h4>
                        <p>Nem regisztráltak ismerősei, de szeretné megosztani profilját? Erre is gondoltunk!</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item p-4">
                        <h4 class="mb-3">Gyors és lényegretörő</h4>
                        <p>Pár kattintás alatt elvégezhet szinte mindent!</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item p-4">
                        <h4 class="mb-3">Egyéb rengeteg funkció</h4>
                        <p>Kamionok, kamion motorok, utak és még sok mások kezelése.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
