<?php
header('Content-Type: text/html; charset=utf-8');

$servername = "localhost";
$username = "root";
$password = "";
$basename = "prvenstvozagorja";

$dbc = mysqli_connect($servername, $username, $password, $basename) or 
        die('Greška u konekciji na MySQL server'.mysqli_error());
        mysqli_set_charset($dbc, "utf8");
?>