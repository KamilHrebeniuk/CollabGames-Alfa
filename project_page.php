<?php
function load_project($url)
{
    require "scripts/connect.php";
    try {
        $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
        $conn->exec("set names utf8");
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "2";
        $stmt = $conn->prepare("SELECT * FROM `projects` WHERE `URL` = :url");
        $stmt->bindParam(':url', $url);
        $stmt->execute();
        foreach ($stmt as $row) {
            $id = $row['ID'];
            $name = $row['Name'];
            $status = $row['Status'];
            $short_desc = $row['ShortDesc'];
            $long_desc = $row['LongDesc'];
            //    echo "<td>".$row['ID'].'</td> <td>'.$row['Name'].'</td> <td>'.$row['Status'].'</td> <td>'.$row['Distinguishions'].'</td> <td>'.$row['WWW'].'</td> <td>'.$row['StartDate'].'</td> <td>'.$row['EndDate'].'</td> <td>'.$row['FinishedPart'].'</td> <td>'.$row['ShortDesc'].'</td> <td>'.$row['LongDesc'].'</td>';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    ?>
    <div id="lightbox-background"></div>
    <img id="lightbox-image" src="../potwor3.png"/>
    <img src="../potwor3.png" class="project_page-background-image">
    <div class="project_page-gradient">
    </div>
    <div class="project_page-main-container">
        <div class="col-7 project_page-container-left">
            <h1 class="main_title col-8">
                <?php echo $name; ?>
            </h1>
            <?php
            switch ($status) {
                case "Active":
                    echo
                    '<div class="col-2 project_page-status status-active">
                    Aktywny
                </div>';
                    break;
                case "Suspended":
                    echo
                    '<div class="col-2 project_page-status status-suspended">
                    Wstrzymany
                </div>';
                    break;
                case "Terminated":
                    echo
                    '<div class="col-2 project_page-status status-terminated">
                    Zakończony
                </div>';
                    break;
                case "Released":
                    echo
                    '<div class="col-2 project_page-status status-released">
                    Wydany
                </div>';
                    break;
            }
            ?>
            <div class="col-10 project_page-slider">
                <div class="col-10 project_page-slider-shadow-box">
                    <img src="../potwor3.png" class="col-10 project_page-slider-main-image">
                </div>
            </div>

            <div class="col-10 project_page-team">
                <div class="col-10 category_title">
                    Nasz zespół:
                </div>
                <div class="col-10 project_page-team-miniature-container">
                    <div class="col-10 project_page-team-miniature-inside-container scrollbar">
                        <?php
                        $stmt_tmp = $conn->prepare("SELECT * FROM `people` WHERE `ID` IN (SELECT `WorkerId` FROM `projectworkers` WHERE `ProjectID` =  :id)");
                        $stmt_tmp->bindParam(':id', $id);
                        $stmt_tmp->execute();
                        foreach($stmt_tmp as $row2) {
                            echo'<img class="project_page-team-miniature-image" src='. $row2['Name'] .' alt="Nie ma"/>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-10 table">
                <div class="col-10 category_title">
                    Lista zmian:
                </div>
                <div class="col-10 table-container">
                    <div class="col-10 table-inside-container project_page-changelog-height scrollbar">
                        <div class="col-10 table-post">
                            <div class="col-8 table-title">
                                Update 11.6 This Big
                            </div>
                            <div class="col-2 table-date">
                                20.10.2018r.
                            </div>
                            <div class="col-10 table-text">
                                Typ wynagrodzenia – jeden ze sposobów wynagrodzenia. W przypadku zlecenia jest
                                również podana jego wartość
                            </div>
                            <div class="col-10 table-image-container">
                                <script src="js/basic.js"></script>
                                <img onclick="fullScreenShow(this)" src="../potwor1.png" class="table-image" alt="Nie ma"/>
                                <img onclick="fullScreenShow(this)" src="../potwor2.png" class="table-image" alt="Nie ma"/>
                                <img onclick="fullScreenShow(this)" src="../potwor3.png" class="table-image" alt="Nie ma"/>
                                <img onclick="fullScreenShow(this)" src="../potwor4.png" class="table-image" alt="Nie ma"/>
                            </div>
                        </div>
                        <div class="col-10 table-post">
                            <div class="col-8 table-title">
                                Update 11.6 This Big
                            </div>
                            <div class="col-2 table-date">
                                20.10.2018r.
                            </div>
                            <div class="col-10 table-text">
                                Typ wynagrodzenia – jeden ze sposobów wynagrodzenia. W przypadku zlecenia jest
                                również podana jego wartość
                            </div>
                            <div class="col-10 table-image-container">

                            </div>
                        </div>
                        <div class="col-10 table-post">
                            <div class="col-8 table-title">
                                Update 11.6 This Big
                            </div>
                            <div class="col-2 table-date">
                                20.10.2018r.
                            </div>
                            <div class="col-10 table-text">
                                Typ wynagrodzenia – jeden ze sposobów wynagrodzenia. W przypadku zlecenia jest
                                również podana jego wartość
                            </div>
                            <div class="col-10 table-image-container">
                                <img src="../potwor3.png" class="table-image" alt="Nie ma"/>
                                <img src="../potwor2.png" class="table-image" alt="Nie ma"/>
                            </div>
                        </div>
                        <div class="col-10 table-post">
                            <div class="col-8 table-title">
                                Update 11.6 This Big
                            </div>
                            <div class="col-2 table-date">
                                20.10.2018r.
                            </div>
                            <div class="col-10 table-text">
                                Typ wynagrodzenia – jeden ze sposobów wynagrodzenia. W przypadku zlecenia jest
                                również podana jego wartość
                            </div>
                            <div class="col-10 table-image-container">
                                <img src="../potwor1.png" class="table-image" alt="Nie ma"/>
                                <img src="../potwor2.png" class="table-image" alt="Nie ma"/>
                                <img src="../potwor3.png" class="table-image" alt="Nie ma"/>
                            </div>
                        </div>
                        <div class="col-10 table-post">
                            <div class="col-8 table-title">
                                Update 11.6 This Big
                            </div>
                            <div class="col-2 table-date">
                                20.10.2018r.
                            </div>
                            <div class="col-10 table-text">
                                Typ wynagrodzenia – jeden ze sposobów wynagrodzenia. W przypadku zlecenia jest
                                również podana jego wartość
                            </div>
                            <div class="col-10 table-image-container">

                            </div>
                        </div>
                        <div class="col-10 table-post">
                            <div class="col-8 table-title">
                                Update 11.6 This Big
                            </div>
                            <div class="col-2 table-date">
                                20.10.2018r.
                            </div>
                            <div class="col-10 table-text">
                                Typ wynagrodzenia – jeden ze sposobów wynagrodzenia. W przypadku zlecenia jest
                                również podana jego wartość
                            </div>
                            <div class="col-10 table-image-container">
                                <img src="../potwor1.png" class="table-image" alt="Nie ma"/>
                                <img src="../potwor2.png" class="table-image" alt="Nie ma"/>
                            </div>
                        </div>
                        <div class="col-10 table-post">
                            <div class="col-8 table-title">
                                Update 11.6 This Big
                            </div>
                            <div class="col-2 table-date">
                                20.10.2018r.
                            </div>
                            <div class="col-10 table-text">
                                Typ wynagrodzenia – jeden ze sposobów wynagrodzenia. W przypadku zlecenia jest
                                również podana jego wartość
                            </div>
                            <div class="col-10 table-image-container">

                            </div>
                        </div>
                        <div class="col-10 table-post">
                            <div class="col-8 table-title">
                                Update 11.6 This Big
                            </div>
                            <div class="col-2 table-date">
                                20.10.2018r.
                            </div>
                            <div class="col-10 table-text">
                                Typ wynagrodzenia – jeden ze sposobów wynagrodzenia. W przypadku zlecenia jest
                                również podana jego wartość
                            </div>
                            <div class="col-10 table-image-container">

                            </div>
                        </div>
                        <div class="col-10 table-post">
                            <div class="col-8 table-title">
                                Update 11.6 This Big
                            </div>
                            <div class="col-2 table-date">
                                20.10.2018r.
                            </div>
                            <div class="col-10 table-text">
                                Typ wynagrodzenia – jeden ze sposobów wynagrodzenia. W przypadku zlecenia jest
                                również podana jego wartość
                            </div>
                            <div class="col-10 table-image-container">

                            </div>
                        </div>
                        <div class="col-10 table-post">
                            <div class="col-8 table-title">
                                Update 11.6 This Big
                            </div>
                            <div class="col-2 table-date">
                                20.10.2018r.
                            </div>
                            <div class="col-10 table-text">
                                Typ wynagrodzenia – jeden ze sposobów wynagrodzenia. W przypadku zlecenia jest
                                również podana jego wartość
                            </div>
                            <div class="col-10 table-image-container">

                            </div>
                        </div>
                        <div class="col-10 table-post">
                            <div class="col-8 table-title">
                                Update 11.6 This Big
                            </div>
                            <div class="col-2 table-date">
                                20.10.2018r.
                            </div>
                            <div class="col-10 table-text">
                                Typ wynagrodzenia – jeden ze sposobów wynagrodzenia. W przypadku zlecenia jest
                                również podana jego wartość
                            </div>
                            <div class="col-10 table-image-container">

                            </div>
                        </div>
                        <div class="col-10 table-post">
                            <div class="col-8 table-title">
                                Update 11.6 This Big
                            </div>
                            <div class="col-2 table-date">
                                20.10.2018r.
                            </div>
                            <div class="col-10 table-text">
                                Typ wynagrodzenia – jeden ze sposobów wynagrodzenia. W przypadku zlecenia jest
                                również podana jego wartość
                            </div>
                            <div class="col-10 table-image-container">

                            </div>
                        </div>
                        <div class="col-10 table-post">
                            <div class="col-8 table-title">
                                Update 11.6 This Big
                            </div>
                            <div class="col-2 table-date">
                                20.10.2018r.
                            </div>
                            <div class="col-10 table-text">
                                Typ wynagrodzenia – jeden ze sposobów wynagrodzenia. W przypadku zlecenia jest
                                również podana jego wartość
                            </div>
                            <div class="col-10 table-image-container">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 project_page-description">
                <div class="col-10 category_title">
                    O projekcie:
                </div>
                <div class="col-10 project_page-description-container">
                    <?php echo $long_desc; ?>
                </div>
            </div>
            <div class="col-10 project_page-recommended">
                <div class="col-10 category_title">
                    Proponowane:
                </div>
                <div class="col-10 project_page-recommended-miniature-container">
                    <div class="col-10 project_page-recommended-miniature-inside-container scrollbar">
                        <img src="../potwor2.png" class="project_page-recommended-miniature-image">
                        <img src="../potwor2.png" class="project_page-recommended-miniature-image">
                        <img src="../potwor3.png" class="project_page-recommended-miniature-image">
                        <img src="../potwor1.png" class="project_page-recommended-miniature-image">
                        <img src="../potwor3.png" class="project_page-recommended-miniature-image">
                    </div>
                </div>
            </div>
            <div class="col-10 project_page-comments">
                Komentarze
            </div>
        </div>

        <div class="col-3 project_page-container-right">
            <div class="col-10 project_page-info">
                <div class="col-5" id="project_page-start-date">
                    10.01.2018r.
                </div>
                <div class="col-5" id="project_page-end-date">
                    22.11.2018r.
                </div>
                <img class="col-10 project_page-progress-bar" src="progress-bar.png" alt="Nie ma"/>
                <img class="col-10 project_page-project-main-image" src="../potwor2.png" alt="Nie ma"/>
                <div class="col-10 project_page-project-short-desc">
                    <?php echo $short_desc; ?>
                </div>
            </div>
            <div class="col-10 project_page-offers">
                <div class="col-10 category_title">
                    Poszukujemy:
                </div>
                <div class="col-10 table-container">
                    <div class="col-10 table-inside-container project_page-offers-height scrollbar">
                        <div class="col-10 table-post">
                            <div class="col-7 table-title">
                                Update 11.6 This Big
                            </div>
                            <div class="col-10 table-text">
                                Typ wynagrodzenia – jeden ze sposobów wynagrodzenia. W przypadku zlecenia jest
                                również podana jego wartość
                            </div>
                        </div>
                        <div class="col-10 table-post">
                            <div class="col-7 table-title">
                                Update 11.6 This Big
                            </div>
                            <div class="col-10 table-text">
                                Typ wynagrodzenia – jeden ze sposobów wynagrodzenia. W przypadku zlecenia jest
                                również podana jego wartość
                            </div>
                        </div>
                        <div class="col-10 table-post">
                            <div class="col-7 table-title">
                                Update 11.6 This Big
                            </div>
                            <div class="col-10 table-text">
                                Typ wynagrodzenia – jeden ze sposobów wynagrodzenia. W przypadku zlecenia jest
                                również podana jego wartość
                            </div>
                        </div>
                        <div class="col-10 table-post">
                            <div class="col-7 table-title">
                                Update 11.6 This Big
                            </div>
                            <div class="col-10 table-text">
                                Typ wynagrodzenia – jeden ze sposobów wynagrodzenia. W przypadku zlecenia jest
                                również podana jego wartość
                            </div>
                        </div>
                        <div class="col-10 table-post">
                            <div class="col-7 table-title">
                                Update 11.6 This Big
                            </div>
                            <div class="col-10 table-text">
                                Typ wynagrodzenia – jeden ze sposobów wynagrodzenia. W przypadku zlecenia jest
                                również podana jego wartość
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 project_page-ads">
                <div class="col-10 category_title">
                    Reklama:
                </div>
                <div class="col-10 ads-container">
                    <img src="Ad1.png" class="ads-image-gr1" alt="Nie ma"/>
                    <img src="Ad2.png" class="ads-image-gr2" alt="Nie ma"/>
                </div>
            </div>
        </div>
    </div>
    <?php
    $conn = null;
}