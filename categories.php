<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="jquery-3.6.3.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="categories.css">
    <script src="home.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.css">
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.css">
    <title>Document</title>
</head>

<body style=" background-color:#DDDDDD;">
    <header class="container-fluid bg-dark">
        <a href="home.php" style="width: 50px;"><img class="img-fluid" src="pages_images/logo1.png" class="img-fluid"
                width="100px"></a>
        <nav>
            <ul>
                <!--modal ativation-->
                <li><a class="text-light" type="button" target="_blank" data-toggle="modal" data-toggle="tooltip"
                        data-placement="top" title="Login" style="color: rgb(11, 63, 207);"
                        data-target="#modalLoginForm"><i class="fa-solid fa-user"></i></a></li>
                <li><a class="text-light" href="#" type="button" data-toggle="tooltip" data-placement="top"
                        title="Favorites"><i class="fa-solid fa-heart"></i></a></li>
                <li><a class="text-light" href="cart.php" type="button" data-toggle="tooltip" data-placement="top"
                        title="Add To Cart"><i class="fa-solid fa-cart-shopping"></i></a></li>
            </ul>
        </nav>
    </header>

    <!--modal-->
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="email" id="defaultForm-email" class="form-control validate" required>
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <input type="password" id="defaultForm-pass" class="form-control validate" required>
                            <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
                        </div>
                        <a href="signup.php">create new account</a>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!--/modal-->

    <div class="container-fluid d-flex justify-content-between mt-2 align-items-lg-center"
        style="background-color:#3B3B3B; border-radius:5px;align-items:center;">
        <div class="dropdown">
            <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Téléphones Et Accessoir</a>
                <a class="dropdown-item" href="#">Sports Et Loisir</a>
                <a class="dropdown-item" href="#">Vétement Et Chaussure</a>
                <a class="dropdown-item" href="#">Make-up & Santé</a>
                <a class="dropdown-item" href="#">Maison & Fourniture</a>
                <a class="dropdown-item" href="#">Cuisine</a>
                <a class="dropdown-item" href="#">Télévision & Hi Tec</a>
                <a class="dropdown-item" href="#">Informatique</a>
                <hr>
                <a class="dropdown-item" type="button" target="_blank" data-toggle="modal" data-toggle="tooltip"
                    data-placement="top" title="Login" data-target="#modalLoginForm"><i class="fa-solid fa-user"></i>
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
                <form class="d-flex" role="search" method="post" action="">
                    <input name="porduct" class="form-control me-2" type="search" placeholder="Search"
                        aria-label="Search">
                    <button type="button" class="btn btn-outline-light"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </nav>
    </div>

    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-body">

                        <img src="pages_images/product_iamges/airmax.png" class="img-fluid">
                        <p><?php echo "";?>1455.00 DH</p>
                    </div>
                    <div class="card-footer d-flex justify-content-around">
                        <button class="btn btn-warning btn-sm">ajouter au panier</button>
                        <button class="btn btn-danger btn-sm">acheter maintenant</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-body">

                        <img src="pages_images/product_iamges/airmax.png" class="img-fluid">
                        <p><?php echo "";?>1455.00 DH</p>
                    </div>
                    <div class="card-footer d-flex justify-content-around">
                        <button class="btn btn-warning">ajouter au panier</button>
                        <button class="btn btn-danger btn-sm">acheter maintenant</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-body">

                        <img src="pages_images/product_iamges/airmax.png" class="img-fluid">
                        <p><?php echo "";?>1455.00 DH</p>
                    </div>
                    <div class="card-footer d-flex justify-content-around">
                        <button class="btn btn-warning btn-sm">ajouter au panier</button>
                        <button class="btn btn-danger btn-sm">acheter maintenant</button>
                    </div>
                </div>
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

                    <ul class="list-unstyled mb-0  h-75 d-flex flex-column justify-content-around pt-2">
                        <li>
                            <a href="#!" class="text-white"><i class="fa-brands fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="text-white"><i class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="text-white"><i class="fa-brands fa-twitter"></i></a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">contacter-nous</h5>

                    <ul class="list-unstyled  h-75 d-flex flex-column justify-content-around pt-2">
                        <li>
                            <i class="fa-solid fa-phone"></i><span>+212 627169632</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-envelope"></i><span>mehdi.bentoufile@hotmail.fr</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-fax"></i><span>+212 507845128</span>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="propper.min.js"></script>
    <script src="bootstrap-5.3.0-alpha1-dist/js/bootstrap.js"></script>
</body>

</html>