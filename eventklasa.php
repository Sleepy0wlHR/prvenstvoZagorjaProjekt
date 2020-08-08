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
        echo'<header>
            <nav>
                <ul name="navBar" id="navBar">
                    <li><a href="index.php">POČETNA</a></li>
                    <li><a class="currentOne" href="utrke.php">UTRKE</a></li>
                    <li><a href="rezultati.php">REZULTATI</a></li>
                    <li><a href="pravilnici.php">PRAVILNICI</a></li>';
                    if(isset($_SESSION['username'])){
                        echo'<li><a href="user.php">MOJE PRIJAVE</a></li>
                </ul>
                <div name="logreg" id="logreg">
                    <h5>'.$_SESSION['username'].'</h5>
                    <h5><a href="logout.php">Logout</a></h5>
                    </div>';
                } else {
                echo'</ul>
                    <div name="logreg" id="logreg">
                    <h5><a href="login.php">Login</a></h5>
                    <h5><a href="registracija.php">Register</a></h5>
                </div>';
                }
            echo'</nav>
        </header>
        <main>';
            $query = "SELECT event.idEvent, event.datumEvent, mjesto.mjesto FROM event JOIN mjesto
            ON event.idMjesto = mjesto.idMjesto JOIN klasezaevent
            ON event.idEvent = klasezaevent.idEvent WHERE klasezaevent.idKZE = '$idKZE'";
            $result = mysqli_query($dbc, $query) or die("Greška u dohvatu!");
            while($row = mysqli_fetch_array($result)){
                echo'<h1>';
                $date1 = strtotime($row["datumEvent"]);
                $date2 = date('d.m.Y', $date1);
                echo $date2;
                echo ' - '.$row["mjesto"].'</h1>';
                $evid = $row["idEvent"];
            }
            $query2 = "SELECT * FROM klasa JOIN klasezaevent
            ON klasa.idKlasa = klasezaevent.idKlasa WHERE klasezaevent.idKZE = '$idKZE'";
            $result2 = mysqli_query($dbc, $query2) or die("Greška u dohvatu!");
            while($row = mysqli_fetch_array($result2)){
                echo'<h2>'.$row["naziv"].'</h2>';
            }
                    echo'<div id="evkbuttons">
                        <ul id="evklist">
                        <li><a href="pdfgenerator.php?id='.$idKZE.'">
                        <input type="button" class="klasabutton" id="pdfgen" name="pdfgen" value="Preuzmi PDF">
                        </a></li>
                        <li><a href="prijava.php?id='.$idKZE.'">
                        <input type="button" class="klasabutton" id="gotoprijava" name="gotoprijava" value="Prijava">
                        </a></li>
                        </ul>
                        </div>
            <table>
                <tr>
                    <th class="kratkith">Država</th>
                    <th class="dugith">Ime</th>
                    <th class="dugith">Vozilo</th>
                    <th class="kratkith">Startni broj</th>
                </tr>';
               $query3 = "SELECT prijava.startniBroj, prijava.vozilo, korisnik.ime, korisnik.prezime, drzava.drzava FROM prijava 
                        JOIN korisnik ON prijava.idKorisnik = korisnik.id
                        JOIN drzava ON korisnik.idDrzava = drzava.idDrzava WHERE prijava.idKZE='$idKZE'";
                $result3 = mysqli_query($dbc, $query3) or die("Greška u dohvatu!");
                while($row = mysqli_fetch_array($result3)){
                    echo'<tr>
                            <td>'.$row["drzava"].'</td>
                            <td>'.$row["ime"].' '.$row["prezime"].'</td>
                            <td>'.$row["vozilo"].'</td>
                            <td>'.$row["startniBroj"].'</td>
                        </tr>';
                }
        echo'</table>
        <a id="povratak" href="event.php?id='.$evid.'">Povratak</a>
        </main>';
        require 'footer.php';
    ?>
    </body>
</html>