<?php
session_start();
if (!isset($_SESSION["admin"])) {
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
    <link rel="stylesheet" href="admin_style.css">
    <title>Document</title>
</head>

<body style="background-color: lightgray;">
    <nav class="navbar navbar-expand-lg" style="background-color: #263238;" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php" id="logo" style="color: white;"><span id="span1">home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-between">
                    <li class="nav-item">
                        <a class="dropdown-item" href="admin_products.php" style="color: white;">ajouter produit</a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item" href="admin_sup_mod_pro.php" style="color: white;">gerer produit</a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item" href="gerer_categories.php" style="color: white;">categorie</a>
                    </li>
                </ul>
                <a href="#" style="text-decoration:none;color: white;">deconnecter <i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-2">
        <div class="row d-flex justify-content-between">
            <div class="col-lg-6">
                <p class="display-5 text-center">chercher par nom produit</p>
                <form action="" method="post">
                    <table class="table table-dark">
                        <tr>
                            <th colspan="7"><input class="form-control" type="search" name="nompro" required>
                            <th><button type="submit" name="cherpro" class="btn btn-primary btn-sm">chercher</button></th>
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
                                        <td><a href="admin_modifier_prod.php?idpro=<?php echo $val['Id_Produit'] ?>"><i class="fa-solid fa-pen-nib"></i></a></td>
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
                <p class="display-5 text-center">chercher par nom categorie</p>
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
                            <th><button type="submit" name="chercate" class="btn btn-primary btn-sm">chercher</button></th>

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="propper.min.js"></script>
    <script src="bootstrap-5.3.0-alpha1-dist/js/bootstrap.js"></script>
</body>

</html>