<?php
session_start();
if(!isset($_SESSION['client'])){
    header("location:home.php");
}
$idcom = $_GET['idcom'];
include "connection.php";

$q = $con->prepare("SELECT p.Image,dc.Quantite,dc.Prix from detail_commande dc inner JOIN produit p on dc.Id_Produit=p.Id_Produit and dc.Id_Com=?");
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
            if ($q->rowCount() > 0) {
                $resultat = $q->fetchAll(); ?>
                <tr>
                    <th>produit</th>
                    <th>quantite</th>
                    <th>prix</th>
                </tr>
                <?php
                foreach ($resultat as $val) { ?>
                    <tr>
                        <td><img width="90px" src="<?php echo "pages_images/product_iamges/" . $val['Image'] ?>"></td>
                        <td><?php echo $val["Quantite"] ?></td>
                        <td><?php echo $val["Prix"] * $val["Quantite"] ?>.00DH</td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</body>

</html>