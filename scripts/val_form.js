// comprobacion login.php
function val_f() { 
    var mail,passwd;
    mail=document.login.mail.value;
    passwd=document.login.pw.value;

    if (mail.indexOf("@") == -1 || mail.indexOf(".") == -1) {
        alert ("Correo no válido. Faltan carácteres esenciales.");
        document.getElementById("mail").focus();
        return false;
    }

    if (mail.indexOf("@") > mail.indexOf(".")) {
        alert ("Correo no válido. '@' no puede ir antes del dominio (Ejemplo: 'usuario@dominio.com')");
        document.getElementById("mail").focus();
        return false;
    }

    if (passwd.length < 8) {
        alert("La contraseña no puede tener menos de 8 caracteres");
        document.getElementById("pw").focus();
        return false;
    }

}

// comprobacion alta de val_alta_piso.php
function val_alta_piso() {
    var calle,num,planta,puerta,cp,metros,precio,img;
    calle=document.getElementById("calle").value;
    num=document.getElementById("numero").value;
    planta=document.getElementById("planta").value;
    puerta=document.getElementById("puerta").value;
    cp=document.getElementById("cp").value;
    precio=document.getElementById("precio").value;
    metros=document.getElementById("metros").value;
    img=document.getElementById("imagen");

    if (calle=="") {
        alert("Debes introducir una calle.");
        document.getElementById("calle").focus();
        return false;
    }
    if (num=="") {
        alert("Debes introducir un número.");
        document.getElementById("numero").focus();
        return false;
    }
    if (planta=="") {
        alert("Debes introducir una planta.");
        document.getElementById("planta").focus();
        return false;
    }
    if (puerta=="") {
        alert("Debes introducir una puerta.");
        document.getElementById("puerta").focus();
        return false;
    }
    if (cp=="") {
        alert("Debes introducir un código postal.");
        document.getElementById("cp").focus();
        return false;
    }
    if (cp=="") {
        alert("Debes introducir un código postal.");
        document.getElementById("cp").focus();
        return false;
    }
    if (metros=="") {
        alert("Debes introducir los metros del inmueble.");
        document.getElementById("metros").focus();
        return false;
    }
    if (precio=="") {
        alert("Debes introducir un precio.");
        document.getElementById("precio").focus();
        return false;
    }
    if (imagen.files.length==0) {
        alert("Debes introducir una imagen del piso.");
        document.getElementById("imagen").focus();
        return false;
    }
}

// validacion de registro
function val_sign() {
    var email,pw,pw2;
    nombre=document.registro.nombre.value;
    email=document.registro.email.value;
    pw=document.registro.pw.value;
    pw2=document.registro.pw2.value;

    if (nombre == "") {
        alert("Introduce un nombre de usuario");
        document.getElementById("nombre").focus();
        return false;
    }

    if (email == "") {
        alert("Introduce un correo electrónico");
        document.getElementById("email").focus();
        return false;
    }

    if (pw == ""){
        alert("Introduce una contraseña");
        document.getElementById("pw").focus();
        return false;
    }
    
    if (email.indexOf("@") == -1 || email.indexOf(".") == -1) {
        alert ("Correo no válido. Faltan carácteres esenciales.");
        document.getElementById("email").focus();
        return false;
    }
    if (email.indexOf("@") > email.indexOf(".")) {
        alert ("Correo no válido. '@' no puede ir antes del dominio (Ejemplo: 'usuario@dominio.com')");
        document.getElementById("email").focus();
        return false;
    }

    if (pw.length < 8) {
        alert("La contraseña no puede tener menos de 8 caracteres");
        document.getElementById("pw").focus();
        return false;
    }

    if (pw2 != pw) {
        alert("Las contraseñas introducidas no coinciden");
        document.getElementById("pw2").focus();
        return false;
    }
}

function val_modif_id() {
    var oldcod,newcod;
    oldcod=document.modid.oldcod.value;
    newcod=document.modid.newcod.value;
 
    if (oldcod == "") {
        alert("Introduce el anterior código de usuario")
    }

    if (newcod == ""){
        alert("Introduce el nuevo código de usuario");
    }
}