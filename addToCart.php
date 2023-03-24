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
var_dump($_SESSION['client']['Id_Client']);
var_dump($_POST['idproduit']);
$q=$con->prepare("INSERT INTO panier (Id_Client,Id_Produit,Quantite) values (?,?,?)");
$q->execute([$idclient,$idproduit,1]);
header("location:categories.php");
?>