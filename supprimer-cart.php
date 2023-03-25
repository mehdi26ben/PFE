<?php
    if(isset($_GET['idproduit'])){
        echo $_GET['idproduit'];
        require "connection.php";
        session_start();
        $idclient=$_SESSION['client']['Id_Client'];
        $idproduit=$_GET['idproduit'];
        $del=$con->prepare("DELETE FROM panier WHERE Id_Produit=? AND Id_Client=?");
        $del->execute([$idproduit,$idclient]);
        header("location:cart.php");
    }
?>