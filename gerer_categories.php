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
                    <tr><th>Nom categorie</th><th>Ajouter</th></tr>
                    <tr><th><input type="text" name="nomcate" style="width:70%" required></th><td><button class="btn btn-primary" type="submit">Ajouter</button></td></tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>