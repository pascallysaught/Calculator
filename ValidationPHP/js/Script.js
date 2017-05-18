function validerDonne() {
    var nom = document.getElementById("nom").value;
    var chaineNom = new RegExp("^[A-Za-z][0-9]{4}$");
    var message;
    if (!chaineNom.test(nom)) 
    {
        message = '<div class = "alert alert-danger">Entrez le bon format pour le nom</div>';
        document.getElementById("message").innerHTML = message;
        document.getElementById("nom").value = "";
        afficherDiv("message"); 
        return;
    }
    else
    cacherDiv("message");

    var chainePass = new RegExp("^EXAMEN|examen$")
     var pass = document.getElementById("pass").value;
     if (!chainePass.test(pass))
    {
        message = '<div class = "alert alert-danger">Mot de passe incorrect</div>';
        document.getElementById("message").innerHTML = message;
        document.getElementById("pass").value = "";
        afficherDiv("message");
        return;
    }
    else
    cacherDiv("message");

    var confPass = document.getElementById("confPass").value;
    if (pass !== confPass) {
         message = '<div class = "alert alert-danger">Confirmation ne concorde pas avec mot de passe</div>';
        document.getElementById("message").innerHTML = message;
        document.getElementById("confPass").value;
        afficherDiv("message");
         return;
         }
   else
    cacherDiv("message");

    var chaineEmail = new RegExp("^[0-9][a-zA-Z]+@[a-zA-Z]+[.](com|org|ca|edu)$");
    var email = document.getElementById("email").value;
    if(!chaineEmail.test(email)){
         message = '<div class = "alert alert-danger">Entrez le bon format de e-mail</div>';
        document.getElementById("message").innerHTML = message;
        document.getElementById("email").value = "";
        afficherDiv("message");
         return;
        }
    else
    cacherDiv("message");
    monFormulaire.submit();     
}

function afficherDiv(dv){
document.getElementById(dv).style.visibility = "visible";

}

function cacherDiv(dv){
    document.getElementById(dv).style.visibility = "hidden";
}
