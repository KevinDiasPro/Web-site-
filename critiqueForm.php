<!DOCTYPE html>

<?php
//$title = $titleErr = $year = $real = $realErr = $trailer = $trailerErr = "";
$curr_timestamp = date('Y-m-d');
include "valCritique.php"
?>

<html>
    <head>
        <title>Critique</title>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    </head>
    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <fieldset>
                <legend>Votre critique</legend>
                <div>
                    Note 0 <input type="range" id="range" name="note" min='0' max='10' 
                                  onchange="document.getElementById('show').value = document.getElementById('range').value;">
                    <input type="text" id="show" size="1" placeholder="5"/>
                </div>
                <div>Grade 
                    <select>
                        <option value="Masterpiece">Masterpiece</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Bon">Bon</option> 
                        <option value="Moyen">Moyen</option> 
                        <option value="Mauvais">Mauvais</option> 
                        <option value="Catastrophique">Catastrophique</option> 
                    </select>
                    <input type="radio"/>Coup de coeur 
                    <a href="grade.html" target="_blank">?</a>
                </div>
                    
                    <div><textarea name="Commentaire" rows="5" cols="40" placeholder="Votre critique(optionnelle)"></textarea></div>
                    <input type='submit' name="submit" value='confirmer'/>
            </fieldset>
        </form>
    </body>
</html>
