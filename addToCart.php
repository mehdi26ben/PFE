<?php
session_start();
if(!isset($_POST['idproduit'])){
    header("location:home.php");
}
if(!isset($_SESSION['client'])){
    header("location:login.html");
}
include "connection.php";
$idclient=$_SESSION['client']['Id_Client'];
$idproduit=$_POST['idproduit'];

$verif=$con->prepare("SELECT * FROM panier WHERE Id_produit=? and Id_Client=?");
$verif->execute([$idproduit,$idclient]);
if($verif->rowCount()>0){
    $upd=$con->prepare("UPDATE panier set Quantite=Quantite+1 WHERE Id_Produit=? AND Id_Client=?");
    $upd->execute([$idproduit,$idclient]);
    header("location:categories.php");
}
else{
    $q=$con->prepare("INSERT INTO panier (Id_Client,Id_Produit,Quantite) values (?,?,?)");
    $q->execute([$idclient,$idproduit,1]);
    header("location:categories.php");
}


?>