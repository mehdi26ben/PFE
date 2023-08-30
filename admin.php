<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("location:admin_login.php");
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
    <script src="admin.js"></script>
    <title>admin</title>
</head>

<body style="background-color: lightgray;">

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 py-4 px-0 bg-dark">
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
                            <!--<ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1</a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2</a>
                                </li>
                            </ul>-->
                        </li>
                        <!--<li>
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Products</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 1</a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 2</a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 3</a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 4</a>
                                </li>
                            </ul>
                        </li>-->
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
                            <li><a class="dropdown-item" href="admin.php">Acceuille</a></li>
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
            <div class="col mt-4" style="border-radius: 8px;">
                <div class="row d-flex justify-content-around">
                    <div class="col-md-5 col-lg-5 d-flex flex-column align-items-center bg-light mt-2" style="border-radius: 8px;">
                        <?php
                        include "connection.php";
                        $q = $con->prepare("SELECT count(*) from commande where month(Date_Commande)>=month(CURDATE())");
                        $q->execute();
                        if ($q->rowCount() > 0) {
                            $com = $q->fetch(); ?>
                            <h2><?php echo $com['count(*)'] ?></h2>
                        <?php   }
                        ?>
                        <h4>nombre des commandes</h4>
                    </div>
                    <div class="col-md-5 col-lg-5 d-flex flex-column align-items-center bg-light mt-1" style="border-radius: 8px;">
                        <?php
                        $q = $con->prepare("SELECT dc.Quantite,p.Prix FROM detail_commande dc inner join produit p on p.Id_Produit=dc.Id_Produit");
                        $q->execute();
                        if ($q->rowCount() > 0) {
                            $total = 0;
                            $resultat = $q->fetchAll();
                            foreach ($resultat as $val) {
                                $total = $total + ($val['Quantite'] * $val['Prix']);
                            }
                        }
                        ?>
                        <h2><?php echo $total ?>.00 DH</h2>
                        <h4>somme du commandes effectuer</h4>
                    </div>
                </div>
                <div class="row d-flex justify-content-around mt-4">
                    <div class="col-md-5 col-lg-5 d-flex flex-column align-items-center bg-light" style="border-radius: 8px;">
                        <h3>produits presque fini</h3>
                        <table class="table">
                            <tr>
                                <th>Produit</th>
                                <th>Nom Produit</th>
                                <th>Quantite</th>
                                <th>Prix</th>
                            </tr>
                            <?php
                            $q = $con->prepare("SELECT * FROM produit order by Quantite asc limit 6");
                            $q->execute();
                            if ($q->rowCount() > 0) {
                                $resultat = $q->fetchAll();
                                foreach ($resultat as $val) { ?>
                                    <tr>
                                        <td> <a href="admin_modifier_prod.php?idpro=<?php echo $val['Id_Produit'] ?>"><img src="<?php echo "pages_images/product_iamges/" . $val['Image'] ?>" width="50px"></a></td>
                                        <td><a href="admin_modifier_prod.php?idpro=<?php echo $val['Id_Produit'] ?>"><?php echo $val['NomProduit'] ?></a></td>
                                        <td id="td_val" style="background-color: #F45959 ;"><?php echo $val['Quantite'] ?></td>
                                        <td><?php echo $val['Prix'] ?>.00DH</td>
                                    </tr>
                            <?php  }
                            }
                            ?>
                        </table>
                    </div>
                    <div class="col-md-5 col-lg-5 bg-light" style="border-radius: 8px;">
                        <?php
                        $q = $con->prepare("SELECT * from produit Where Month(Date_Arrivage)>=Month(CURDATE()) AND year(Date_Arrivage)=year(CURDATE()) order by Date_Arrivage desc LIMIT 6");
                        $q->execute(); ?>
                        <h3 class="text-center">dernier produits ajouter</h3>
                        <table class="table">
                            <tr>
                                <th>Produit</th>
                                <th>Nom Produit</th>
                                <th>Quantite</th>
                                <th>Prix</th>
                            </tr>
                            <?php
                            if ($q->rowCount() > 0) {
                                $res = $q->fetchAll();
                                foreach ($res as $val) { ?>
                                    <tr>
                                        <td><a href="admin_modifier_prod.php?idpro=<?php echo $val['Id_Produit'] ?>"><img src="<?php echo "pages_images/product_iamges/" . $val['Image'] ?>" width="50px"></a></td>
                                        <td><a href="admin_modifier_prod.php?idpro=<?php echo $val['Id_Produit'] ?>"><?php echo $val['NomProduit'] ?></a></td>
                                        <td><?php echo $val['Quantite'] ?></td>
                                        <td><?php echo $val['Prix'] ?>.00DH</td>
                                    </tr>
                            <?php }
                            }
                            ?>
                        </table>
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