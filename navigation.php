<nav>
	<div class="navigation-container">
		<div class="navigation-logo-container"><a href="index.php"><img id="collabgames-logo" src="collablogo.png" alt="colabgames logo"/></a></div>

		<div class="navigation-search-box-container">
			<form method="post" action="basicsearch.php">
				<input id="search-input-style" type="text" placeholder="wyszukaj" name="query">
				<select id="search-options-style" name="target">
					<option value="all">wszystkie działy</option>
					<option value="projects">projekty</option>
					<option value="teams">zespoły</option>
					<option value="people">osoby</option>
					<option value="offerts">oferty</option>
				</select>
				<input id="search-button-style" type="submit" value="">
			</form>
		</div>


		<div class="navigation-categories-container">
			<div id="categories-icon">
				<img src="images/categories.png">
			</div>
			<div class="categories">
				<div class="categories-button">KATEGORIE</div>
				<div class="categories-content">
					<a href="project_list"><img class="categories-miniature" src="collablogo.png" alt="colabgames logo"/><div class="categories-name">Projekty</div></a>
					<a href="project_page"><img class="categories-miniature" src="collablogo.png" alt="colabgames logo"/><div class="categories-name">Zespoły</div></a>
					<a href="#"><img class="categories-miniature" src="collablogo.png" alt="colabgames logo"/><div class="categories-name">Osoby</div></a>
					<a href="#"><img class="categories-miniature" src="collablogo.png" alt="colabgames logo"/><div class="categories-name">Oferty</div></a>
				</div>
			</div>
		</div>

        <?php
        if($_SESSION['UserID'] == 0) {
            echo "
            <div class=\"navigation-login-container\" >
                <div onclick = \"document.getElementById('login-container').style.display='block';document.getElementById('register-container').style.display='none'\" ><a id = \"login\" href = \"#\" > Zaloguj się </a ></div >
            </div >
    
            <div class=\"navigation-register-container\" >
                <div onclick = \"document.getElementById('register-container').style.display='block';document.getElementById('login-container').style.display='none'\" ><a id = \"register\" href = \"#\" > Zarejestruj się </a ></div >
            </div >";
		}
		else{
            echo"
            <a href='my_page'>
                <div class='navigation-account-container'>
                    <div id='navigation-account-name'>".
                        $_SESSION['UserName']
                    ."</div>
                    <img src='potwor3.png' id='navigation-account-image' alt='Nie ma'/>
                </div>
            </a>";
        }
		?>
	</div>
</nav>