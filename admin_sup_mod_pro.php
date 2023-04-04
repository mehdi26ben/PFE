<?php
    session_start();
    if(!isset($_SESSION["admin"])){
        header("location:admin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.6.3.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.css">
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.css">
    <title>Document</title>
</head>

<body>

    <div class="container-fluid mt-2">
        <div class="row d-flex justify-content-between">
            <div class="col-lg-6">
                <p class="display-5">chercher par nom produit</p>
                <form action="" method="post">
                    <table class="table table-dark">
                        <tr>
                            <th colspan="7"><input class="form-control" type="search" name="nompro" required>
                            <th><button type="submit" name="cherpro" class="btn btn-primary">chercher</button></th>
                            </th>
                        </tr>
                        <?php
                        if (isset($_POST["cherpro"])) {
                            include "connection.php";
                            $nompro = $_POST["nompro"];
                            $q = $con->prepare("SELECT * FROM produit WHERE NomProduit=?");
                            $q->execute([$nompro]);
                            if ($q->rowCount() > 0) { ?>
                                <tr>
                                    <th>Nom produit</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Quantite</th>
                                    <th>Date Arrivage</th>
                                    <th>Prix</th>
                                    <th>modifier</th>
                                    <th>supprimer</th>
                                </tr>
                                <?php
                                $resultat = $q->fetchAll();
                                foreach ($resultat as $val) { ?>
                                    <tr>
                                        <input type="hidden" value="<?php echo $val['Id_Produit'] ?>">
                                        <td><?php echo $val['NomProduit'] ?></td>
                                        <td><img class="img-fluid" src="<?php echo "pages_images/product_iamges/" . $val['Image'] ?>"></td>
                                        <td><?php echo $val["Description"] ?></td>
                                        <td><?php echo $val["Quantite"] ?></td>
                                        <td><?php echo $val["Date_Arrivage"] ?></td>
                                        <td><?php echo $val["Prix"] ?></td>
                                        <td><a  href="admin_modifier_prod.php?idpro=<?php echo $val['Id_Produit'] ?>"><i class="fa-solid fa-pen-nib"></i></a></td>
                                        <td><a href="admin_supprimer_pro.php?idpro=<?php echo $val['Id_Produit'] ?>"><i class="fa-solid fa-trash"></i></a></td>
                                    </tr>
                                <?php  }
                            } else { ?>
                                <h2>Aucune produit trouver</h2>
                        <?php }
                        }
                        ?>
                    </table>
                </form>
            </div>
            <div class="col-lg-6">
                <p class="display-6">chercher par nom categorie</p>
                <form action="" method="post">
                    <table class="table table-light">
                        <tr>
                            <th colspan="7">
                                <select name="cate">
                                    <?php
                                    include "connection.php";
                                    $q = $con->prepare("SELECT Nom_Cate from categorie");
                                    if (!$q) {
                                        echo "Error preparing query: " . $con->errorInfo()[2];
                                    } else {
                                        if (!$q->execute()) {
                                            echo "Error executing query: " . $q->errorInfo()[2];
                                        } else {
                                            $resultat = $q->fetchAll();
                                            if (empty($resultat)) {
                                                echo "No rows returned.";
                                            } else {
                                                foreach ($resultat as $val) {
                                                    echo '<option value="' . $val["Nom_Cate"] . '">' . $val["Nom_Cate"] . '</option>';
                                                }
                                            }
                                        }
                                    } ?>
                                </select>
                            <th><button type="submit" name="chercate">chercher</button></th>

                            <?php

                            if (isset($_POST["chercate"])) { ?>
                        </tr>
                        <tr>
                            <th>Nom produit</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Quantite</th>
                            <th>Date Arrivage</th>
                            <th>Prix</th>
                            <th>modifier</th>
                            <th>supprimer</th>
                        </tr>
                        <?php include "connection.php";
                                $nomcate = $_POST["cate"];
                                $q = $con->prepare("SELECT * FROM produit p inner join categorie c on p.Id_Cate=c.Id_Cate and Nom_Cate=?");
                                $q->execute([$nomcate]);
                                if ($q->rowCount() > 0) {
                                    $resultat = $q->fetchAll();
                                    foreach ($resultat as $val) { ?>
                                <input type="hidden" value="<?php echo $val['Id_Produit'] ?>">
                                <tr>
                                    <td><?php echo $val['NomProduit'] ?></td>
                                    <td><img class="img-fluid" src="<?php echo "pages_images/product_iamges/" . $val['Image'] ?>"></td>
                                    <td><?php echo $val["Description"] ?></td>
                                    <td><?php echo $val["Quantite"] ?></td>
                                    <td><?php echo $val["Date_Arrivage"] ?></td>
                                    <td><?php echo $val["Prix"] ?></td>
                                    <td><a href="admin_modifier_prod.php?nomcate=<?php echo $val['NomProduit'] ?>"><i class="fa-solid fa-pen-nib"></i></a></td>
                                    <td><a href="admin_supprimer_pro.php?idpro=<?php echo $val['Id_Produit'] ?>"><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                    <?php }
                                }
                            }
                    ?>
                    </th>

                    </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

</body>

</html>