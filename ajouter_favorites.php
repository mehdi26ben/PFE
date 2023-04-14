<?php
    session_start();
    if(!isset($_SESSION["client"])){
        header("location:home.php");
    }
    if(!isset($_GET["idproduit"])){
        header("location:home.php");
    }
    include "connection.php";
    $idclient=$_SESSION["client"]["Id_Client"];
    $idprod=$_GET["idproduit"];
    $cher=$con->prepare("SELECT * FROM favorites WHERE Id_Client=? and Id_Produit=?");
    $cher->execute([$idclient,$idprod]);
    $exist=false;
    if($cher->rowCount()>0){
        $exist=true;
        header("location:favorites.php");
    }
    if($exist==false){
        $q=$con->prepare("INSERT INTO favorites(Id_Client,Id_Produit) VALUES (?,?)");
        $q->execute([$idclient,$idprod]);
        header("location:favorites.php");
    }
?>