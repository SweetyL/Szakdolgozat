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
                        'login' => "Belépés",
                        'register' => "Regisztrálás",
                        'myProfile' => "Profilom"
                );


if($_REQUEST['page']=="driverRegister"){
        $title = "Sofőr regisztrálás";
}else if($_REQUEST['page']=="companyRegister"){
        $title = "Vállalat regisztrálás";
}else if($_REQUEST['page']=="loginPanel" and $_REQUEST['action']=="drivers"){
        $title = "Sofőr belépés";
}else if($_REQUEST['page']=="loginPanel" and $_REQUEST['action']=="companies"){
        $title = "Vállalati belépés";
}else if($_REQUEST['page']=="profile" and isset($_REQUEST['action'])){
        $title = "X profilja";
}else if($_REQUEST['page']=="404"){
        $title = "Hiba 404";
}else{
        $title = $menupontok[$page];
}

include 'includes/htmlheader.inc.php';
?>
<body class="bbody">
<?php

include 'includes/menu.inc.php';
include 'controller/'.$page.'.php';

?>
</body>
</html>