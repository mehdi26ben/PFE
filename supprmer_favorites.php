<?php
session_start();

if(!isset($_GET['idproduit'])){
    header("location:home.php");
}
include "connection.php";
$idclient=$_SESSION["client"]["Id_Client"];
$idprod=$_GET["idproduit"];
$q=$con->prepare("DELETE FROM favorites WHERE Id_Client=? AND Id_Produit=?");
$q->execute([$idclient,$idprod]);
header("location:favorites.php");
?>