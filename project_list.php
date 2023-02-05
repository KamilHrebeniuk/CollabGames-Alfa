<div class="container">
    <div class="col-2">
        <div class="search">
            <h2>Rozmieść według</h2>
            <form>
                <div class="search-point"><input type="radio" name="order_by" value="status">Statusu</div>
                <div class="search-point"><input type="radio" name="order_by" value="views">Ilości wyróżnień</div>
                <div class="search-point"><input type="radio" name="order_by" value="distinctions">Ilości wyświetleń</div>
                <div class="search-point"><input type="radio" name="order_by" value="date">Data dodania</div>
                <input class="submit-style" type="submit" value="Rozmieść">
            </form>
            <hr>
            <form>
                <div class="search-point"><input class="project_list-search-input" type="text" name="search" placeholder="Szukaj wewnątrz"></div>
                <div class="search-point"><input type="radio" name="search" value="views">Nazw</div>
                <div class="search-point"><input type="radio" name="search" value="distinctions">Opisów</div>
                <div class="search-point"><input type="radio" name="search" value="date">Kategorii</div>
                <div class="search-point"><input type="radio" name="search" value="distinctions">Członków</div>
                <div class="search-point"><input type="radio" name="search" value="date">Ofert</div>
                <hr>
                <h2>W zakresie dat</h2>
                <div class="search-point"><input class="project_list-date-input" type="date" name="search" value="status"></div>
                <div class="search-point"><input class="project_list-date-input" type="date" name="search" value="views"></div>
                <input class="submit-style" type="submit" value="Szukaj">
            </form>
        </div>
    </div>
    <div class="col-8 list">
        <div class="col-10">
            <img id="banner" src="potwor.png" alt="Nie ma"/>
        </div>

        <div class="col-10 create-container">
            <a href="project_create" class="create">
                Załóż projekt!
            </a>
        </div>

        <?php
        require "scripts/connect.php";
        try {
            $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
            $conn->exec("set names utf8");
            $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM `projects`");
            $stmt->execute();
            foreach ($stmt as $row) {
                echo '
                <div class="list-element">
                    <div class="col-3">
                        <img class="project-picture" src="potwor.png" alt="Nie ma"/>
                    </div>
                    <div class="col-5">
                        <div class="project-description-container">
                            <div class="project-title">'
                                .$row['Name'].
                            '</div>
                            <div class="project-description">'
                                .$row['ShortDesc'].
                            '</div>
                            <div class="project-links">
        
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="project-right-description-container">
                            <div class="project-progress">'
                                .$row['FinishedPart'].
                            '</div>
                            <div class="project-members-container">';
                                $stmt_tmp = $conn->prepare("SELECT * FROM `people` WHERE `ID` IN (SELECT `WorkerId` FROM `projectworkers` WHERE `ProjectID` =  :id)");
                                $stmt_tmp->bindParam(':id', $row['ID']);
                                $stmt_tmp->execute();
                                foreach($stmt_tmp as $row2) {
                                    echo'
                                    <div class="col-13">
                                        <img class="project-member" src='. $row2['Name'] .' alt="Nie ma"/>
                                    </div>';
                                }
                            echo'
                            </div>
                            <div class="project-duration">'
                                .$row['StartDate']. " - " . $row['EndDate'].
                            '</div>
                        </div>
                    </div>
                </div>';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $conn = null;
        ?>
    </div>
</div>

</body>
</html>