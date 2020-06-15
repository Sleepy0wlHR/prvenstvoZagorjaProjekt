<!DOCTYPE html>
<html>
    <head>
    <title>Prvenstvo Zagorja</title>
        <link type="text/css" rel="stylesheet" href="style.css">
        <meta charset="UTF-8">
        <meta name="description" content="Stranica za prijavu na utrke Prvenstva Zagorja">
        <meta name="keywords" content="Prvenstvo, Zagorja, Prijave, Kebel, Lobor, Breznica, Bedenica, Bedekovčina">
        <meta name="author" content="Ivan Sovec">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
<?php
include 'connect.php';
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$email = $_POST['email'];
$datumRod = $_POST['datumRod'];
$spol = $_POST['spol'];
$username = $_POST['username'];
$lozinka = $_POST['password1'];
$hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
$razina = 0;
$sql = "SELECT username FROM korisnik WHERE username = ?";
$stmt = mysqli_stmt_init($dbc);
if (mysqli_stmt_prepare($stmt, $sql)) {
 mysqli_stmt_bind_param($stmt, 's', $username);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_store_result($stmt);
 }
if(mysqli_stmt_num_rows($stmt) > 0){
    echo'<script type="text/javascript">
        if(confirm("Korisničko ime se koristi, želite li se pokušati ponovno registrirati?")) {
            document.location = "registracija.php";
        } else {
            document.location = "index.php";
        }
        </script>';
    
}else{
 $sql = "INSERT INTO korisnik (ime, prezime, email, datum, spol, username, password, razina)VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
 $stmt = mysqli_stmt_init($dbc);
 if (mysqli_stmt_prepare($stmt, $sql)) {
 mysqli_stmt_bind_param($stmt, 'sssssssi', $ime, $prezime, $email, $datumRod, $spol, $username, $hashed_password, $razina);
 mysqli_stmt_execute($stmt);
 }  
    echo'<script type="text/javascript">
    if(confirm("Uspješno ste se registrirali!")) {
        document.location = "index.php";
    } else {
        document.location = "index.php";
    }
    </script>';
}
mysqli_close($dbc);
?>
</body>
</html>