<?php
function page_loader($name){
    require "scripts/connect.php";
    $type = "index";
    $url = "";
    if(!empty($name)) {
        if ($name == "project_list" or $name == "project_editor" or $name == "my_page") {
            $type = $name;
        }
        else {
            try {
                $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
                $conn->exec("set names utf8");
                $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM `globalID` WHERE `URL` = :url");
                $stmt->bindParam(':url', $name);
                $stmt->execute();
                foreach ($stmt as $row) {
                    $type = $row['Type'];
                    $url = $row['URL'];
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            $conn = null;
        }
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo ucfirst($type). ": " . $url; ?> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
        <link rel="stylesheet" type="text/css" href="fonts/MyFontsWebfontsKit.css">
        <link rel="stylesheet" type="text/css" href="css/defaults.css">
        <link rel="stylesheet" type="text/css" href="css/navigation.css">
        <link rel="stylesheet" type="text/css" href="css/<?php echo $type;?>.css">
        <link rel="stylesheet" type="text/css" href="css/register.css">
        <link rel="stylesheet" type="text/css" href="css/invite.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/<?php echo $type;?>.js"></script>
    </head>
    <body>
    <?php
    require_once ("navigation.php");
    require_once ("register.html");
    require_once ("invite.html");

    switch($type){
        case "project":
            require_once ("project_page.php");
            load_project($url);
            break;
        case "team":
            require_once ("team_page.php");
            load_team($url);
            break;
        case "person":
            require_once ("person_page.php");
            load_person($url);
            break;
        case "my_page":
            require_once ("my_page.php");
            break;
        case "project_list":
            require_once ("project_list.php");
            break;
        case "project_editor":
            require_once ("project_editor.php");
            break;
        case "index":
            require_once ("index2.php");
            break;
    }
    require_once ("footer.html");


 /*   if($name != "index")
        require_once ($name.".php");
    else
        require_once ("index2.php");
    require_once ("footer.html");*/
}