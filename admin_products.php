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
</head>

<body style="background-color: gray;">
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
    <div class="container-fluid pt-5">
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
</body>

</html>