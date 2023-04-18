<?php
    if(!isset($_SESSION['client'])){
        header("location:admin_login.php");
    }
    if(isset($_POST['nomcate'])){
        include "connection.php";
        $nomcate=$_POST['nomcate'];
        $q=$con->prepare("INSERT INTO categorie (Nom_Cate) VALUES (?)");
        $q->execute([$nomcate]);
        header("location:gerer_categories.php");
    }
    else{
        header("location:gerer_categories.php");
    }
    
?>