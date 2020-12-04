<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    checkTitle();
    checkReal();
    checkTrailer();
    checkFilmform();
}

function checkTitle() {
    if (empty($_POST["title"])) {
        $GLOBALS["titleErr"] = "Required";
    } else {
        $GLOBALS["title"] = $_POST["title"];
        $GLOBALS["title"] = ucwords($GLOBALS["title"]); //première lettre maj
    }
}

function checkReal() {
    if (empty($_POST["real"])) {
        $GLOBALS["realErr"] = "Required";
    } else {
        $GLOBALS["real"] = test_input($_POST["real"]); //formatage de l'entrée
        $GLOBALS["real"] = ucwords($GLOBALS["real"]); //première lettre maj
        if (!preg_match("#^[a-zA-Z\s.-]+$#", $GLOBALS["real"])) {
            $GLOBALS["realErr"] = "Invalid format!";
            $GLOBALS["real"] = "";
        }
    }
}

function checkTrailer() {
    if (!empty($_POST["trailer"])) {
        $GLOBALS["trailer"] = test_input($_POST["trailer"]);
        $GLOBALS["trailer"] = trim($GLOBALS["trailer"]);
        if (!preg_match("#https?://w{3}\.[a-zA-Z0-9_-]+\.[a-z]{2,4}#", $GLOBALS["trailer"])) {
            $GLOBALS["trailerErr"] = "Invalid url format!";
            $GLOBALS["trailer"] = "";
        }
    }
}

function checkFilmform() {
    if ($GLOBALS["title"] != "" && $GLOBALS["real"] != "") {
        echo "Film enregistré avec succès";
    } elseif (!empty($_POST["submit"])) {
        echo "Un des champs n'a pas été convenablement complété";
    }
}

function test_input($data) {
    $data = htmlspecialchars($data);
    return $data;
}
