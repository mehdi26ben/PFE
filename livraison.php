<?php
    require 'connection.php';
   echo  $nom=$_POST['nom'];
    echo $prenom=$_POST['prenom'];
    $adresse=$_POST['adresse'];
    echo$tel=$_POST['tel'];
    $q=$con->prepare("INSERT INTO livraison (Nom,Prenom,Adresse,Tel) VALUES (?,?,?,?)");
    $q->execute([$nom,$prenom,$adresse,$tel]);
    header("location:payment.php");
?>
