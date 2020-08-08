<!DOCTYPE html>
<html>
    <head>
        <title>Prvenstvo Zagorja</title>
        <link type="text/css" rel="stylesheet" href="style.css">
        <meta charset="UTF-8">
        <meta name="description" content="Stranica za prijavu na utrke Prvenstva Zagorja">
        <meta name="keywords" content="Prvenstvo, Zagorja, Prijave, Kebel, Lobor, Breznica, Bedenica, Bedekovčina">
        <meta name="author" content="Ivan Sovec">
    </head>
    <body>
<?php
session_start();
include 'connect.php';
$idKZE = $_GET["id"];
$vozilo = $_POST["vozilo"];
$sbroj = $_POST["sbroj"];
$username = $_SESSION["username"];

$query = "SELECT id FROM korisnik WHERE username = '$username'";
$result = mysqli_query($dbc, $query) or die("Greška u dohvaćanju");
$row = mysqli_fetch_array($result);
$idKorisnik = $row["id"];

$query2 = "SELECT * FROM prijava WHERE idKorisnik = '$idKorisnik' AND idKZE = '$idKZE'";
$result2 = mysqli_query($dbc, $query2) or die("Greška u dohvaćanju");
if(mysqli_num_rows($result2) > 0){
    echo'<script type="text/javascript">
        if(confirm("Prijava pod tim imenom već postoji!")) {
            document.location = "index.php";
        } else {
            document.location = "index.php";
        }
        </script>';
    
}else{
 $sql = "INSERT INTO prijava (idKZE, idKorisnik, startniBroj, vozilo)VALUES (?, ?, ?, ?)";
 $stmt = mysqli_stmt_init($dbc);
 if (mysqli_stmt_prepare($stmt, $sql)) {
 mysqli_stmt_bind_param($stmt, 'iiis', $idKZE, $idKorisnik, $sbroj, $vozilo);
 mysqli_stmt_execute($stmt);
 }  
    echo'<script type="text/javascript">
        document.location = "eventklasa.php?id='.$idKZE.'";
    </script>';
}
mysqli_close($dbc);
?>
</body>
</html>