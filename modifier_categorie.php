<?php
if (isset($_GET["nomcate"])) {
    $nomcate = $_GET["nomcate"];
}
if (isset($_POST['modifier'])) {
    include "connection.php";
    $nvnom=$_POST["nvnom"];
    $q=("UPDATE categorie SET Nom_Cate='".$nvnom."' WHERE Nom_Cate='".$nomcate."'");
    $con->exec($q);
    header("location:gerer_categories.php");
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
    <div class="container-fluid">
        <form action="" method="post">
            <table class="table">
                <tr>
                    <th>nom categorie</th>
                    <th>nouvau nom</th>
                    <th>modifier</th>
                </tr>
                <tr>
                    <td><?php echo $nomcate ?></td>
                    <td><input type="text" name="nvnom" required></td>
                    <td><button type="submit" class="btn btn-primary" name="modifier">modifier</button></td>
                </tr>
            </table>
        </form>

    </div>
</body>

</html>