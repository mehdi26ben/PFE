<?php
session_start();
if (!isset($_SESSION['client'])) {
    header("location:login.php");
    die();
}
if(isset($_POST["idproduit"])){
    $idpro=$_POST["idproduit"];
    $disti="product.php?idproduit=$idpro";
}
if((isset($_POST["prod_cat"]))){
    $prod_cat=$_POST["prod_cat"];
    $disti="search.php?prod_cat=$prod_cat";
}
if((isset($_POST["fav-submit"]))){
    $disti="favorites.php";
}
if(isset($_POST["nomcate"])){
    $nomcate=$_POST["nomcate"];
    $disti="categories.php?nomcate=$nomcate";
}
include "connection.php";
$idclient=$_SESSION['client']['Id_Client'];
$idproduit=$_POST['idproduit'];

$verif=$con->prepare("SELECT * FROM panier WHERE Id_produit=? and Id_Client=?");
$verif->execute([$idproduit,$idclient]);
if($verif->rowCount()>0){
    $upd=$con->prepare("UPDATE panier set Quantite=Quantite+1 WHERE Id_Produit=? AND Id_Client=?");
    $upd->execute([$idproduit,$idclient]);
    header("location:$disti");
}
else{
    $q=$con->prepare("INSERT INTO panier (Id_Client,Id_Produit,Quantite) values (?,?,?)");
    $q->execute([$idclient,$idproduit,1]);
    header("location:$disti");
}
?>