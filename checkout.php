<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.css">
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="checkout.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar sticky-top" style="background-color:#263238;">
        <div class="container-fluid" id="header">
            <a href="home.php" style="width: 50px;"><img class="img-fluid" src="pages_images/logo1.png" class="img-fluid" width="100px"></a>
            <nav>
                <ul>
                    <li><a class="text-light" type="button" target="_blank" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Login" style="color: rgb(11, 63, 207);" data-target="#modalLoginForm"><i class="fa-solid fa-user"></i></a></li>

                    <li><a class="text-light" type="button" target="_blank" data-toggle="modal" data-target="#modalLoginForm" data-toggle="tooltip" data-placement="top" title="Favorites"><i class="fa-solid fa-heart"></i></a></li>

                    <li><a class="text-light" target="_blank" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Add To Cart" data-target="#modalLoginForm" type="button"><i class="fa-solid fa-cart-shopping"></i></a></li>
                </ul>
            </nav>
        </div>
    </nav>

    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <a href="signup.html">create new account</a>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="container-fluid d-flex justify-content-between align-items-lg-center" style="background-color:#455A64;align-items:center;">
        <div class="dropdown">
            <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Téléphones Et Accessoir</a>
                <a class="dropdown-item" href="#">Sports Et Loisir</a>
                <a class="dropdown-item" href="categories.php">Gaming</a>
                <a class="dropdown-item" href="#">Make-up & Santé</a>
                <a class="dropdown-item" href="#">Maison & Fourniture</a>
                <a class="dropdown-item" href="#">Cuisine</a>
                <a class="dropdown-item" href="#">Télévision & Hi Tec</a>
                <a class="dropdown-item" href="#">Informatique</a>
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
                <form class="d-flex" role="search" method="post" action="">
                    <input name="porduct" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button type="button" class="btn btn-outline-light"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </nav>
    </div>
</body>

</html>