<?php
require_once "connect.php";
try {
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare('CALL `insert_into_people`(:url, :name, :email, :password);');
    $stmt->bindParam(':url', substr(sha1($_POST['name'].strval(time()))), 0, 30);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', sha1($_POST['password']));
    $stmt->execute();

    mkdir('../people/'.$_POST['name'].'/images/', 0777, true);
}
catch(PDOException $e)
{
    $message = $e->getMessage();
    echo $message;
    if (strpos($message, 'Duplicate entry') !== false) {
        echo "This nick is already used";
    }
    else {
        $e->getMessage();
    }
}
$conn = null;