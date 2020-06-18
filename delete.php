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
include 'connect.php';
$idPrijava = $_GET["id"];
$query = "DELETE FROM prijava WHERE idPrijava = '$idPrijava'";
$result = mysqli_query($dbc, $query) or die("Greška u pohrani!");
mysqli_close($dbc);
header("location:user.php");
?>
</body>
</html>