<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.css">
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.css">
    <script src="jquery-3.6.3.js"></script>
    <link rel="stylesheet" href="checkout.css">
    <script src="checkout.js"></script>
    <title>Document</title>
</head>

<body style="background-color: lightgray;">
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
    <div class="container-fluid pt-4">
        <form action="commande.php" method="post">
            <div class="row">
                <div class="col-lg-5 d-flex flex-column justify-content-around">
                    <h3 class="text-center" style="text-transform: capitalize;">informations de livraison</h3>
                    <div class="form-group ">
                        <label for="name" class="cols-sm-2 control-label">Nom</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="nom" placeholder="nom du recepteur" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="cols-sm-2 control-label">Prenom</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="prenom" placeholder="prenom du recepteur" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="username" class="cols-sm-2 control-label">adresse de livraison</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="adresse" placeholder="adresse du livraison" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label  class="cols-sm-2 control-label">telephone</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="number" class="form-control" name="tel" placeholder="num tel du recepteur" required />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 mx-auto">
                    <h3 class="text-center mt-2" style="text-transform: capitalize;">Informations de Paiement</h3>
                    <div class="card mt-4">
                        <div class="card-header">
                            <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2 ">
                                <!-- Credit card form tabs -->
                                <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                    <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit
                                            Card </a> </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Paypal
                                        </a> </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link ">
                                            <i class="fas fa-mobile-alt mr-2"></i> Net
                                            Banking </a> </li>
                                </ul>
                            </div> <!-- End -->
                            <!-- Credit card form content -->
                            <div class="tab-content">
                                <!-- credit card info-->
                                <div id="credit-card" class="tab-pane fade show active pt-3">

                                    <div class="form-group"> <label for="username">
                                            <h6>Card Owner</h6>
                                        </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control "> </div>
                                    <div class="form-group"> <label for="cardNumber">
                                            <h6>Card number</h6>
                                        </label>
                                        <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required>
                                            <div class="input-group-append"> <span class="input-group-text text-muted">
                                                    <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group"> <label><span class="hidden-xs">
                                                        <h6>Expiration Date</h6>
                                                    </span></label>
                                                <div class="input-group">
                                                    <input type="number" placeholder="MM" name="" class="form-control" required>
                                                    <input type="number" placeholder="YY" name="" class="form-control" required>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                    <h6>CVV <i class="fa fa-question-circle d-inline"></i>
                                                    </h6>
                                                </label> <input type="text" required max="3" min="3" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer"> <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm">
                                            Confirmer Paiment </button>

                                    </div>
                                </div> <!-- End -->
                                <!-- Paypal info -->
                                <div id="paypal" class="tab-pane fade pt-3">
                                    <h6 class="pb-2">Select your paypal account type</h6>
                                    <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio" checked> Domestic </label> <label class="radio-inline">
                                            <input type="radio" name="optradio" class="ml-5">International </label>
                                    </div>
                                    <p> <button type="button" class="btn btn-primary "><i class="fab fa-paypal mr-2"></i>
                                            Log into my Paypal</button> </p>
                                    <p class="text-muted"> Note: After clicking on the button, you will be
                                        directed to a secure gateway for payment. After completing the payment
                                        process, you will be redirected back to the website to view details of
                                        your order. </p>
                                </div> <!-- End -->
                                <!-- bank transfer info -->
                                <div id="net-banking" class="tab-pane fade pt-3">
                                    <div class="form-group "> <label for="Select Your Bank">
                                            <h6>Select your Bank</h6>
                                        </label> <select class="form-control" id="ccmonth">
                                            <option value="" selected disabled>--Please select your Bank--
                                            </option>
                                            <option>Bank 1</option>
                                            <option>Bank 2</option>
                                            <option>Bank 3</option>
                                            <option>Bank 4</option>
                                            <option>Bank 5</option>
                                            <option>Bank 6</option>
                                            <option>Bank 7</option>
                                            <option>Bank 8</option>
                                            <option>Bank 9</option>
                                            <option>Bank 10</option>
                                        </select> </div>
                                    <div class="form-group">
                                        <p> <button type="button" class="btn btn-primary "><i class="fas fa-mobile-alt mr-2"></i> Proceed Payment</button>
                                        </p>
                                    </div>
                                    <p class="text-muted">Note: After clicking on the button, you will be
                                        directed to a secure gateway for payment. After completing the payment
                                        process, you will be redirected back to the website to view details of
                                        your order. </p>
                                </div> <!-- End -->
                                <!-- End -->
                            </div>
                        </div>
                    </div>

                </div>
        </form>
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