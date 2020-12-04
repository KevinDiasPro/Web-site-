<!DOCTYPE html>

<?php
$GLOBALS["title"] = $GLOBALS["titleErr"] = $GLOBALS["year"] = $GLOBALS["real"] = $GLOBALS["realErr"] = $GLOBALS["trailer"] = $GLOBALS["trailerErr"] = "";
$curr_timestamp = date('Y');
include "valFilm.php"
?>
<html>
    <head>
        <title>Film</title>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link href="Css/filmForm.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <ul id="menu">
            <li><a href="http://localhost/MyProject2015/inscriptionForm.php">Accueil</a></li>
            <li><a href="recherche.php">Recherche</a></li>
            <li><a href="pageCompte.php">Votre page</a></li>
            <li><a href="http://localhost/MyProject2015/filmForm.php">Nouveau Film</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <fieldset>
                <legend>Nouveau film</legend>
                <div>
                    Titre(Vo)<br> 
                    <div class="error"><?php echo $GLOBALS["titleErr"]; ?></div>
                    <span><input type='text' name='title' autofocus="" placeholder="Titre" value="<?php echo $GLOBALS["title"]; ?>"/></span>
                </div>
                <div>
                    Réalisateur:<br> 
                    <div class="error"><?php echo $GLOBALS["realErr"]; ?></div>
                    <span><input type='text' name='real' placeholder="Réalisateur" value="<?php echo $GLOBALS["real"]; ?>"/></span>
                </div>
                <div>
                    Année:<br>
                    <select name="year">
                        <?php
                        for ($i = $curr_timestamp; $i >=1900 ; $i--) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?> 
                    </select>
                </div>
                <div>
                    genre: <br>
                    action<input type='checkbox' name='action'/>
                    aventure<input type='checkbox' name='animation'/>
                    biopic<input type='checkbox' name='biopic'/>
                    catastrophe<input type='checkbox' name='catastrophe'/>
                    comédie<input type='checkbox' name='comedie'/>
                    documentaire<input type='checkbox' name='docu'/><br>
                    drame<input type='checkbox' name='drame'/>
                    erotique<input type='checkbox' name='ero'/>
                    fantastique<input type='checkbox' name='fantastic'/>
                    fantasy<input type='checkbox' name='fantasy'/>
                    guerre<input type='checkbox' name='war'/>
                    historique<input type='checkbox' name='history'/><br>
                    horreur<input type='checkbox' name='horror'/>
                    musical<input type='checkbox' name='musical'/>
                    peplum<input type='checkbox' name='peplum'/>
                    science-fiction<input type='checkbox' name='sf'/>
                    thriller<input type='checkbox' name='thriller'/>
                    western<input type='checkbox' name='western'/>
                </div>
                <div><textarea name="Synopsis" rows="5" cols="50" placeholder="Résumé du film(optionnel)"></textarea></div>
                <div>
                    <span>Trailer: <input type="url" name='trailer' size="80" placeholder="https://www.exemple.dom" value="<?php echo $GLOBALS["trailer"]; ?>"/></span>
                    <span><?php echo $GLOBALS["trailerErr"]; ?></span>
                </div>
                <input type='submit' value='confirmer'/>
            </fieldset>
        </form>
    </body>
</html>
