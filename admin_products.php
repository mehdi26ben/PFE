<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("location:admin_login.php");
}
    if(isset($_SESSION['ajouter'])){
        echo "<script>alert('" . $_SESSION['ajouter'] . "');</script>";
        unset($_SESSION['ajouter']);
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
    <title>produits</title>
</head>

<body style="background-color:#D3D3D3;">
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
            <div class="col mt-4">

                <div class="container-fluid">
                    <div class="row d-flex justify-content-around">
                        <div class="col-lg-5">
                            <p class="display-6 text-center">Ajouter Produit</p>
                            <form class="form w-100" action="ajouter_produit.php" method="post">
                                <div class="form-group">
                                    <label>Nom Produit</label>
                                    <input type="text" class="form-control" name="nompro" required>

                                </div>
                                <div class="form-group d-flex flex-column">
                                    <label>Categorie</label>
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
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control" name="desc" required>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Quantite</label>
                                    <input type="number" class="form-control" name="quant" required>
                                </div>
                                <div class="form-group">
                                    <label>Date Arrivage</label>
                                    <input type="date" class="form-control" name="datearr" required>
                                </div>
                                <div class="form-group">
                                    <label>Prix</label>
                                    <input type="number" class="form-control" name="prix" required>
                                </div>
                                <div class="container-fluid align-self-center mt-2 d-flex justify-content-around">
                                    <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
                                    <button type="reset" class="btn btn-warning">effacer</button>
                                </div>
                            </form>
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