<?php
session_name("kamionSzakdoga");
session_start();

require 'includes/db.inc.php';
require 'model/Company.php';
require 'model/Driver.php';
require 'model/Country.php';
require 'model/Town.php';
require 'includes/functions.inc.php';

if(!isset($_REQUEST['page'])){
        header('Location: index.php?page=index');
        exit();
}
// default oldal
$page = 'index';
$admins = getAdmins($conn);

// router
if(isset($_REQUEST['page'])) {
        if(file_exists('controller/'.$_REQUEST['page'].'.php')) {
                $page = $_REQUEST['page']; 
        }
}

$menupontok = array(    'index' => "Főoldal",
                        'register' => "Regisztrálás",
                        'myProfile' => "Profilom",
                        'browser' => "Böngészés",
                        'search' => "Alap keresés",
                        'advancedSearch' => "Részletes keresés",
                        'login' => "Belépés"
                );


if($_REQUEST['page']=="driverRegister"){
        $title = "Sofőr regisztrálás";
}else if($_REQUEST['page']=="companyRegister"){
        $title = "Vállalat regisztrálás";
}else if($_REQUEST['page']=="loginPanel" and $_REQUEST['action']=="drivers"){
        $title = "Sofőr belépés";
}else if($_REQUEST['page']=="loginPanel" and $_REQUEST['action']=="companies"){
        $title = "Vállalati belépés";
}else if($_REQUEST['page']=="profile" and isset($_REQUEST['id'])){
        $title = "X profilja";
}else if($_REQUEST['page']=="404"){
        $title = "Hiba 404";
}else if($_REQUEST['page']=="myProfile"){
        $title = "Profilom";
}else if($_REQUEST['page']=="settings"){
        $title = "Beállítások";
}else if($_REQUEST['page']=="genPage"){
        $title = "QR kód generálás";
}else if($_REQUEST['page']=="editCargo"){
        $title = "Szállítmányok kezelése";
}else if($_REQUEST['page']=="editJobs"){
        $title = "Megbízások kezelése";
}else if($_REQUEST['page']=="editTrips"){
        $title = "Utak kezelése";
}else if($_REQUEST['page']=="editTrucks"){
        $title = "Kamionok kezelése";
}else if($_REQUEST['page']=="redirect"){
        $title = "Átirányítás...";
}else if($_REQUEST['page']=="editEngines"){
        $title = "Motorok kezelése";
}else{
        $title = $menupontok[$page];
}

include 'includes/htmlheader.inc.php';
?>
<body>
<?php

include 'includes/menu.inc.php';
if(file_exists('controller/'.$_REQUEST['page'].'.php')){
        include 'controller/'.$page.'.php';
}else{
        header('Location: index.php?page=404');
        exit();
}

?>
     <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
<?php
        include 'includes/footer.inc.php';
?>
</body>
</html>