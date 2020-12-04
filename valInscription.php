<?php

function inscriptionVal() {
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["submitI"])) {
            checkLastname();
            checkFirstname();
            checkMail();
            checkPassword();
            //$GLOBALS["birthdate"] = test_input($_POST["year"]) . '-' . test_input($_POST["month"]) . '-' . test_input($_POST["day"]);
            checkInscription();
        } elseif (!empty($_POST["submitC"])) {
            session_start();
            checkMail();
            checkPassword();
            checkConnection();
        }
    }
}

function checkLastname() {
    if (empty(filter_input(INPUT_POST, 'lastname'))) {
        $GLOBALS['lastnameErr'] = "Required";
    } else {
        $GLOBALS["lastname"] = test_input($_POST["lastname"]); //formatage de l'entrée
        $GLOBALS["lastname"] = ucwords($GLOBALS["lastname"]); //première lettre maj
        if (!preg_match("#^[a-zA-Z-]+$#", $GLOBALS["lastname"])) {
            $GLOBALS['lastnameErr'] = "Invalid format!";
            $GLOBALS["lastname"] = "";
        }
    }
}

function checkFirstname() {
    if (empty(filter_input(INPUT_POST, 'firstname'))) { //$_POST["firstname"]
        $GLOBALS["firstnameErr"] = "Required";
    } else {
        //$regex = "/^[a-zA-Z-]*$/";
        $GLOBALS["firstname"] = test_input($_POST["firstname"]); //formatage de l'entrée
        $GLOBALS["firstname"] = ucwords($GLOBALS["firstname"]); //première lettre maj        
        if (!preg_match("#^[a-zA-Z-]+$#", $GLOBALS["firstname"])) {
            $GLOBALS["firstnameErr"] = "Invalid format!";
            $GLOBALS["firstname"] = "";
        }
    }
}

function checkMail() {
    if (empty($_POST["email"])) {
        $GLOBALS["emailErr"] = "Required";
    } else {
        $_SESSION['email'] = test_input($_POST["email"]);
        if (!preg_match("#^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-_.]{2,}\.[a-z]{2,4}$#", $_SESSION['email'])) {
            $GLOBALS["emailErr"] = "Invalid email format!";
            $_SESSION['email'] = "";
        }
    }
}

function checkPassword() {
    if (empty($_POST["password"])) {
        $GLOBALS["passwordErr"] = "Required";
    } else {
        $_SESSION['password'] = test_input($_POST["password"]);
        $uppercase = preg_match('#[A-Z]#', $_SESSION['password']);
        $lowercase = preg_match('#[a-z]#', $_SESSION['password']);
        $number = preg_match('#[0-9]#', $_SESSION['password']);
        $specialchar = preg_match('#\W#', $_SESSION['password']);
        if (strlen($_SESSION['password']) < 8){
            $GLOBALS["passwordErr"] = "8 characters required";
            $_SESSION['password'] = "";
        }
        elseif (!$uppercase || !$lowercase || !$number || !$specialchar) {
            $GLOBALS["passwordErr"] = "Invalid format: min, maj, digit and symbole required";
            $_SESSION['password'] = "";
        }
    }
}

function checkInscription() {
    if ($GLOBALS["lastname"] != "" && $GLOBALS["firstname"] != "" && $_SESSION['email'] != "" && $_SESSION['password'] != "") {
        $GLOBALS["msgI"] = "<div>Vous avez été enregistré avec succès</div>";
    } else {
        $GLOBALS["msgI"] = "<div class='error'>Un des champs n'a pas été convenablement rempli</div>";
    }
}

function checkConnection() {
    if ($_SESSION['email'] != "" && $_SESSION['password'] != "") {
        $GLOBALS["msgC"] = "<div>Vous êtes maintenant connecté</div>";
        //connection();
    } else {
        $GLOBALS["msgC"] = "<div class='error'>Email et/ou mot de passe erroné</div>";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

function displayErrCo($error){
    if (!empty($_POST["submitC"])) {
        echo $error;
    }
}

function displayErrI($error){
    if (!empty($_POST["submitI"])) {
        echo $error;
    }
}

function displayValC($value){
    if (!empty($_POST["submitI"])) {
        echo $value;
    }
}

function displayValI($value){
    if (!empty($_POST["submitI"])) {
        echo $value;
    }
}

function connection(){
    if (empty($_POST["connecté"])) {
        $_SESSION['connecté'] = TRUE;
    }
}