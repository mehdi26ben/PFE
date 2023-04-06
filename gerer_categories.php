<?php 
session_start();
 if(!isset($_SESSION["admin"])){
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
    <div class="container-fluid mt-2">
        <form method="post" action="modifier_categorie.php">
            <table class="table table-dark table-striped">

                <tr>
                    <th>Categorie</th>
                    <th>nombre des produits</th>
                    <th>modifier</th>
                    <th>supprimer</th>
                </tr>
                <?php
                include "connection.php";
                $q = $con->prepare("SELECT Nom_Cate,count(produit.Id_Produit) FROM categorie LEFT join produit on categorie.Id_Cate=produit.Id_Cate group by Nom_Cate");
                $q->execute();
                if ($q->rowCount() > 0) {
                    $resultat = $q->fetchAll();
                    foreach ($resultat as $val) { ?>
                        <tr>
                            <input type="hidden" value="<?php echo $val["Nom_Cate"] ?>" name="nomcate">
                            <td><input type="text" value="<?php echo $val["Nom_Cate"] ?>" style="width: 100%;" name="nvnom"></td>
                            <td><?php echo $val["count(produit.Id_Produit)"] ?></td>
                            <td><a href="modifier_categorie.php?nomcate=<?php echo $val["Nom_Cate"] ?>"><i class="fa-solid fa-pen-nib"></i></a></button></td>
                            <td><a href="supprimer_categorie.php?nomcate=<?php echo $val["Nom_Cate"] ?>"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                <?php }
                }
                ?>
            </table>
        </form>
        <div class="container-fluid">
            <form action="ajouter_categorie.php" method="post">
                <table class="table table-secondary">
                    <tr>
                        <th>Nom categorie</th>
                        <th>Ajouter</th>
                    </tr>
                    <tr>
                        <th><input type="text" name="nomcate" style="width:70%" required></th>
                        <td><button class="btn btn-primary" type="submit">Ajouter</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>