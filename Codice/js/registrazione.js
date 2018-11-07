//Controllo generale per i nomi (nome,cognome,citta,via)
function checkName(val){
    var regexName = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2}[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/;
    return (regexName.test(val) && val.length<=50);
}

//Controllo della data di nascita
function checkDate(){
    var dataN = (document.getElementById('birthday').value).split("/");
    var data_nascita = dataN[1] + "/" + dataN[0] + "/" + dataN[2];
    data_nascita = new Date(data_nascita);
    var dataMassima = new Date();
    var anno = dataMassima.getFullYear() - 100;
    dataMassima = new Date(dataMassima.getDay + "/" + dataMassima.getMonth + "/" + anno);
    var oggi = new Date();
    return (!((data_nascita > oggi) || (data_nascita < dataMassima) || dataN == ""));
}

//Controllo delle email
function checkEmail(val){
    var regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regexEmail.test(val);
}

//Controllo nel numero di telefono.
function checkNumber(val){
    val = val.replace(/ /g, "");
    val = val.replace(/-/g, "");
    var regexNumber = /^[\+]?[0-9-#]{10,14}$/;
    return regexNumber.test(val);
}

//Controllo del nap
function checkNap(val){
    var regexNap = /^\d{4,5}$/;
    return regexNap.test(val);
}

//Controllo del numero civico
function checkCivicNumber(val){
    var regexCivic = /^([0-9A-Za-z]{1,4})$/;
    var check = true;
    for (var i = 0; i < val.length; i++) {
        if(isNaN(val[i]) && (i != val.length-1 || i == 0)){
            check = false;
        }
    }
    return (!(!regexCivic.test(val) || check == false));
}

//Controllo delle textArea
function checkTextArea(val){
    return val.length <= 500;
}

//Controllo lato client dei campi con evenutali notifiche in caso di errore.
function checkAll(){
    var inputs = document.getElementsByTagName("input");
    var textArea = document.getElementsByTagName("textarea");
    if(checkName(inputs[0].value) && checkName(inputs[1].value) && checkDate(inputs[2].value) && checkName(inputs[3].value) && 
    checkCivicNumber(inputs[4].value) && checkName(inputs[5].value) && checkNap(inputs[6].value)  && checkNumber(inputs[7].value) &&
    checkEmail(inputs[8].value) && checkTextArea(textArea[0].value) && checkTextArea(textArea[1].value)){
        document.getElementById("registratione_form").submit();
    }else{
        if(!checkName(inputs[0].value)){
            inputs[0].style.border = "1px solid red";
            $.notify("Nome non valido (Max 50 caratteri, solo lettere e caratteri da scrittura)", "error");
        }else{
            inputs[0].style.border = "none";
        }
        if(!checkName(inputs[1].value)){
            inputs[1].style.border = "1px solid red";
            $.notify("Cognome non valido (Max 50 caratteri, solo lettere e caratteri da scrittura)", "error");
        }else{
            inputs[1].style.border = "none";
        }
        if(!checkDate(inputs[2].value)){
            inputs[2].style.border = "1px solid red";
            $.notify("Data di nascita non valida (Età massima 100)", "error");
        }else{
            inputs[2].style.border = "none";
        }
        if(!checkName(inputs[3].value)){
            inputs[3].style.border = "1px solid red";
            $.notify("Via non valida (Max 50 caratteri, solo lettere e caratteri da scrittura)", "error");
        }else{
            inputs[3].style.border = "none";
        }
        if(!checkCivicNumber(inputs[4].value)){
            inputs[4].style.border = "1px solid red";
            $.notify("No. Civico non valido (Max 4 caratteri, numero ed eventualmente lettera)", "error");
        }else{
            inputs[4].style.border = "none";
        }
        if(!checkName(inputs[5].value)){
            inputs[5].style.border = "1px solid red";
            $.notify("Città non valida (Max 50 caratteri, solo lettere e caratteri da scrittura)", "error");
        }else{
            inputs[5].style.border = "none";
        }
        if(!checkNap(inputs[6].value)){
            inputs[6].style.border = "1px solid red";
            $.notify("Nap non valido (4-5 Numeri)", "error");
        }else{
            inputs[6].style.border = "none";
        }
        if(!checkNumber(inputs[7].value)){
            inputs[7].style.border = "1px solid red";
            $.notify("No. Telefono non valido (Solo numeri, spazi, più e cancelleto)", "error");
        }else{
            inputs[7].style.border = "none";
        }
        if(!checkEmail(inputs[8].value)){
            inputs[8].style.border = "1px solid red";
            $.notify("Email non valida (es. nome@dominio.com)", "error");
        }else{
            inputs[8].style.border = "none";
        }
        if(!checkTextArea(textArea[0].value)){
            textArea[0].style.border = "1px solid red";
            $.notify("Hobby troppo lungo (Max 500 caratteri)", "error");
        }else{
            textArea[0].style.border = "none";
        }
        if(!checkTextArea(textArea[1].value)){
            textArea[1].style.border = "1px solid red";
            $.notify("Professione troppo lunga (Max 500 caratteri)", "error");
        }else{
            textArea[1].style.border = "none";
        }
    }
}

//Richiesta di cancellamento di tutti i campi.
function deleteAll(){
    if(confirm("Sei sicuro di voler cancellare i dati?")){
        clearAll();
        $.notify("La cencellazione è avvenuta con successo", "success");
    }
}

//Cancella tutti i campi
function clearAll(){
    var inputs = document.getElementsByTagName("input");
    var textArea = document.getElementsByTagName("textarea");
    for (var i = 0; i < 9; i++) {
        inputs[i].value= "";
    }
    inputs[9].checked = true;
    inputs[10].checked = false;
    for (var i = 0; i < 2; i++) {
        textArea[i].value= "";
    }
    var inputs = document.getElementsByTagName("input");
    for (var i = 0; i < 9; i++) {
        inputs[i].style.border = "none";
    }
}

//Metodo che pemtette di avere una struttura giusta ad un numero
function fixNumber(object){
    var number = object.value;
    number = number.replace(/\s\s+/g, ' ');
    number = number.replace(/--+/g, '-');
    number = number.replace(/\s-+/g, ' ');
    number = number.replace(/-\s+/g, '-');
    number = number.replace(/##+/g, '#');
    object.value = number;
}

//Metodo che fa un submit al form "registratione_form"
function editSubmit(){
    document.getElementById("registratione_form").submit();
}

//Metodo che fa un submit al form "confirm_form"
function writeSubmit(){
    document.getElementById("confirm_form").submit();
}