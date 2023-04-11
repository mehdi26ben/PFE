<?php session_start();
if (!isset($_GET['idproduit'])) {
    header("location:home.php");
}
$idproduit = $_GET['idproduit'];
include "connection.php";
$search = $con->prepare("SELECT COALESCE(COUNT(detail_commande.Id_Produit), 0),produit.Id_Produit,NomProduit,Image,Description,produit.Prix from produit left JOIN detail_commande on produit.Id_Produit=detail_commande.Id_Produit where produit.Id_Produit=?  GROUP by produit.Id_Produit,NomProduit,Image,Description,produit.Prix");
$search->execute([$idproduit]);
$reultat = $search->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="jquery-3.6.3.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="product.css">
    <script src="product.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.css">
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.css">
    <title>Document</title>
</head>

<body style=" background-color:#DDDDDD;">
    <nav class="navbar sticky-top" style="background-color:#263238;">
        <div class="container-fluid" id="header">
            <a href="home.php" style="width: 50px;"><img  src="pages_images/logo1.png"  width="100px" ></a>
            <?php if (isset($_SESSION['client'])) { ?>
                <nav>
                    <ul style="width: 200px;">

                        <li>
                            <div class="dropdown">

                                <button class="btn btn-outline-light dropdown-toggle btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $_SESSION['client']['Prenom'] ?>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="right: 3%;">
                                    <a class="dropdown-item" style="color: black;" href="client_commandes.php">Mes commandes</a>

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
                    <input type="hidden" name="page_name" value="product.php">
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

    <div class="container-fluid mt-1 mb-2">
        <div class="card">
            <form action="addToCart.php" method="post">
                <div class="row g-0">
                    <div class="col-md-6 border-end">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="main_image"> <img src="<?php echo "pages_images/product_iamges/" . $reultat['Image'] ?>" width="350"> </div>
                            <!--<div class="thumbnail_images">
                            <ul id="thumbnail">
                                <li><img onclick="changeImage(this)" src="https://i.imgur.com/TAzli1U.jpg" width="70"></li>
                                <li><img onclick="changeImage(this)" src="https://i.imgur.com/w6kEctd.jpg" width="70"></li>
                                <li><img onclick="changeImage(this)" src="https://i.imgur.com/L7hFD8X.jpg" width="70"></li>
                                <li><img onclick="changeImage(this)" src="https://i.imgur.com/6ZufmNS.jpg" width="70"></li>
                            </ul>
                        </div>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 right-side">
                            <div class="d-flex justify-content-between align-items-center">
                                <input type="hidden" value="<?php echo $idproduit ?>" name="idproduit">
                                <h3><?php echo $reultat['NomProduit']; ?></h3> <span class="heart"><i class='bx bx-heart'></i></span>
                            </div>
                            <div class="mt-2 pr-3 content">
                                <p><?php echo $reultat['Description']; ?></p>
                            </div>
                            <h3><?php echo $reultat['Prix']; ?>.00DH</h3>
                            <div class="ratings d-flex flex-row align-items-center">
                                <div class="d-flex flex-row"> <i class='bx bxs-star'></i><i class='bx bxs-star'></i> <i class='bx bxs-star'></i> <i class='bx bxs-star'></i> <i class='bx bx-star'></i> </div> <span><?php echo $reultat["COALESCE(COUNT(detail_commande.Id_Produit), 0)"] ?> commandes</span>
                            </div>
                            <!--<div class="mt-5"> <span class="fw-bold">Color</span>
                                <div class="colors">
                                    <ul id="marker">
                                        <li id="marker-1"></li>
                                        <li id="marker-2"></li>
                                        <li id="marker-3"></li>
                                        <li id="marker-4"></li>
                                        <li id="marker-5"></li>
                                    </ul>
                                </div>
                            </div>-->
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p>
                                        </p>
                                        <!--<div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                    <i class="fa-solid fa-minus"></i>
                                                </button>
                                            </span>
                                            <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="10">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                            </span>
                                        </div>-->
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div style="width: 20%;" class="container-fluid d-flex justify-content-between"><button type="submit" class="btn btn-outline-dark"><i class="fa-solid fa-cart-shopping"></i></button><button class="btn btn-outline-danger"><a href="ajouter_favorites.php?idproduit=<?php echo $idproduit ?>"><i class="fa-solid fa-heart"></i></a></button></div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-white text-center mt-2">
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
            <a class="text-white" href="home.php">MBshop</a>
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