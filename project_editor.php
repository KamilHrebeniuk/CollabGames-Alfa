<img src="../potwor3.png" id="project_page-background-image">
<div class="project_page-gradient">
</div>
<form method="post" action="basicsearch.php">
    <div class="project_page-main-container">
        <div class="col-10 editor-tutorial-container">
            <div class="col-10 editor-tutorial-description">
                Witaj w kreatorze projektu. Wypełnij wszystkie pola zaznaczone na czerwono oraz ustaw grafikę główną i miniaturę projektu. Gdy strona Twojego projektu będzie gotowa wciśnij "Opublikuj projekt!". Wszystkie elementy będziesz mógł edytować również po opublikowaniu.
            </div>
            <div id="editor-tutorial-url-description">collabgames.pl/</div>
            <input id="editor-tutorial-url" type="text" placeholder="TuWpiszSwójAdres" name="query">
            <div class="col-10 editor-tutorial-create-container">
                <input id="editor-tutorial-create" type="submit" value="Opublikuj projekt!"/>
            </div>
        </div>
        <div class="col-7 project_page-container-left">
            <h1 class="main_title col-8">
                <input id="editor-main-title" type="text" placeholder="Nazwij swój projekt!" name="query">
            </h1>
            <div class="col-2 project_page-status status-active">
                Aktywny
            </div>
            <div class="col-10 project_page-slider">
                <div class="col-10 project_page-slider-shadow-box">
                    <form>
                        <div class="col-10" id="project_editor-slider-main-image-container">
                            <img class="project_editor-slider-main-image" src="images/drop-photo.png"/>
                        </div>
                        <input type="file" name="project_editor-miniature-input" id="project_editor-miniature-input" />
                    </form>
                </div>
            </div>

            <div class="col-10 project_page-team">
                <div class="col-10 category_title">
                    Nasz zespół:
                </div>
                <div class="col-10 project_page-team-miniature-container">
                    <div class="col-10 project_page-team-miniature-inside-container scrollbar">
                        <img src="people/<?php echo $_SESSION['UserName'] . "/images/miniature.png"; ?>" class="project_page-team-miniature-image"/>
                        <img src="Add.png" class="project_page-team-miniature-image" onclick = "document.getElementById('invite-container').style.display='block'";/>
                    </div>
                </div>
            </div>
            <div class="col-10 project_page-description">
                <div class="col-10 category_title">
                    O projekcie:
                </div>
                <div class="col-10 project_page-description-container">
                    <textarea class="col-10" id="editor-long-desc" placeholder="Tu umieść pełny opis swojego projektu" name="query"></textarea>
                </div>
            </div>
        </div>

        <div class="col-3 project_page-container-right">
            <div class="col-10 project_page-info">
                <script src="js/basic.js"></script>
                <div class="col-5" id="project_page-start-date">
                    <script>
                        getCurrentDate();
                    </script>
                </div>
                <div class="col-5" id="project_page-end-date">
                    22.11.2018r.
                </div>
                <img class="col-10 project_page-progress-bar" src="progress-bar.png" alt="Nie ma"/>
                <div class="col-10 project_page-project-main-image">
                    <img class="project_editor-slider-main-image" src="../potwor2.png"/>
                </div>
                <textarea class="col-10" id="editor-short-desc" placeholder="Tu umieść skrócony opis swojego projektu" name="query"></textarea>
            </div>
        </div>
    </div>
</form>