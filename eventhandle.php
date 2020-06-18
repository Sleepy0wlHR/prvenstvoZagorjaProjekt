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
$datum = $_POST["datumEvent"];
$mjesto = $_POST["mjesto"];
$query = "INSERT INTO event(datumEvent, idMjesto) VALUES ('$datum', '$mjesto')";
$result = mysqli_query($dbc, $query) or die("Greška u pohrani!");

$query2 = "SELECT * FROM event ORDER BY idEvent DESC LIMIT 1";
$result2 = mysqli_query($dbc, $query2) or die("Greška u dohvatu!");
while($row = mysqli_fetch_array($result2)){
    $idEvent = $row["idEvent"];
}
$query3 = "SELECT * FROM klasa";
$result3 = mysqli_query($dbc, $query3) or die("Greška u dohvatu!");
while($row = mysqli_fetch_array($result3)) {
    if(isset($_POST[$row["idKlasa"]])){
        $idKlasa= $row["idKlasa"];
        $query4="INSERT INTO klasezaevent(idEvent, idKlasa, aktivno) VALUES ('$idEvent','$idKlasa', 1)";
        $result4 = mysqli_query($dbc, $query4) or die("Greška u pohrani!");
    }
}
mysqli_close($dbc);
header("location:utrke.php");
?>
</body>
</html>