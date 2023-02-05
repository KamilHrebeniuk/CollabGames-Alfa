<?php
require_once "connect.php";
try {
    session_start();
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo $_POST['login'] . " " . $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM people WHERE (`Name` = :login1 OR `Email` = :login2) AND `Password` = :password");
    echo "AAAAAAAAA";
    $stmt->bindParam('login1', $_POST['login']);
    $stmt->bindParam('login2', $_POST['login']);
    $stmt->bindParam('password', sha1($_POST['password']));
    $stmt->execute();
    echo "BBBBBBBBBB";

    echo '<table border="1">';
    foreach ($stmt as $row) {
        $_SESSION['UserID'] = $row['ID'];
        $_SESSION['UserName'] = $row['Name'];
        echo "SESJA" . $_SESSION['UserID'];
        echo "<tr>";
        echo "<td>".$row['ID'].'</td> <td>'.$row['Name'].'</td> <td>'.$row['Status'].'</td> <td>'.$row['Distinguishions'].'</td> <td>'.$row['WWW'].'</td> <td>'.$row['StartDate'].'</td> <td>'.$row['EndDate'].'</td> <td>'.$row['FinishedPart'].'</td> <td>'.$row['ShortDesc'].'</td> <td>'.$row['LongDesc'].'</td>';
        echo "</tr>";
    }
    echo "</table>";
}
catch(PDOException $e)
{
    $message = $e->getMessage();
    echo $message;
}
$conn = null;