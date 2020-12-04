<!DOCTYPE html>

<?php
$GLOBALS["lastname"] = $GLOBALS["lastnameErr"] = $GLOBALS["firstname"] = $GLOBALS["firstnameErr"] = $_SESSION['email']
        = $GLOBALS["emailErr"] = $_SESSION['password'] = $GLOBALS["passwordErr"] = $GLOBALS["birthdate"]
        = $GLOBALS["profil"] = $GLOBALS["msgI"] = $GLOBALS["msgC"] = "";
$curr_timestamp = date('Y-m-d');
include "valInscription.php";
inscriptionVal();

?>
<html>
    <head>
        <title>Connection/Inscription</title>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> 
        <script src="http://cdn.jsdelivr.net/jquery.validation/1.13.1/jquery.validate.min.js" type="text/javascript"></script>
        <script src="jquery/valInscription.js" type="text/javascript"></script>
        <link href="Css/inscription.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <ul id="menu">
            <li><a href="http://localhost/MyProject2015/inscriptionForm.php">Accueil</a></li>
            <li><a href="http://localhost/MyProject2015/filmForm.php">Nouveau Film</a></li>
            <li><a href="recherche.php">Recherche</a></li>
            <li><a href="pageCompte.php">Votre page</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>

        <h2>Bienvenue sur YourMovies, partagez votre passion du 7eme art</h2>

        <form id="formConnection" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <fieldset>
                <legend>Connection</legend>
                <?php echo $GLOBALS["msgC"] ?>
                <div>
                    <label for="email">Addresse Email:</label><br>
                    <div class="error"><?php displayErrCo($GLOBALS["emailErr"]); ?></div>
                    <span><input type='text' id="email" name='email' autofocus="" placeholder="Email" value="<?php echo displayValC($_SESSION['email']); ?>" ></span>
                    
                </div>
                <div>
                    Mot de passe:<br>
                    <div class="error"><?php displayErrCo($GLOBALS["passwordErr"]); ?></div>
                    <span><input type='password' name='password' placeholder="Password" value="<?php echo displayValC($_SESSION['password']); ?>" ></span>
                </div>
                <span><input type='submit' name="submitC" value='confirmer'/></span>
            </fieldset>
        </form>
        <form id="formInscription" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <fieldset>
                <legend>Inscription</legend>
                <?php echo $GLOBALS["msgI"] ?>
                <div>
                    Nom:<br>
                    <div class="error"><?php displayErrI($GLOBALS["lastnameErr"]); ?></div>
                    <span><input type='text' name='lastname' placeholder="Nom" value="<?php echo $GLOBALS["lastname"]; ?>" ></span>
                </div> 
                <div>
                    Prénom:<br>
                    <div class="error"><?php  displayErrI($GLOBALS["firstnameErr"]); ?></div>
                    <span><input type='text' name='firstname' placeholder="Prénom" value="<?php echo $GLOBALS["firstname"]; ?>" ></span>
                </div>
                <div>
                    Adresse email:<br>
                    <div class="error"><?php echo displayErrI($GLOBALS["emailErr"]); ?></div>
                    <span><input type='text' name='email' placeholder="Email" value="<?php echo displayValI($_SESSION['email']); ?>" ></span>
                </div>
                <div>
                    Mot de passe:<br>
                    <div class="error"><?php echo displayErrI($GLOBALS["passwordErr"]); ?></div>
                    <span><input type='password' name='password' placeholder="Password" value="<?php echo displayValI($_SESSION['password']); ?>" ></span>
                </div>
                <div>
                    <span>Date de naissance(jj-mm-aaaa): 
                        <br><select name="day">
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                        /
                        <select name="month">
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?> 
                        </select>
                        /
                        <select name="year" >
                            <?php
                            for ($i = 1900; $i <= $curr_timestamp; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?> 
                        </select>
                    </span>
                </div>
                <div>
                    <span>Votre profil: <a href="profil.html" target="_blank">?</a>
                        <br><select id="profil" name="profil">
                            <option value="Cinephile">Cinephile</option>
                            <option value="Amateur">Amateur</option>
                            <option value="Profane">Profane</option> 
                        </select>
                    </span>
                </div>
                <span><input type='submit' name="submitI" value='confirmer'/></span>
            </fieldset>
        </form>
    </body>
</html>