<?php
//dbh-Database Handler
$servername = "localhost";
$dBUsername="root";
$dBPassword="mysqlpassword";
$dBName="loginsystem";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("Connection failed:" . mysqli_connect_error() );//if connection fails
}
?>