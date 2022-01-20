<?php

session_start();

require 'includes/db.inc.php';
require 'model/Company.php';
require 'model/Driver.php';

if(!isset($_REQUEST['page'])){
        header('Location: index.php?page=index');
        exit();
}
// default oldal
$page = 'index';
$GLOBALS['action'] = "";

// kilépés végrehajtása
if(!empty($_REQUEST['action'])) {
	if($_REQUEST['action'] == 'kilepes') session_unset();
}

// ki vagy be vagyok lépve?
if(!empty($_SESSION["id"])) {
        $szoveg = $_SESSION["name"].": Kilépés";
        $action = "kilepes";
}
else {
        $szoveg = "Belépés";
        $action = "belepes";        
} 

// router
if(isset($_REQUEST['page'])) {
        if(file_exists('controller/'.$_REQUEST['page'].'.php')) {
                $page = $_REQUEST['page']; 
        }
}

$menupontok = array(    'index' => "Főoldal",
                        'register' => "Regisztrálás",
                        'login' => "Belépés"
                );


if($_REQUEST['page']=="driverRegister"){
        $title = "Sofőr regisztrálás";
}else if($_REQUEST['page']=="companyRegister"){
        $title = "Vállalat regisztrálás";
}else if($_REQUEST['page']=="loginPanel" and $_REQUEST['action']=="drivers"){
        $GLOBALS['action'] = "drivers";
        $title = "Sofőr belépés";
}else if($_REQUEST['page']=="loginPanel" and $_REQUEST['action']=="companies"){
        $GLOBALS['action'] = "companies";
        $title = "Vállalati belépés";
}else{
        $title = $menupontok[$page];
}

include 'includes/htmlheader.inc.php';
?>
<body>
<?php

include 'includes/menu.inc.php';
include 'controller/'.$page.'.php';

?>
</body>
</html>