<?php
//https://goqr.me/api/
    if(empty($_SESSION["id"])){
        header('Location: index.php?page=404');
        exit();
    }
    $htmlFile = "<!DOCTYPE html>\n<html lang='hu'>\n<head>\n
        <meta charset='utf-8'>\n
        <link rel='stylesheet' type='text/css' href='../css/style.css'>\n
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>\n
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>\n
        <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js'></script>\n
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js'></script>\n
    ";
    $driver = new Driver();
    $company = new Company();
    $country = new Country();
    $town = new Town();
    $fname = "";
    if($_SESSION["type"]=="driver"){
        $driver->set_user($_SESSION["id"], $conn);
        $town->set_town($driver->get_townID(),$conn);
        $country->set_country($town->get_country(),$conn);
        $fname = md5($driver->get_username())."D";
        if(isset($_POST["nameQ"])){
            if($_POST["nameQ"]=="full"){
                $htmlFile .= "<title>".$driver->get_lastname()." ".$driver->get_firstname()."</title>\n</head>\n<body class='bbody'>\n";
                $htmlFile .= "<h1>".$driver->get_lastname()." ".$driver->get_firstname()."</h1>\n";
            }else if($_POST["nameQ"]=="short"){
                $htmlFile .= "<title>".substr($driver->get_lastname(), 0, 1).". ".$driver->get_firstname()."</title>\n</head>\n<body class='bbody'>\n<div class='container'>\n";
                $htmlFile .= "<h1>".substr($driver->get_lastname(), 0, 1).". ".$driver->get_firstname()."</h1>\n";
            }
            if(isset($_POST["country"])){
                $htmlFile .= "<p>Ország: ".$country->get_name()."</p>\n";
            }
            if(isset($_POST["town"])){
                $htmlFile .= "<p>Város: ".$town->get_name()."</p>\n";
            }
            if(isset($_POST["street"])){
                $htmlFile .= "<p>Utca: ".$driver->get_street()."</p>\n";
            }
            if(isset($_POST["houseNum"])){
                $htmlFile .= "<p>Házszám: ".$driver->get_houseNumber()."</p>\n";
            }
            if(isset($_POST["email"])){
                $htmlFile .= "<p>E-mail: ".$driver->get_email()."</p>\n";
            }
            if(isset($_POST["phone"])){
                $htmlFile .= "<p>Telefonszám: ".$driver->get_phone()."</p>\n";
            }
            $htmlFile .= "</div>\n</body>\n</html>";
            $myfile = @fopen("./generatedPages/".$fname.".html", "w") or die("Critical ERROR!");
            fwrite($myfile, $htmlFile);
            fclose($myfile);
            header('Location: index.php?page=myProfile');
            exit();
        }
    }else{
        if(isset($_POST["nameQ"])){
            $company->set_user($_SESSION["id"], $conn);
            $town->set_town($company->get_townID(),$conn);
            $country->set_country($town->get_country(),$conn);
            $fname = md5($company->get_username())."C";
            $htmlFile .= "<title>".$company->get_name()."</title>\n</head>\n<body class='bbody'>\n";
            $htmlFile .= "<h1>".$company->get_name()."</h1>\n";
            if(isset($_POST["country"])){
                $htmlFile .= "<p>Ország: ".$country->get_name()."</p>\n";
            }
            if(isset($_POST["town"])){
                $htmlFile .= "<p>Város: ".$town->get_name()."</p>\n";
            }
            if(isset($_POST["street"])){
                $htmlFile .= "<p>Utca: ".$company->get_street()."</p>\n";
            }
            if(isset($_POST["houseNum"])){
                $htmlFile .= "<p>Házszám: ".$company->get_houseNumber()."</p>\n";
            }
            if(isset($_POST["email"])){
                $htmlFile .= "<p>E-mail: ".$company->get_email()."</p>\n";
            }
            if(isset($_POST["phone"])){
                $htmlFile .= "<p>Telefonszám: ".$company->get_phone()."</p>\n";
            }
            if(isset($_POST["webpage"])){
                $htmlFile .="<p>Weboldal: <a href='https://".$company->get_webpage()."' target='_blank'>".$company->get_webpage()."</a></p>";
            }
            $myfile = @fopen("./generatedPages/".$fname.".html", "w") or die("Critical ERROR!");
            fwrite($myfile, $htmlFile);
            fclose($myfile);
            header('Location: index.php?page=myProfile');
            exit();
        }
    }
    include 'view/genPage.php';
?>