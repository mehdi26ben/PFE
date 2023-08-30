<?php
include "connection.php";
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$dns = $_POST['date_naissance'];
$adresse = $_POST['adresse'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$q = $con->prepare("SELECT * FROM client WHERE email=?");
$q->execute([$email]);
if ($q->rowCount() > 0) {
    session_start();
    $_SESSION['alert-signup'] = "Ce Email deja exist!";
    header("location:signup.php");
} else {

    $ajouter = "INSERT INTO client (Nom,Prenom,Date_Naissance,Adresse,Email,Pwd) VALUES('" . $nom . "','" . $prenom . "','" . $dns . "','" . $adresse . "','" . $email . "','" . $pwd . "') ";
    $con->exec($ajouter);
    $log = $con->prepare("SELECT * FROM client WHERE email=? && pwd=?");
    $log->execute([$email, $pwd]);
    session_start();
    $_SESSION['client'] = $log->fetch();
    header("location:home.php");
}
