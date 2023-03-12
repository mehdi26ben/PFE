<?php
$servername="localhost";
$dbname="PFE";
$username="root";
$password="";
try{
    $con=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    echo "connected";

}catch(PDOException $ex){
    echo $ex->getMessage();
}
?>