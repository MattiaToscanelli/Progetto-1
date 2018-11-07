<?php
    session_start();
    //Controllo se la pagina precedente era quella della registrazione.
    if(!isset($_POST["flag"]) || isset($_SESSION['flag'])){
        header("Location: registrazione.php");
        exit;
    }

    require_once("validatore.php");

    //controllo lato server dei dati.
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
   
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Colorlib Templates">
        <meta name="author" content="Colorlib">
        <meta name="keywords" content="Colorlib Templates">

        <!-- Title Page-->
        <title>Controllo</title>

        <!-- Icons font CSS-->
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <!-- Font special for pages-->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Vendor CSS-->
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="css/main.css" rel="stylesheet" media="all">
    </head>

    <body>
        <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
            <div class="wrapper wrapper--w780">
                <div class="card card-4">
                    <div class="card-body">
                        <h2 class="title center">Controlla i dati</h2>
                        <div>
                            <table class="checkTable">
                                <tr>
                                    <th>Nome</th>
                                    <td><?php echo $first_name ?></td>
                                </tr>
                                <tr>
                                    <th>Cognome</th>
                                    <td><?php echo $last_name ?></td>
                                </tr>
                                <tr>
                                    <th>Data di nascita</th>
                                    <td><?php echo $birthday ?></td>
                                </tr>
                                <tr>
                                    <th>Via</th>
                                    <td><?php echo $address ?></td>
                                </tr>
                                <tr>
                                    <th>No. Civico</th>
                                    <td><?php echo $civic_number ?></td>
                                </tr>
                                <tr>
                                    <th>Città</th>
                                    <td><?php echo $city ?></td>
                                </tr>
                                <tr>
                                    <th>Nap</th>
                                    <td><?php echo $nap ?></td>
                                </tr>
                                <tr>
                                    <th>No. Telefono</th>
                                    <td><?php echo $phone ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo $email ?></td>
                                </tr>
                                <tr>
                                    <th>Sesso</th>
                                    <td><?php echo $gender ?></td>
                                </tr>
                                <tr>
                                    <th colspan="2">Hobby</th>
                                </tr>
                                <tr>
                                    <td colspan="2"><?php echo ($hobby==""?"-":$hobby) ?></td>
                                </tr>
                                <tr>
                                    <th colspan="2">Professione</th>
                                </tr>
                                <tr>
                                    <td colspan="2"><?php echo ($profession==""?"-":$profession) ?></td>
                                </tr>
                            </table>
                        </div>
                        <br>
                        <br>
                        <br>
                        <form method="POST" id="registratione_form" action="registrazione.php">
                            <input type="hidden" name="first_name" value="<?php echo $first_name ?>">
                            <input type="hidden" name="last_name" value="<?php echo $last_name ?>">
                            <input type="hidden" id="birthday" name="birthday" value="<?php echo $birthday ?>" readonly>
                            <input type="hidden" name="address" value="<?php echo $address ?>">
                            <input type="hidden" name="civic_number" value="<?php echo $civic_number ?>">
                            <input type="hidden" name="city" value="<?php echo $city ?>">
                            <input type="hidden" name="nap" value="<?php echo $nap ?>">
                            <input type="hidden" name="phone" value="<?php echo $phone ?>">
                            <input type="hidden" name="email" value="<?php echo $email ?>">
                            <input type="hidden" name="gender" value="<?php echo $gender ?>">
                            <input type="hidden" name="hobby" value="<?php echo ($hobby==""?"-":$hobby) ?>">
                            <input type="hidden" name="profession" value="<?php echo ($profession==""?"-":$profession) ?>">
                            <input type="hidden" name="flag" value="true">
                        </form>
                        <form method="POST" id="confirm_form" action="scritturaCsv.php">
                        <input type="hidden" name="first_name" value="<?php echo $first_name ?>">
                            <input type="hidden" name="last_name" value="<?php echo $last_name ?>">
                            <input type="hidden" id="birthday" name="birthday" value="<?php echo $birthday ?>" readonly>
                            <input type="hidden" name="address" value="<?php echo $address ?>">
                            <input type="hidden" name="civic_number" value="<?php echo $civic_number ?>">
                            <input type="hidden" name="city" value="<?php echo $city ?>">
                            <input type="hidden" name="nap" value="<?php echo $nap ?>">
                            <input type="hidden" name="phone" value="<?php echo $phone ?>">
                            <input type="hidden" name="email" value="<?php echo $email ?>">
                            <input type="hidden" name="gender" value="<?php echo $gender ?>">
                            <input type="hidden" name="hobby" value="<?php echo ($hobby==""?"-":$hobby) ?>">
                            <input type="hidden" name="profession" value="<?php echo ($profession==""?"-":$profession) ?>">
                            <input type="hidden" name="flag" value="true">
                        </form>
                        <div class="row row-space">
                            <button class="btn btn--radius-2 btn--blue" type="button" onclick="editSubmit()">Coreggi</button>
                            <button class="btn btn--radius-2 btn--blue" type="submit" onclick="writeSubmit()">Registra</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jquery JS-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <!-- Vendor JS-->
        <script src="vendor/select2/select2.min.js"></script>
        <script src="vendor/datepicker/moment.min.js"></script>
        <script src="vendor/datepicker/daterangepicker.js"></script>

        <!-- Main JS-->
        <script src="js/global.js"></script>

        <!-- Registrazione JS-->
        <script src="js/registrazione.js"></script>

    </body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->