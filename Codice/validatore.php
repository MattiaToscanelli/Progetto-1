<?php
    if(!isset($_POST["flag"])){
        header("Location: registrazione.php");
        exit;
    }

    $first_name = $last_name = $birthday = $address = $civic_number 
    = $city = $nap = $phone = $email = $gender = $hobby = $profession = "";

    //metodo che riempie tutte le variabili
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = test_input($_POST["first_name"]);
        $last_name = test_input($_POST["last_name"]);
        $birthday = test_input($_POST["birthday"]);
        $address = test_input($_POST["address"]);
        $civic_number = test_input($_POST["civic_number"]);
        $city = test_input($_POST["city"]);
        $nap = test_input($_POST["nap"]);
        $phone = test_input($_POST["phone"]);
        $email = test_input($_POST["email"]);
        $gender = test_input($_POST["gender"]);
        if($gender != "Maschio" && $gender != "Femmina"){
            $gender = "Maschio";
        }
        $hobby = test_input($_POST["hobby"]);
        $profession = test_input($_POST["profession"]);
    }

    //Metodo che prepare gli input per evitare eventuali errori
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Controllo generale per i nomi (nome,cognome,citta,via)
    function checkName($val){
        return (preg_match('/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2}[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/', $val) && count($val)<=50);
    }
    
    //Controllo della data di nanscita
    function dateCheck($val){
        $dataN = explode("/", $val);
        $data_nascita = $dataN[2] ."-" .$dataN[1] ."-" .$dataN[0];
        $data_nascita = DateTime::createFromFormat('Y-m-d', $data_nascita);
        $oggi = new DateTime();
        $data_min = new DateTime();
        $data_min->modify('-100 years');
        return (($data_nascita < $oggi) && ($data_min < $data_nascita) && count($dataN) != 0);
    }

    //Controllo della email
    function checkEmail($val){
        return preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $val);
    }

    //Controllo del numero di telefono
    function checkNumber($val){
        $val = str_replace(" ", "", $val);
        $val = str_replace("-", "", $val);
        return preg_match('/^[\+]?[0-9-#]{10,14}$/', $val);
    }

    //Controllo del nap
    function checkNap($val){
        return preg_match('/^\d{4,5}$/', $val);
    }

    //Contorllo del numero civico
    function checkCivicNumber($val){
        $check = true;
        for ($i = 0; $i < count($val); $i++) {
            if(!is_numeric($val[$i]) && ($i != count($val)-1 || $i == 0)){
                $check = false;
            }
        }
        return (!(!preg_match('/^([0-9A-Za-z]{1,4})$/', $val) || $check == false));
    }

    //Controllo delle textArea.
    function checkTextArea($val){
        return count($val) <= 500;
    }
?>
