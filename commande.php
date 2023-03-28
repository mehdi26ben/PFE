<?php

include "connection.php";

$con->beginTransaction();

session_start();
$idclient=$_SESSION["client"]['Id_Client'];
$nom=$_POST['nom'];$prenom=$_POST['prenom'];$adresse=$_POST['adresse'];$tel=$_POST['tel'];
$ajcom=$con->prepare("INSERT INTO commande (Id_Client,Date_Commande,Adresse_Liv,Nom_Rec,Prenom_Rec,Tel) VALUES(?,NOW(),?,?,?,?)");
$ajcom->bindParam(1, $idclient);
$ajcom->bindParam(2, $adresse);
$ajcom->bindParam(3, $nom);
$ajcom->bindParam(4, $prenom);
$ajcom->bindParam(5, $tel);
$ajcom->execute();

$idcommande=$con->lastInsertId();
echo $idcommande;
$qp=$con->prepare("SELECT panier.Id_Produit,panier.Quantite,prix from panier inner join produit where panier.Id_Produit=produit.Id_Produit AND panier.Id_Client =?");

$qp->execute([$idclient]);
$pan=$qp->fetchAll();
foreach($pan as $val){
    $idpro=$val['Id_Produit'];
    $quantite=$val['Quantite'];
    $prix=$val['prix'];
    $ajDcom=$con->prepare("INSERT INTO detail_commande (Id_Com,Id_Produit,Quantite,Prix) VALUES (?,?,?,?)");
    $ajDcom->execute([$idcommande,$idpro,$quantite,$prix]);
    echo $idpro;
}
/* $delp="DELETE FROM panier WHERE Id_Client=$idclient";
    $con->exec($delp);*/ //suprimer le panier du client;

//update quatity of each product in the product table;

$con->commit();
?>