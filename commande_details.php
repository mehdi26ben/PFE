<?php
$idcom=$_GET['idcom'];
include "connection.php";
session_start();
$q=$con->prepare("SELECT p.Image,dc.Quantite,dc.Prix from commande cm inner join detail_commande dc on  cm.Id_Com=? inner join produit p on p.Id_Produit=dc.Id_Produit");
$q->execute([$idcom]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="categories.css">
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.css">
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.css">
    <script src="categories.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <table class="table table-secondary table-striped">
            <?php 
                if($q->rowCount()>0){
                    $resultat=$q->fetchAll();?>
                    <tr>
                        <th>produit</th>
                        <th>quantite</th>
                        <th>prix</th>
                    </tr>
                    <?php 
                        foreach($resultat as $val){?>
                        <tr>
                        <td><img width="90px" src="<?php echo "pages_images/product_iamges/".$val['Image']?>"></td>    
                        <td><?php echo $val["Quantite"]?></td>
                        <td><?php echo $val["Prix"]*$val["Quantite"]?>.00DH</td>
                    </tr>
                    <?php
                 }
                }
                else{}
            ?>
        </table>
    </div>
</body>

</html>