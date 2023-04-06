<?php
 session_start();
 if(!isset($_SESSION["admin"])){
     header("location:admin_login.php");
 }

    if(isset($_POST['ajouter'])){
        include "connection.php";
        $nomp=$_POST['nompro'];
        $cate=$_POST["cate"];
        $image=$_POST["image"];
        $desc=$_POST["desc"];
        $quant=$_POST["quant"];
        $datearr=$_POST["datearr"];
        $prix=$_POST["prix"];
        $q=$con->prepare("SELECT id_cate FROM categorie WHERE Nom_Cate=?");
        $q->execute([$cate]);
        $nomcate=$q->fetchColumn();
        $aj=$con->prepare("INSERT INTO produit (NomProduit,Id_Cate,Image,Description,Quantite,Date_Arrivage,Prix) values (?,?,?,?,?,?,?)");
        $aj->execute([$nomp,$nomcate,$image,$desc,$quant,$datearr,$prix]);
        header("location:admin_products.php");
    }
