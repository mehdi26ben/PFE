<?php
    include "connection.php";
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        if (!empty($email) && !empty($pwd)) {
            $log = $con->prepare("SELECT * FROM client WHERE email=? && pwd=?");
            $log->execute([$email, $pwd]);
            if ($log->rowCount() > 0) {
                session_start();
                $_SESSION['client'] = $log->fetch();
                header("location:home.php");
            } else {
                session_start();
                $_SESSION['alert']="Informations incorrecte";
                header("location:login.php");
            }
        }
    }
?>