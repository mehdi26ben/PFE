<?php
if (!isset($_GET['idpro'])) {
    header("location:admin_sup_mod_pro.php");
}
if (isset($_POST["modifier"])) {
    include "connection.php";
    $idpro=$_GET['idpro'];
    $nomcate = $_POST['cate'];
    $sel=$con->prepare("SELECT Id_Cate from categorie  where Nom_Cate=?");
    $sel->execute([$nomcate]);
    if($sel->rowCount()>0){
        $idcate=$sel->fetchColumn();
        $nompro=$_POST['nompro'];$image=$_POST["image"];$quant=$_POST["quant"];$prix=$_POST["prix"];$cate=$_POST["cate"];$datear=$_POST["datear"];$desc=$_POST["desc"];
        $q = $con->prepare("UPDATE produit SET NomProduit=?,Image=?,Id_Cate=?,Description=?,Quantite=?,Date_Arrivage=?,Prix=? WHERE Id_Produit=?");
        $q->execute([$nompro,$image,$idcate,$desc,$quant,$datear,$prix,$idpro]);
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
    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-auto">
                <form action="" method="post" class="form d-flex justify-content-center">
                    <table class="table table-dark  table-responsive">
                        <tr>
                            <th>Nom produit</th>
                            <th>Image</th>
                        </tr>
                        <tr>
                            <th><input type="text" name="nompro"></th>
                            <th><input type="file" name="image"></th>
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
                            <th><input type="number" name="quant"></th>
                        </tr>
                        <tr>
                            <th>Date Arrivage</th>
                            <th>Prix</th>
                        </tr>
                        <tr>
                            <th><input type="date" name="datear"></th>
                            <th><input type="number" name="prix"></th>
                        </tr>
                        <tr>
                            <th colspan="2">description</th>
                        </tr>
                        <tr>
                            <td colspan="2"><input style="width: 600px;height:18vh" type="text" name="desc"></td>
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