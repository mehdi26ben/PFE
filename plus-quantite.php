<?php
    if(!isset($_GET['idproduit'])){
        header("location:home.php");
    }
    $idproduit=$_GET['idproduit'];

    session_start();
    include "connection.php";
    $idclient=$_SESSION['client']['Id_Client'];
    $Qproduit=$con->prepare("SELECT Quantite FROM produit WHERE Id_Produit=?");
    $Qproduit->execute([$idproduit]);
    $Rproduit=$Qproduit->fetch();

    $Qpanier=$con->prepare("SELECT Quantite FROM panier WHERE Id_Produit=? AND Id_Client=?");
    $Qpanier->execute([$idproduit,$idclient]);
    $Rpanier=$Qpanier->fetch();
    
    if($Rproduit['Quantite']>=$Rpanier['Quantite']){
        $upd=$con->prepare("UPDATE panier set Quantite=Quantite+1 WHERE Id_Produit=? AND Id_Client=?");
        $upd->execute([$idproduit,$idclient]);
        header("location:categories.php");
    }
?>