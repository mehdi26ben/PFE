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
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
</head>

<body style="background-color: lightgray;">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 py-4 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="admin.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Acceuille</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li>
                            <a href="admin_products.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Ajouter produits</span> </a>
                        </li>
                        <li>
                            <a href="admin_sup_mod_pro.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Gérer produits</span></a>
                        </li>
                        <li>
                            <a href="gerer_categories.php" class="nav-link px-0 align-middle ">
                                <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Categories</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1</a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="admin_logout.php" class="nav-link px-0 align-middle">
                                <i class="fa-solid fa-right-from-bracket"></i> <span class="ms-1 d-none d-sm-inline">logout</span> </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4" id="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bars"></i>
                            <span class="d-none d-sm-inline mx-1">loser</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="home.php">home</a></li>
                            <li><a class="dropdown-item" href="admin_products.php">ajouter produit</a></li>
                            <li><a class="dropdown-item" href="admin_sup_mod_pro.php">gerer produits</a></li>
                            <li><a class="dropdown-item" href="gerer_categories.php">categorie</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <!--<li><a class="dropdown-item" href="admin_logout.php">Sign out</a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col mt-4">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-around">
                        <div class="col-lg-12">
                            <h3>chercher par nom produit</h3>
                            <form action="" method="post">
                                <table class="table table-light">
                                    <tr>
                                        <th colspan="7"><input class="form-control" type="search" name="nompro" required>
                                        <th><button type="submit" name="cherpro" class="btn btn-primary">chercher</button></th>
                                        </th>
                                    </tr>
                                    <?php
                                    if (isset($_POST["cherpro"])) {
                                        include "connection.php";
                                        $nompro = $_POST["nompro"];
                                        $q = $con->prepare("SELECT distinct(Id_Produit),NomProduit,Image,Description,Quantite,Date_Arrivage,Prix FROM produit inner join categorie categorie on produit.Id_Cate=categorie.Id_Cate WHERE NomProduit like ? or Nom_Cate like ?");
                                        $bind1 = '%' . $nompro . '%';
                                        $bind2 = '%' . $nompro . '%';
                                        $q->bindParam(1, $bind1, PDO::PARAM_STR);
                                        $q->bindParam(2, $bind2, PDO::PARAM_STR);
                                        $q->execute();
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
                                                    <td><a style="color: blue;" href="admin_modifier_prod.php?idpro=<?php echo $val['Id_Produit'] ?>"><i class="fa-solid fa-pen-nib"></i></a></td>
                                                    <td><a style="color: red;" href="admin_supprimer_pro.php?idpro=<?php echo $val['Id_Produit'] ?>"><i class="fa-solid fa-trash"></i></a></td>
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
                    </div>
                </div>
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