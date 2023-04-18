<?php
    if(!isset($_SESSION['client'])){
        header("location:admin_login.php");
    }
    if(isset($_GET['nomcate'])){
        include "connection.php";
        $nomcate=$_GET['nomcate'];
        $q=$con->prepare("DELETE FROM categorie WHERE Nom_Cate=?");
        $q->execute([$nomcate]);
        header("location:gerer_categories.php");
    }
    else{
        header("location:gerer_categories.php");
    }

?>