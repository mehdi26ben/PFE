<?php
    if(isset($_GET["idpro"])){
        include "connection.php";
        $idpro=$_GET["idpro"];
        $q=$con->prepare("DELETE FROM produit WHERE Id_Produit=?");
        $q->execute([$idpro]);
        header("location:admin_sup_mod_pro.php");
    }

?>