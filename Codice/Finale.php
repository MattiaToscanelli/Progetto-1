<?php
    session_start();
    $_SESSION['flag'] = "start";
    $today = date('Y-m-d');
    $pathDailyRegistration = "Registrazioni/Registrazioni_" .$today .".csv";
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
        <title>Finale</title>

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

    <body class="bg-gra-02">
        <div class="page-wrapper p-t-130 p-b-100 font-poppins">
            <div class="wrapper wrapper--w780">
                <div class="card card-4">
                    <div class="card-body center">
                        <h2 class="title center">Registrazioni odierne</h2>
                        <div>
                        <?php
                            if(file_exists($pathDailyRegistration)){
                                $lista = file_get_contents($pathDailyRegistration);
                                //Inverto l'array per mostrare per le registrazioni nuove in altro
                                $lista = array_reverse(explode("\n", $lista));
                                for($i = 0; $i < count($lista)-1; $i++){
                                    $dati = explode(";", $lista[$i]);
                                    echo '<table class="finalTable' .($i%2==1?" gray":"") .'">
                                        <tr>
                                            <th>Data Registrazione</th><td>' .$dati[12] .'</td>
                                        </tr>
                                        <tr>
                                            <th>Nome</th><td>' .$dati[0] .'</td>
                                        </tr>
                                        <tr>
                                            <th>Cognome</th><td>' .$dati[1] .'</td>
                                        </tr>
                                        <tr>
                                            <th>Data di Nascita</th><td>' .$dati[2] .'</td>
                                        </tr>
                                        <tr>
                                            <th>Via</th><td>' .$dati[3] .'</td>
                                        </tr>
                                        <tr>
                                            <th>No. Civico</th><td>' .$dati[4] .'</td>
                                        </tr>
                                        <tr>
                                            <th>Città</th><td>' .$dati[5] .'</td>
                                        </tr>
                                        <tr>
                                            <th>Nap</th><td>' .$dati[6] .'</td>
                                        </tr>
                                        <tr>
                                            <th>No. Telefono</th><td>' .$dati[7] .'</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th><td>' .$dati[8] .'</td>
                                        </tr>
                                        <tr>
                                            <th>Sesso</th><td>' .$dati[9] .'</td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Hobby</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">' .$dati[10] .'</td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Professione</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">' .$dati[11] .'</td>
                                        </tr>
                                    </table>';
                                }
                                echo '
                                <br>
                                <br>
                                <br>';
                            }else{
                                echo '<h2>Non ci sono state registrazioni oggi!</h2><br><br>';
                            }
                        ?>
                        </div>
                        <a href="benvenuto.html">
                            <button class="btn btn--radius-2 btn--blue" type="button" onclick="editSubmit()">Torna Alla Home</button>
                        </a>
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