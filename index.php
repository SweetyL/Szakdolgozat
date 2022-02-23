<?php

session_start();

require 'includes/db.inc.php';
require 'model/Company.php';
require 'model/Driver.php';
require 'model/Country.php';
require 'model/Town.php';

if(!isset($_REQUEST['page'])){
        header('Location: index.php?page=index');
        exit();
}
// default oldal
$page = 'index';

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
}
else{
        $title = $menupontok[$page];
}

include 'includes/htmlheader.inc.php';
?>
<body class="bbody">
<?php

include 'includes/menu.inc.php';
if(file_exists('controller/'.$_REQUEST['page'].'.php')){
        include 'controller/'.$page.'.php';
}else{
        header('Location: index.php?page=404');
        exit();
}

?>
</body>
</html>