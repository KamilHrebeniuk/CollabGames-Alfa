<?php
function load_person($url){
    require "scripts/connect.php";
    try {
        $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
        $conn->exec("set names utf8");
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "2";
        $stmt = $conn->prepare("SELECT * FROM `people` WHERE `URL` = :url");
        $stmt->bindParam(':url', $url);
        $stmt->execute();
        foreach ($stmt as $row) {
            $name = $row['Name'];
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
    <div class="person_page-main-container">
        <div class="col-7 person_page-container-left">
            <div class="col-10 person_page-description">
                <div class="col-10 main_title">
                    <?php echo $name; ?>
                </div>
                <div class="col-10 person_page-description-container">
                    <img src="Profile1.png" class="person_page-description-image"/>
                    <?php echo $long_desc; ?>
                </div>
            </div>
            <div class="col-5 person_page-finished-projects">
                <div class="col-10 category_title">
                    Realizuję projekty:
                </div>
                <div class="col-10 table-container">
                    <div class="col-10 table-inside-container person_page-finished-projects-height scrollbar">
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
            <div class="col-5 person_page-current-projects">
                <div class="col-10 category_title">
                    Uczestniczyłem w projektach:
                </div>
                <div class="col-10 table-container">
                    <div class="col-10 table-inside-container person_page-finished-projects-height scrollbar">
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
            <div class="col-5 person_page-team">
                <div class="col-10 category_title">
                    Należę do zespołów:
                </div>
                <div class="col-10 person_page-team-container">
                    <img src="Profile1.png" class="person_page-team-member-image"/>
                    <img src="Profile2.png" class="person_page-team-member-image"/>
                    <img src="Profile5.png" class="person_page-team-member-image"/>
                    <img src="Profile4.png" class="person_page-team-member-image"/>
                    <img src="Profile3.png" class="person_page-team-member-image"/>
                    <img src="Profile1.png" class="person_page-team-member-image"/>
                    <img src="Profile2.png" class="person_page-team-member-image"/>
                    <img src="Profile4.png" class="person_page-team-member-image"/>
                    <img src="Profile6.png" class="person_page-team-member-image"/>

                </div>
            </div>
            <div class="col-5 person_page-offers">
                <div class="col-10 category_title">
                    Szukam:
                </div>
                <div class="col-10 table-container">
                    <div class="col-10 table-inside-container person_page-offers-height scrollbar">
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
            <div class="col-10 person_page-comments">
                Komentarze
            </div>
        </div>
        <div class="col-3 person_page-container-right">
            <div class="col-10 person_page-info">
                <div class="col-10 category_title">
                    Przegląd:
                </div>
                <div class="col-10 person_page-info-container">
                    <div class="col-3 person_page-facebook">
                        Facebook
                    </div>
                    <div class="col-4 person_page-distinctions-container">
                        <div class="col-10 person_page-distinctions">
                            Wyróżnienia
                        </div>
                    </div>
                    <div class="col-3 person_page-status">
                        Active
                    </div>
                    <div class="person_page-webpage">
                        www.super-project.com
                    </div>
                    <div class="person_page-webpage">
                        www.super-project.com
                    </div>
                    <div class="person_page-contact">
                        projekt@super-company.com
                    </div>
                    <div class="person_page-contact">
                        awesome@team.net
                    </div>
                </div>
            </div>
            <div class="col-10 person_page-specializations">
                <div class="col-10 category_title">
                    Specjalizacje:
                </div>
                <div class="col-10 person_page-specializations-container">
                    <img src="cpp.png" class="person_page-specializations-image"/>
                    <img src="cpp.png" class="person_page-specializations-image"/>
                    <img src="cpp.png" class="person_page-specializations-image"/>
                    <img src="cpp.png" class="person_page-specializations-image"/>
                </div>
            </div>
            <div class="col-10 person_page-references">
                <div class="col-10 category_title">
                    Referencje:
                </div>
                <div class="col-10 table-container">
                    <div class="col-10 table-inside-container person_page-references-height scrollbar">
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
            <div class="col-10 person_page-ads">
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
}