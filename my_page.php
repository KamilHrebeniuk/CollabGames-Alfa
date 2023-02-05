<?php

require "scripts/connect.php";
try {
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    $conn->exec("set names utf8");
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "2";
    $stmt = $conn->prepare("SELECT * FROM `people` WHERE `Name` = :name");
    $stmt->bindParam(':name', $_SESSION['UserName']);
    $stmt->execute();
    foreach ($stmt as $row) {
        $name = $row['Name'];
        $url = $row['URL'];
        $status = $row['Status'];
        $short_desc = $row['ShortDesc'];
        $long_desc = $row['LongDesc'];
        //       echo "<td>".$row['ID'].'</td> <td>'.$row['Name'].'</td> <td>'.$row['Status'].'</td> <td>'.$row['Distinguishions'].'</td> <td>'.$row['WWW'].'</td> <td>'.$row['StartDate'].'</td> <td>'.$row['EndDate'].'</td> <td>'.$row['FinishedPart'].'</td> <td>'.$row['ShortDesc'].'</td> <td>'.$row['LongDesc'].'</td>';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
$conn = null;
?>
<div class="main-container">
    <div id="my_page-tables-container">
        <div class="col-33">
            <div class="col-10 category_title my_page-table-title-margin">
                Powiadomienia:
            </div>
            <div class="my_page-table-container">
                <div class="col-10 table-container">
                    <div class="col-10 table-inside-container my_page-table-height scrollbar">
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 category_title my_page-table-title-margin">
                Oferty:
            </div>
            <div class="my_page-table-container">
                <div class="col-10 table-container">
                    <div class="col-10 table-inside-container my_page-table-height scrollbar">
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                    </div>
                </div>
            </div>
            <div class="my_page-table-create-button-container">
                Wystaw ofertę!
            </div>
        </div>
        <div class="col-33">
            <div class="col-10 category_title my_page-table-title-margin">
                Zakładki:
            </div>
            <div class="my_page-table-container">
                <div class="col-10 table-container">
                    <div class="col-10 table-inside-container my_page-table-height scrollbar">
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 category_title my_page-table-title-margin">
                Projekty:
            </div>
            <div class="my_page-table-container">
                <div class="col-10 table-container">
                    <div class="col-10 table-inside-container my_page-table-height scrollbar">
                        <div class="col-10 table-post">
                            <img src="potwor4.png"/>
                        </div>
                        <div class="col-10 table-post">
                            <img src="potwor4.png"/>
                        </div>
                        <div class="col-10 table-post">
                            <img src="potwor4.png"/>
                        </div>
                        <div class="col-10 table-post">
                            <img src="potwor4.png"/>
                        </div>
                        <div class="col-10 table-post">
                            <img src="potwor4.png"/>
                        </div>
                    </div>
                </div>
            </div>
            <a href="project_editor">
                <div class="my_page-table-create-button-container">
                    Utwórz projekt!
                </div>
            </a>
        </div>
        <div class="col-33">
            <div class="col-10 category_title my_page-table-title-margin">
                Historia przeglądania:
            </div>
            <div class="my_page-table-container">
                <div class="col-10 table-container">
                    <div class="col-10 table-inside-container my_page-table-height scrollbar">
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                        <div class="col-10 table-post my_page-table-post-height">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 category_title my_page-table-title-margin">
                Zespoły:
            </div>
            <div class="my_page-table-container">
                <div class="col-10 table-container">
                    <div class="col-10 table-inside-container my_page-table-height scrollbar">
                        <div class="col-10 table-post">
                            <img src="potwor4.png"/>
                        </div>
                        <div class="col-10 table-post">
                            <img src="potwor4.png"/>
                        </div>
                        <div class="col-10 table-post">
                            <img src="potwor4.png"/>
                        </div>
                        <div class="col-10 table-post">
                            <img src="potwor4.png"/>
                        </div>
                        <div class="col-10 table-post">
                            <img src="potwor4.png"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my_page-table-create-button-container">
                Załóż zespół!
            </div>
        </div>
    </div>
    <div class="col-10" id="my_page-info-main-container">
        <div class="col-10 category_title">
            Ustawienia profilu:
        </div>
        <div class="col-66">
            <div id="my_page-info-left-container">
                <div class="col-3">
                    <div class="col-12 my_page-info-title">
                        Zdjęcie profilowe
                    </div>
                    <div id="my_page-info-image-container">
                        <img src="Profile1.png" id="my_page-info-image"/>
                    </div>
                </div>
                <div class="col-7" id="my_page-info-name-url-style">
                    <div id="my_page-info-name-container">
                        <div class="col-12 my_page-info-title">
                            Nick
                        </div>
                        <div class="my_page-info-name-url-content">
                            <?php echo $name;?>
                        </div>
                    </div>
                    <div id="my_page-info-url-container">
                        <div class="col-12 my_page-info-title">
                            Adres
                        </div>
                        <div class="my_page-info-name-url-content">
                            collabgames.pl/<?php echo $url;?>
                        </div>
                    </div>
                </div>
                <div id="my_page-info-long-description-container">
                    <div class="col-12 my_page-info-title">
                        Opis profilu
                    </div>
                    <textarea id="my_page-info-long-description"><?php echo $long_desc;?></textarea>
                </div>
            </div>
        </div>
        <div class="col-33">
            <div id="my_page-info-right-container">
                <div class="my_page-info-external-container">
                    <div class="col-12 my_page-info-title">
                        Profil Facebook
                    </div>
                    <div class="my_page-info-external-content">
                        facebook.com/
                    </div>
                </div>
                <div class="my_page-info-external-container">
                    <div class="col-12 my_page-info-title">
                        Powiązane strony
                    </div>
                    <div class="my_page-info-external-content">
                        mojastrona.pl
                    </div>
                    <div class="my_page-info-external-content">
                        fajnyprofil.net
                    </div>
                    <div class="my_page-info-external-content">
                        wymieniepralke.com
                    </div>
                    <div class="my_page-info-external-content">
                        szukampsychologa.net
                    </div>
                </div>
                <div class="my_page-info-external-container">
                    <div class="col-12 my_page-info-title">
                        Mail kontaktowy
                    </div>
                    <div class="my_page-info-external-content">
                        aaaaaaaaaa
                    </div>
                </div>
                <div class="my_page-info-external-container">
                    <div class="col-12 my_page-info-title">
                        Specjalizacje
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>