<?php
include "connection.php";
session_start();
if (!isset($_SESSION['client'])) {
    header("location:home.php");
}
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
        <div class="container-fluid" id="header">
            <a href="home.php" style="width: 50px;"><img src="pages_images/logo1.png" width="100px"></a>
            <?php if (isset($_SESSION['client'])) { ?>
                <nav>
                    <ul style="width: 200px;">

                        <li>
                            <div class="dropdown">

                                <button class="btn btn-outline-light dropdown-toggle btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $_SESSION['client']['Prenom'] ?>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="right: 3%;">
                                    <a class="dropdown-item" style="color: black;" href="client_commandes.php">Mes
                                        commandes</a>

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

                        <li><a href="favorites.php" class="text-light" type="button" data-toggle="tooltip" data-placement="top" title="Favorites"><i class="fa-solid fa-heart"></i></a></li>

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
            <form id="modalform" action="check_login.php" method="post">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <input type="hidden" name="page_name" value="home.php">
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
                        <a href="signup.php">create new account</a>
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
                <a class="dropdown-item" href="categories.php?nomcate=Telephones_Et_Accessoires">Téléphones Et
                    Accessoir</a>
                <a class="dropdown-item" href="categories.php?nomcate=Sporst-_Et_Loisir">Sports Et Loisir</a>
                <a class="dropdown-item" href="categories.php?nomcate=Gaming">Gaming</a>
                <a class="dropdown-item" href="categories.php?nomcate=Makeup_Et_Sante">Make-up & Santé</a>
                <a class="dropdown-item" href="categories.php?nomcate=Maison_Et_Fournitures">Maison & Fourniture</a>
                <a class="dropdown-item" href="categories.php?nomcate=Cuisine">Cuisine</a>
                <a class="dropdown-item" href="categories.php?nomcate=Television_Et_Hitec">Télévision & Hi Tec</a>
                <a class="dropdown-item" href="categories.php?nomcate=Informatique">Informatique</a>
                <style>
                    .dropdown-item:hover {
                        background-color: lightgray;
                    }
                </style>
            </div>
        </div>
        <nav class="navbar">
            <div class="container-fluid">
                <form class="d-flex" role="search" method="get" action="search.php">
                    <input name="prod_cat" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" required>
                    <button type="submit" class="btn btn-outline-light"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </nav>
    </div>

    <div class="container-fluid mt-2">
        <?php
        if ($q->rowCount() > 0) {
            $com = $q->fetchAll(); ?>
            <table class="table table-dark table-striped table-responsive">
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
                        <td><a href="commande_details.php?idcom=<?php echo $val["Id_Com"] ?>">afficher plus</a></td>
                    </tr>
                <?php }
            } else { ?>
                <h1>aucune commande effectuer </h1>
            <?php
            }
            ?>
            </table>
    </div>

    <!-- Footer -->
    <footer class="text-white text-center" style="margin-top: 8%;">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Footer Content</h5>
                    <p>
                        Merci d'avoir choisi notre site ecommerce pour vos besoins de shopping en ligne. Nous nous
                        efforçons de vous offrir une expérience de shopping fluide en proposant une large gamme de
                        produits de haute qualité, des prix compétitifs et un service client exceptionnel. Nous
                        apprécions votre confiance en nous et sommes engagés à assurer votre satisfaction à chaque
                        achat. Si vous avez des questions ou des préoccupations, n'hésitez pas à nous contacter. Nous
                        apprécions votre entreprise et sommes impatients de vous servir à nouveau à l'avenir.
                    </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">social media</h5>

                    <ul class="list-unstyled mb-0  h-75 d-flex flex-column justify-content-around pt-2" id="socials">
                        <li>
                            <a href="#!" class="text-white"><i class="fa-brands fa-facebook" id="facebook"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="text-white"><i class="fa-brands fa-instagram" id="instagram"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="text-white" id="twitter"><i class="fa-brands fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="text-white"><i class="fa-brands fa-discord" id="discord"></i></a>
                        </li>

                    </ul>
                </div>

                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">contacter-nous</h5>

                    <ul class="list-unstyled  h-75 d-flex flex-column justify-content-around pt-2">
                        <li>
                            <i class="fa-solid fa-phone"></i> <span>+212 627169632</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-envelope"></i> <span>mehdi.bentoufile@hotmail.fr</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-fax"></i> <span>+212 507845128</span>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white" href="home.php">QuickShop</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

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