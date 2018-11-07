<?php
    require_once("validatore.php");

    //Secondo controllo lato server
    if(!(checkName($first_name) && checkName($last_name) && dateCheck($birthday) && checkName($address) && 
    checkCivicNumber($civic_number) && checkName($city) && checkNap($nap)  && checkNumber($phone) &&
    checkEmail($email) && checkTextArea($hobby) && checkTextArea($profession))){
        echo '  <form method="POST" id="registratione_form" action="registrazione.php">
                    <input type="hidden" name="first_name" value="' .$first_name .'">
                    <input type="hidden" name="last_name" value="' .$last_name .'">
                    <input type="hidden" id="birthday" name="birthday" value="' .$birthday .'" readonly>
                    <input type="hidden" name="address" value="' .$address .'">
                    <input type="hidden" name="civic_number" value="' .$civic_number  .'">
                    <input type="hidden" name="city" value="' .$city  .'">
                    <input type="hidden" name="nap" value="' .$nap  .'">
                    <input type="hidden" name="phone" value="' .$phone  .'">
                    <input type="hidden" name="email" value="' .$email  .'">
                    <input type="hidden" name="gender" value="' .$gender  .'">
                    <input type="hidden" name="hobby" value="' .($hobby==""?"-":$hobby)  .'">
                    <input type="hidden" name="profession" value="' .($profession==""?"-":$profession)  .'">
                    <input type="hidden" name="flag" value="true">
                </form>
                <script>
                    alert("Si e verificato un errore con il controllo lato server dei campi!");
                    document.getElementById("registratione_form").submit();
                </script>';
        exit;
    }

    if(!isset($_POST["flag"])){
        header("Location: registrazione.php");
        exit;
    }

    //crea la carella se non esiste
    if (!file_exists('Registrazioni')) {
        mkdir('Registrazioni', 0777, true);
    }

    $headerCSV = "Nome;Cognome;Data_nascita;Via;No_Civico;Città;Nap;No_Telefono;E-mail;Sesso;Hobby;Professione;Data_Registazione";
    $today = date('Y-m-d');
    $pathDailyRegistration = "Registrazioni/Registrazioni_" .$today .".csv";
    $pathAllRegistration = "Registrazioni/Registrazioni_tutte.csv";
    
    //crea i file se non esistono
    if(!file_exists($pathDailyRegistration)){
       file_put_contents($pathDailyRegistration,$headerCSV,FILE_APPEND);
    }
    if(!file_exists($pathAllRegistration)){
        file_put_contents($pathAllRegistration,$headerCSV,FILE_APPEND);
    }

    $today = date("Y-m-d H:i:s");
    
    $dati = "\n" .$first_name .";" .$last_name .";" .$birthday .";" .$address 
    .";" .$civic_number .";" .$city .";".$nap .";" .$phone .";" .$email 
    .";" .$gender .";" .str_replace(";","",str_replace("&#59;","",$hobby)) .";" .str_replace(";",",",str_replace("&#59;",",",$profession)) .";" .$today;
    
    file_put_contents($pathAllRegistration,$dati,FILE_APPEND);
    file_put_contents($pathDailyRegistration,$dati,FILE_APPEND);

    header("Location: finale.php");
    exit;
?>