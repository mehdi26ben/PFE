<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.6.3.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.css">
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="admin_login.css">
    <title>Document</title>
</head>

<body>
    <div class="wrapper fadeInDown">
        <form action="" method="post">
            <div id="formContent">
                <!-- Tabs Titles -->

                <!-- Icon -->
                <div class="fadeIn first">
                    <p class="display-4">Admin</p>
                </div>

                <!-- Login Form -->
                <form>
                    <input type="text" id="login" class="fadeIn second" name="username" placeholder="login">
                    <input type="text" id="password" class="fadeIn third" name="pwd" placeholder="password">
                    <input type="submit" class="fadeIn fourth" value="Log In" name="login">
                </form>

                <!-- Remind Passowrd -->
                <div id="formFooter">
                    <a class="underlineHover" href="#">Forgot Password?</a>
                </div>

            </div>
        </form>
        <?php
            if(isset($_POST["login"])){
                if($_POST["username"]=="admin" && $_POST["pwd"]=="admin"){
                    session_start();
                    $_SESSION["admin"]="ture";
                    header("location:admin.php");
                }
                else{ ?>
                    <script> alert("informations inncorect")</script>
                <?php }
            }
        
        
        ?>

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