<?php
include "connection.php";
session_start();
$idclient = $_SESSION['client']['Id_Client'];
$q = $con->prepare("SELECT * FROM commande where Id_Client=?");
$q->execute([$idclient]);
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
    <link rel="stylesheet" href="client_commande.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar sticky-top" style="background-color:#263238;">
        <!--alert <div class="alert alert-success" id="alert-panier"> produit ajouter avec success</div>-->
        <div class="container-fluid" id="header">
            <a href="home.php" style="width: 50px;"><img class="img-fluid" src="pages_images/logo1.png" class="img-fluid" width="100px"></a>
            <?php if (isset($_SESSION['client'])) { ?>
                <nav>
                    <ul style="width: 200px;">

                        <li>
                            <div class="dropdown">

                                <button class="btn btn-outline-light dropdown-toggle btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $_SESSION['client']['Prenom'] ?>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="right: 3%;">
                                    <a class="dropdown-item" style="color: black;" href="#">Mes commandes</a>

                                    <hr>
                                    <a class="dropdown-item" style="color: black;" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>logout</a>
                                    <style>
                                        .dropdown-item:hover {
                                            background-color: lightgray;
                                        }
                                    </style>
                                </div>
                            </div>
                        </li>

                        <li><a class="text-light" type="button" data-toggle="tooltip" data-placement="top" title="Favorites"><i class="fa-solid fa-heart"></i></a></li>

                        <li><a href="cart.php" class="text-light" data-toggle="tooltip" data-placement="top" title="Add To Cart" type="button"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    </ul>

                </nav>

            <?php } else {
            ?>
                <nav>
                    <ul>
                        <li><a class="text-light" type="button" target="_blank" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Login" style="color: rgb(11, 63, 207);" data-target="#modalLoginForm"><i class="fa-solid fa-user"></i></a></li>

                        <li><a class="text-light" type="button" target="_blank" data-toggle="modal" data-target="#modalLoginForm" data-toggle="tooltip" data-placement="top" title="Favorites"><i class="fa-solid fa-heart"></i></a></li>

                        <li><a class="text-light" target="_blank" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Add To Cart" data-target="#modalLoginForm" type="button"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    </ul>
                </nav>
            <?php } ?>
        </div>
    </nav>

    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="check_login.php" method="post">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <input type="hidden" name="page_name" value="categories.php">
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="email" id="defaultForm-email" class="form-control validate" name="email" required>
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <input type="password" id="defaultForm-pass" class="form-control validate" name="pwd" required>
                            <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
                        </div>
                        <a href="signup.html">create new account</a>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-primary" type="submit" name="login">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--/modal-->

    <div class="container-fluid d-flex justify-content-between align-items-lg-center" style="background-color:#455A64;align-items:center;">
        <div class="dropdown">
            <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="categories.php?nomcate=Telephones_Et_Accessoires">Téléphones Et Accessoir</a>
                <a class="dropdown-item" href="categories.php?nomcate=Sports_Et_Loisirs">Sports Et Loisir</a>
                <a class="dropdown-item" href="categories.php?nomcate=Gaming">Gaming</a>
                <a class="dropdown-item" href="categories.php?nomcate=Makeup_Et_Sante">Make-up & Santé</a>
                <a class="dropdown-item" href="categories.php?nomcate=Maison_Et_Founitures">Maison & Fourniture</a>
                <a class="dropdown-item" href="categories.php?nomcate=Cuisine">Cuisine</a>
                <a class="dropdown-item" href="categories.php?nomcate=Television_Et_Hitec">Télévision & Hi Tec</a>
                <a class="dropdown-item" href="categories.php?nomcate=Informatique">Informatique</a>
                <hr>
                <a class="dropdown-item" type="button" target="_blank" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Login" data-target="#modalLoginForm"><i class="fa-solid fa-user"></i>
                    Login</a>
                <style>
                    .dropdown-item:hover {
                        background-color: lightgray;
                    }
                </style>
            </div>
        </div>
        <nav class="navbar">
            <div class="container-fluid">
                <form class="d-flex" role="search" method="post" action="search.php">
                    <input name="prod_cat" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" required>
                    <button type="submit" class="btn btn-outline-light"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </nav>
    </div>

    <div class="contaier-fluid mt-2">
        <?php
        if ($q->rowCount() > 0) {
            $com = $q->fetchAll(); ?>
            <table class="table table-dark table-striped">
                <tr>
                    <th>date commande </th>
                    <th>Adresse </th>
                    <th>Nom recepteur</th>
                    <th>Prenom Recepteur </th>
                    <th>Téléphone</th>
                    <th>plus details</th>
                </tr>
                <?php foreach ($com as $val) { ?>
                    <tr>
                        <td><?php echo $val["Date_Commande"] ?></td>
                        <td><?php echo $val["Adresse_Liv"] ?></td>
                        <td><?php echo $val["Nom_Rec"] ?></td>
                        <td><?php echo $val["Prenom_Rec"] ?></td>
                        <td><?php echo $val["Tel"] ?></td>
                        <td><a href="commande_details.php?idcom=<?php echo $val["Id_Com"] ?>">afiicher plus</a></td>
                    </tr>

                <?php }
            } else { ?>
                <h1>aucune commande effectuer </h1>
            <?php
            }
            ?>
            </table>
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