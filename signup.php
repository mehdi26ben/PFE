<?php
    session_start();
    if(isset($_SESSION['alert-signup'])){
        echo "<script>alert('" . $_SESSION['alert-signup'] . "');</script>";
        unset($_SESSION['alert-signup']);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.css">
    <link rel="stylesheet" href="signup.css">
    <script src="jquery-3.6.3.js"></script>
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.css">
    <script src="signup.js"></script>
    <title>Document</title>
</head>

<body style="background-color: gray;">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-dark">
                    <div class="card-header text-center" style="font-size: 20px;color: white;">Register</div>
                    <div class="card-body">

                        <form id="form" class="form-horizontal" method="post" action="insert_client.php">

                            <div class="form-group ">
                                <label for="name" class="cols-sm-2 control-label">Nom</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                      
                                        <input type="text" class="form-control" name="nom" id="nom"
                                            placeholder="Enter your Name" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Prenom</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="prenom" id="email"
                                            placeholder="Enter ton prenom" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="username" class="cols-sm-2 control-label">date de naissance</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                       
                                        <input type="date" class="form-control" name="date_naissance" id="username"
                                            placeholder="Entrer ton date de naissance" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="cols-sm-2 control-label">adresse</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="adresse" id="adresse"
                                            placeholder="Entrer ton Adresse required"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirm" class="cols-sm-2 control-label">email</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <input type="email" class="form-control" name="email" id="confirm"
                                            placeholder="entrer ton email" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirm" class="cols-sm-2 control-label">password</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="pwd" id="confirm"
                                            placeholder="entrer un mot de passe" minlength="5" required/>
                                    </div>
                                </div>
                                <input type="checkbox" id="showpwd"><span style="margin-left: 2%; color: white;">afficher mot de passe</span> 
                                <script>
                                            $(document).ready(function() {
                                                var i = 0;
                                                $("#showpwd").click(function() {
                                                    if (i == 0) {
                                                        i = 1;
                                                        $("input[name='pwd']").attr("type", "text");
                                                    } else {
                                                        $("input[name='pwd']").attr("type", "password");
                                                        i=0;
                                                    }
                                                });
                                            });
                                            </script>
                            </div>
                            <div class="form-group w-100 d-flex justify-content-center ">
                                <button type="submit"
                                    class="btn btn-primary btn-lg btn-block login-button">Register</button>
                            </div>
                            <div class="login-register">
                                <a href="login.php">Login</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="jquery-3.6.3.js"></script>
    <script src="propper.min.js"></script>
    <script src="bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>
</body>

</html>