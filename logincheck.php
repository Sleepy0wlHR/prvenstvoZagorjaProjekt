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
$prijavaImeKorisnika = $_POST['username'];
$prijavaLozinkaKorisnika = $_POST['password1'];
 $sql = "SELECT username, password, razina FROM korisnik
 WHERE username = ?";
 $stmt = mysqli_stmt_init($dbc);
 if (mysqli_stmt_prepare($stmt, $sql)) {
 mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_store_result($stmt);
 }
 mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $razinaKorisnika);
 mysqli_stmt_fetch($stmt);
 if (password_verify($_POST['password1'], $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) {
    $_SESSION['username'] = $imeKorisnika;
    $_SESSION['razina'] = $razinaKorisnika;
    echo'<script type="text/javascript">
        if(confirm("Uspješno ste se prijavili!")) {
            document.location = "index.php";
        } else {
            document.location = "index.php";
        }
        </script>';
} else if (!(password_verify($_POST['password1'], $lozinkaKorisnika)) && mysqli_stmt_num_rows($stmt) > 0) {
    echo'<script type="text/javascript">
    if(confirm("Neuspješna prijava, želite li pokušati ponovno?")) {
        document.location = "login.php";
    } else {
        document.location = "index.php";
    }
    </script>';
    }
else {
    echo'<script type="text/javascript">
    if(confirm("Korisnik pod tim korisničkim imenom ne postoji, želite li se registrirati?")) {
        document.location = "registracija.php";
    } else {
        document.location = "index.php";
    }
    </script>';
    }
?>
</body>
</html>