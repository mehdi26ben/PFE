<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="jquery-3.6.3.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <script src="home.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.css">
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.css">
    <title>home</title>
</head>

<body style=" background-color:#DDDDDD;">
    <nav class="navbar sticky-top" style="background-color:#263238;">
        <div class="container-fluid" id="header">
            <a href="home.php" style="width: 50px;"><img  src="pages_images/logo1.png"  width="100px"></a>
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
                Categories
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

    <!--carousel-->
    <div class="container-fluid">
        <div id="carouselExampleDark" class="carousel slide carousel-dark mt-1" data-bs-ride="carousel">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div id="carousel-link" class="carousel-inner">

                <a class="carousel-link" href="categories.php?nomcate=Maison_Et_Founitures">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="pages_images/login/home_slide5.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Maison Et Fournitures</h1>
                            
                        </div>
                    </div>
                </a>

                <a class="carousel-link" href="categories.php?nomcate=Telephones_Et_Accessoires">
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="pages_images/login/electro_devicesbg.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Téléphones Et Accessoires</h1>
                           
                        </div>
                    </div>
                </a>

                <a class="carousel-link" href="categories.php?nomcate=Makeup_Et_Sante">
                    <div class="carousel-item">
                        <img src="pages_images/login/make_up4.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Make Up et Santé</h1>
                           
                        </div>
                    </div>
                </a>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <button type="button" class="btn btn-warning btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!--categories-->
    <div class="container-fluid">
        <div class="row mt-1 g-4">

            <div class="col-lg-3">
                <a href="categories.php?nomcate=Telephones_Et_Accessoires" id="span-container">
                    <div class="card pt-2">
                        <div class="d-flex justify-content-between align-items-center p-2">
                            <div class="flex-column lh-1 imagename"> <span>téléphones & </span><span>accessoires</span>
                            </div>
                            <div> <img src="pages_images/categories_images/telephones&accessoires.jpg" height="100" width="100" /> </div>
                        </div>
                    </div>
                </a>

            </div>


            <div class="col-lg-3">
                <div class="card pt-2">
                    <a href="categories.php?nomcate=Sports_Et_Loisirs" id="span-container">
                        <div class="d-flex justify-content-between align-items-center p-2">
                            <div class="flex-column lh-1 imagename"> <span>Sport &</span><span>Loisirs</span></div>
                            <div> <img src="pages_images/categories_images/sport&loisir.jpg" height="100" width="100" />
                            </div>
                        </div>
                    </a>

                </div>
            </div>


            <div class="col-lg-3">
                <div class="card pt-2">
                    <a href="categories.php?nomcate=Gaming" id="span-container">
                        <div class="d-flex justify-content-between align-items-center p-2">
                            <div class="flex-column lh-1 imagename"> <span>Gaming</span>
                            </div>
                            <div> <img src="pages_images/product_iamges/pr12.png" height="100" width="100" /> </div>
                        </div>
                    </a>

                </div>
            </div>

            <div class="col-lg-3">
                <div class="card pt-2">
                    <a href="categories.php?nomcate=Makeup_Et_Sante" id="span-container">
                        <div class="d-flex justify-content-between align-items-center p-2">
                            <div class="flex-column lh-1 imagename"> <span>make-up &</span><span>Santé</span> </div>
                            <div> <img src="pages_images/categories_images/makeup&health.jpg" height="100" width="100" /> </div>
                        </div>
                    </a>

                </div>
            </div>

            <div class="col-lg-3">

                <div class="card pt-2">
                    <a href="categories.php?nomcate=Maison_Et_Founitures" id="span-container">
                        <div class="d-flex justify-content-between align-items-center p-2">
                            <div class="flex-column lh-1 imagename"><span>maison et </span><span>fourniture</span>
                            </div>
                            <div> <img src="pages_images/categories_images/maison&founiture.jpg" height="100" width="100" /> </div>
                        </div>
                    </a>

                </div>

            </div>

            <div class="col-lg-3">
                <a href="categories.php?nomcate=Cuisine" id="span-container">
                    <div class="card pt-2">
                        <div class="d-flex justify-content-between align-items-center p-2">
                            <div class="flex-column lh-1 imagename"><span>cuisine </div>
                            <div> <img src="pages_images/categories_images/cuisine.jpg" height="100" width="100" />
                            </div>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-3">
                <a href="categories.php?nomcate=Television_Et_Hitec" id="span-container">
                    <div class="card pt-2">
                        <div class="d-flex justify-content-between align-items-center p-2">
                            <div class="flex-column lh-1 imagename"><span>Télévision & </span><span>Hi tec</span>
                            </div>
                            <div> <img src="pages_images/categories_images/electronic.png" height="100" width="100" />
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="categories.php?nomcate=Informatique" id="span-container">
                    <div class="card pt-2">
                        <div class="d-flex justify-content-between align-items-center p-2">
                            <div class="flex-column lh-1 imagename"><span>informatique</span> </div>
                            <div> <img src="pages_images/categories_images/informatique.jpg" height="100" width="100" />
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <section class="banner">
        <div class="content">
            <h1>profiter des meilleures fournitures des hautes qualités avec des bons prix</h1>
            <p>Télévisions, machine-a-laver,micro-Hande, et d'autres produits des marques internationales
                <br>ne manque pas cette opportunité
            </p>
            <div class="btn btn-primary"><a href="categories.php?nomcate=Maison_Et_Founitures" style="color: white;text-decoration:none;border:0px">acheter maintenant</a></div>
        </div>
        <div class="img">
            <img src="pages_images/login/image1.png" alt="">
        </div>
    </section>

    <div class="container-fluid">
        <section class="container-fluid pt-1">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="font-weight-light">Nouvelle Arrivage</h1>
                </div>
            </div>
        </section>

        <div class="container-fluid pt-0 mt-1">

            <div class="row">
                <?php include "connection.php";
                $Nouv = $con->prepare("SELECT * FROM produit inner join Categorie on produit.Id_Cate=Categorie.Id_Cate and MONTH(Date_Arrivage)=month(CURDATE()) AND year(Date_Arrivage)=year(CURDATE()) and Quantite>0 LIMIT 6");
                $Nouv->execute();
                ?>
                <?php if ($Nouv->rowCount() > 0) {
                    $ResultatNouv = $Nouv->fetchAll();
                    foreach ($ResultatNouv as $val) {
                ?>
                        <div class="col-md-4 mt-1">
                            <div class="card h-100">
                                <div class="card-img-top card-img-top-200">
                                    <img class="img-fluid" src="<?php echo "pages_images/product_iamges/" . $val['Image'] ?>">
                                </div>
                                <div class="card-body p-t-2">
                                    <h6 class="small text-wide p-b-2"><?php echo $val['Nom_Cate'] ?></h6>
                                    <h2>
                                        <?php echo "<a href=product.php?idproduit=" . $val['Id_Produit'] . ">";
                                        echo $val['NomProduit'] . "</a>"; ?>
                                    </h2>
                                </div>
                            </div>
                        </div>

                <?php }
                } else {
                    echo "<h3>Aucun Produit </h3>";
                }
                ?>
            </div>
        </div>
    </div>

    <section class="banner" id="banner2">
        <div class="img">
            <img src="pages_images/categories_images/informatiquebg.png" class="img-fluid" alt="">
        </div>
        <div class="content">
            <h1> <span>trouverez les meilleurs périphériques et équipements informatiques</span>
            </h1>
            <div class="btn btn-primary"><a href="categories.php?nomcate=informatique" style="color: white;text-decoration:none;border:0px">acheter maintenant</a></div>
        </div>
    </section>
    <div class="container-fluid">
        <section class="container-fluid pt-1">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="font-weight-light">tendance</h1>
                </div>
            </div>
        </section>
        <section class="carousel slide py-2" data-ride="carousel" id="postsCarousel">
            <div class="container-fluid pt-0 mt-1 carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <?php
                        $tend = $con->prepare("SELECT p.Id_Produit,p.NomProduit,p.Image,dm.Quantite, sum((dm.Quantite)) as total_orders
                        FROM produit p
                        inner JOIN detail_commande dm ON p.Id_Produit = dm.Id_Produit where p.Quantite>1
                        GROUP BY p.Id_Produit,p.NomProduit,p.Image
                        ORDER BY total_orders Desc limit 6");
                        $tend->execute();
                        if ($tend->rowCount() > 0) {
                            $res = $tend->fetchAll();
                            foreach ($res as $val) { ?>
                                <div class="col-md-4 mt-1">
                                    <div class="card h-100">
                                        <div class="card-img-top card-img-top-200">
                                            <img class="img-fluid" src="<?php echo "pages_images/product_iamges/" . $val['Image']; ?>" alt="Carousel 1">
                                        </div>
                                        <div class="card-body p-t-2">
                                            <h6 class="small text-wide p-b-2">Insight</h6>
                                            <h2>
                                                <a href="product.php?idproduit=<?php echo $val['Id_Produit'] ?>"><?php echo $val['NomProduit']; ?></a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container" id="offer">
        <div class="row">
            <div class="col-md-3 py-3 py-md-0">
                <i class="fa-solid fa-cart-shopping"></i>
                <h3>Livraison gratuite</h3>
                <p> pour toute commande de plus de 1000$</p>
            </div>
            <div class="col-md-3 py-3 py-md-0">
                <i class="fa-solid fa-rotate-left"></i>
                <h3>Routourne est Gratuit</h3>
                <p>dans 30 jours</p>
            </div>
            <div class="col-md-3 py-3 py-md-0">
                <i class="fa-solid fa-truck"></i>
                <h3>Livraison Rapide</h3>
                <p>vers touts les villes</p>
            </div>
            <div class="col-md-3 py-3 py-md-0">
                <i class="fa-solid fa-thumbs-up"></i>
                <h3>Trés Bon Qualite</h3>
                <p>Des Produits</p>
            </div>
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
                    <h5 class="text-uppercase">Cher Client</h5>

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