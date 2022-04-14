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

$page = 'index';
$admins = getAdmins($conn);


if(isset($_REQUEST['page'])) {
        if(file_exists('controller/'.$_REQUEST['page'].'.php')) {
                $page = $_REQUEST['page']; 
        }
}

$menupontok = array(    'index' => "Főoldal",
                        'register' => "Regisztrálás",
                        'myProfile' => "Profilom",
                        'browser' => "Böngészés",
                        'search' => "Keresés",
                        'login' => "Belépés"
                );

switch($_REQUEST['page']){
        case("driverRegister"):
                $title = "Sofőr regisztrálás";
                break;

        case("companyRegister"):
                $title = "Vállalat regisztrálás";
                break;
        
        case("loginPanel"):
                if($_REQUEST['action']=="drivers"){
                        $title = "Sofőr belépés";
                }else{
                        $title = "Vállalati belépés";
                }
                break;

        case("profile"):
                if(isset($_REQUEST['id'])){
                        $title = "X profilja";
                }
                break;

        case("404"):
                $title = "Hiba 404";
                break;

        case("myProfile"):
                $title = "Profilom";
                break;

        case("settings"):
                $title = "Beállítások";
                break;

        case("genPage"):
                $title = "QR kód generálás";
                break;
                
        case("editCargo"):
                $title = "Szállítmányok kezelése";
                break;

        case("editJobs"):
                $title = "Megbízások kezelése";
                break;
                        
        case("editTrips"):
                $title = "Utak kezelése";
                break;

        case("editTrucks"):
                $title = "Kamionok kezelése";
                break;

        case("editEngines"):
                $title = "Motorok kezelése";
                break;

        case("editAdmin"):
                $title = "Adminok kezelése";
                break;

        case("editADR"):
                $title = "ADR tanúsítványok kezelése";
                break;

        case("showJobs"):
                $title = "A cég megbízásai";
                break;

        case("redirect"):
                $title = "Átirányítás...";
                break;

        default:
                $title = $menupontok[$page];
                break;
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