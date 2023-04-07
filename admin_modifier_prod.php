<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("location:admin.php");
}
if (!isset($_GET['idpro'])) {
    header("location:admin_sup_mod_pro.php");
}
if (isset($_POST["modifier"])) {
    include "connection.php";
    $idpro = $_GET['idpro'];
    $nomcate = $_POST['cate'];
    $sel = $con->prepare("SELECT Id_Cate from categorie  where Nom_Cate=?");
    $sel->execute([$nomcate]);
    if ($sel->rowCount() > 0) {
        $idcate = $sel->fetchColumn();
        $nompro = $_POST['nompro'];
        $image = $_POST["image"];
        $quant = $_POST["quant"];
        $prix = $_POST["prix"];
        $cate = $_POST["cate"];
        $datear = $_POST["datear"];
        $desc = $_POST["desc"];
        $q = $con->prepare("UPDATE produit SET NomProduit=?,Image=?,Id_Cate=?,Description=?,Quantite=?,Date_Arrivage=?,Prix=? WHERE Id_Produit=?");
        $q->execute([$nompro, $image, $idcate, $desc, $quant, $datear, $prix, $idpro]);
    }
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

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="admin.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="admin.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="admin_products.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Ajouter produits</span> </a>
                        </li>
                        <li>
                            <a href="admin_sup_mod_pro.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">modifier produits</span></a>
                        </li>
                        <li>
                            <a href="gerer_categories.php" class="nav-link px-0 align-middle ">
                                <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">categories</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1</a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2</a>
                                </li>
                            </ul>
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
            <div class="col-8 mt-2">
                <form action="" method="post" class="">
                    <table class="table table-dark  table-responsive">
                        <?php
                        include "connection.php";
                        $idpro = $_GET['idpro'];
                        $q = $con->prepare("SELECT * FROM produit WHERE Id_Produit=?");
                        $q->execute([$idpro]);
                        $res = $q->fetch();
                        ?>
                        <tr>
                            <th>Nom produit</th>
                            <th>Image</th>
                        </tr>
                        <tr>
                            <th><input type="text" name="nompro" value="<?php echo $res["NomProduit"] ?>"></th>
                            <th><input type="file" name="image" value="<?php echo $res["Image"] ?>"></th>
                        </tr>
                        <tr>
                            <th>categorie</th>
                            <th>Quantite</th>
                        </tr>

                        <tr>
                            <th> <select name="cate">
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
                                </select></th>
                            <th><input type="number" name="quant" value="<?php echo $res["Quantite"] ?>"></th>
                        </tr>
                        <tr>
                            <th>Date Arrivage</th>
                            <th>Prix</th>
                        </tr>
                        <tr>
                            <th><input type="date" name="datear" value="<?php echo $res["Date_Arrivage"] ?>"></th>
                            <th><input type="number" name="prix" value="<?php echo $res["Prix"] ?>"></th>
                        </tr>
                        <tr>
                            <th colspan="2">description</th>
                        </tr>
                        <tr>
                            <td colspan="2"><input style="width: 600px;height:18vh" type="text" name="desc" value="<?php echo $res["Description"] ?>"></td>
                        </tr>
                        <tr>
                            <th colspan="2"><button class="btn btn-primary" type="submit" name="modifier">modifier</button></th>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>