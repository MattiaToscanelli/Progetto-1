<?php
    session_start();
    //Se e stato premuto la freccia per tornare indietro
    //cancella tutti i dati
    if(isset($_SESSION['flag'])){
        echo "<script>clearAll();</script>";
    }
    unset($_SESSION['flag']);
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
    <title>Registrazione</title>

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
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title center">Registrazione</h2>
                    <form method="POST" id="registratione_form" action="controllo.php">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
									<label class="label">Nome<span class="red">*</span></label>
                                    <input class="input--style-4" type="text" name="first_name" placeholder="John" value="<?php echo isset($_POST['first_name'])?$_POST['first_name']:""?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Cognome<span class="red">*</span></label>
                                    <input class="input--style-4" type="text" name="last_name" placeholder="Catlett" value="<?php echo isset($_POST['last_name'])?$_POST['last_name']:""?>">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Data di nascita:<span class="red">*</span></label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" id="birthday" name="birthday" placeholder="25/03/2001" value="<?php echo isset($_POST['birthday'])?$_POST['birthday']:""?>" readonly>
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Via<span class="red">*</span></label>
                                    <input class="input--style-4" type="text" name="address" value="<?php echo isset($_POST['address'])?$_POST['address']:""?>" placeholder="Brooke Street">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">No. Civico<span class="red">*</span></label>
                                    <input class="input--style-4" type="text" name="civic_number" value="<?php echo isset($_POST['civic_number'])?$_POST['civic_number']:""?>" placeholder="123">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Città<span class="red">*</span></label>
                                    <input class="input--style-4" type="text" name="city" value="<?php echo isset($_POST['city'])?$_POST['city']:""?>" placeholder="Texas">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nap<span class="red">*</span></label>
                                    <input class="input--style-4" type="number" name="nap" value="<?php echo isset($_POST['nap'])?$_POST['nap']:""?>"  placeholder="77478">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">No. Telefono<span class="red">*</span></label>
                                    <input class="input--style-4" type="tel" id="phone" name="phone" onkeyup="fixNumber(this)" value="<?php echo isset($_POST['phone'])?$_POST['phone']:""?>"  placeholder="+41 72 727 7272">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email<span class="red">*</span></label>
                                    <input class="input--style-4" type="email" name="email" value="<?php echo isset($_POST['email'])?$_POST['email']:""?>"  placeholder="exemple@domain.com">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Sesso<span class="red">*</span></label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Maschio
                                            <input type="radio" checked="checked" name="gender" value="Maschio" <?php echo isset($_POST['gender'])?($_POST['gender'] == "Maschio"?"checked":""):""?>>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Femmina
                                            <input type="radio" name="gender" value="Femmina" <?php echo isset($_POST['gender'])?($_POST['gender'] == "Femmina"?"checked":""):""?>>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="col-1">
                                <div class="input-group">
                                    <label class="label">Hobby</label>
                                    <textarea class="textarea--style" name="hobby"><?php echo isset($_POST['hobby'])?htmlspecialchars($_POST['hobby']):""?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="col-1">
                                <div class="input-group">
                                    <label class="label">Professione</label>
                                    <textarea class="textarea--style" name="profession"><?php echo isset($_POST['profession'])?htmlspecialchars($_POST['profession']):""?></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="flag" value="true">
                        <label class="red">*Campi obbligatori</label>
                        <br>
                        <br>
                        <div class="row row-space">
                            <button class="btn btn--radius-2 btn--blue" type="button" onclick="deleteAll()">Cancella</button>
                            <button class="btn btn--radius-2 btn--blue" type="button" onclick="checkAll()">Avanti</button>
                        </div>
                    </form>
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

    <!-- Notifiche JS-->
    <script src="js/notify.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->