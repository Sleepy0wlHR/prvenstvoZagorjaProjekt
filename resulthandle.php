<?php
include "connect.php";

$event = $_POST["event"];
$klasa = $_POST["klasa"];
$pdf = $_FILES["pdf"]["name"];



$target_dir = "pdfs/".$pdf;
move_uploaded_file($_FILES["pdf"]["tmp_name"], $target_dir);

$query = "INSERT INTO rezultat (idEvent, idKlasa, pdf)
        VALUES ('$event','$klasa','$pdf')";

$result = mysqli_query($dbc, $query) or die("Greška u unosu");
mysqli_close($dbc);
header("location:index.php");
?>