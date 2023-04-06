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
    <title>Document</title>
</head>

<body>
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
        <div class="row justify-content-center">
            <div class="col-auto">
                <form action="" method="post" class="form d-flex justify-content-center">
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