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
    <title>Document</title>
</head>

<body style="background-color: gray;">
    <div class="container-fluid pt-4">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4 col-md-8">
                <h4 class="text-center">informations de livraison</h4>
               <form method="POST" action="livraison.php">
                    <input type="text" name="nom">
                    <input type="text" name="prenom">
                    <input type="text" name="adresse">
                    <input type="text" name="tel">
                    <input type="submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>