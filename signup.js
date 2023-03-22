$(document).ready(function () {
    
    var form=document.getElementById("form");
    var nom=document.getElementById("nom");var prenom=document.getElementsByName("prenom");var dns=document.getElementByName("dns");var adresse=document.getElementByName("adresse");
    var pwd=document.getElementByName("pwd");

    form.addEventListener('submit',function(event){
        if(nom.value.lenghth<3){
            event.preventDefault();
        }
    });
});