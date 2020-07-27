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
        echo'<header>
            <div name="headerSlike" id="headerSlike">
                <ul name="listaSlike" id="listaSlike">
                    <li><img class="hSlike" src="img/mx1.jpg"></li>
                    <li><img class="hSlike" src="img/quad.jpg"></li>
                    <li><img class="hSlike" src="img/autocross.jpg"></li>
                    <li><img class="hSlike" src="img/buggy.jpg"></li>
                    <li><img class="hSlike" src="img/mx2.jpg"></li>
                </ul>
            </div>
            <nav>
                <ul name="navBar" id="navBar">
                    <li><a href="index.php">POČETNA</a></li>
                    <li><a href="utrke.php">UTRKE</a></li>
                    <li><a href="rezultati.php">REZULTATI</a></li>';
                    if(isset($_SESSION['username'])){
                        echo'<li><a class="currentOne" href="user.php">MOJE PRIJAVE</a></li>
                </ul>
                <div name="logreg" id="logreg">
                    <h5>'.$_SESSION['username'].'</h5>
                    <h5><a href="logout.php">Logout</a></h5>
                    </div>';
                    $sIme = $_SESSION['username'];
                } else {
                echo'</ul>
                    <div name="logreg" id="logreg">
                    <h5><a href="login.php">Login</a></h5>
                    <h5><a href="registracija.php">Register</a></h5>
                </div>';
                }
            echo'</nav>
        </header>
        <main>
            <h1>Vaše prijave:</h1>
            <table>
                <tr>
                    <th class="kratkith">Datum</th>
                    <th class="kratkith">Mjesto</th>
                    <th class="kth">Klasa</th>
                    <th class="vth">Vozilo</th>
                    <th class="sbth">Startni broj</th>
                    <th class="deleteth"></th>
                </tr>';
                $query = "SELECT event.datumEvent, mjesto.mjesto, klasa.naziv, prijava.vozilo, prijava.startniBroj, prijava.idPrijava FROM prijava
                        JOIN klasezaevent ON prijava.idKZE = klasezaevent.idKZE
                        JOIN event ON klasezaevent.idEvent = event.idEvent
                        JOIN klasa ON klasezaevent.idKlasa = klasa.idKlasa
                        JOIN mjesto ON event.idMjesto = mjesto.idMjesto
                        JOIN korisnik ON prijava.idKorisnik = korisnik.id 
                        WHERE korisnik.username = '$sIme' ORDER BY event.datumEvent DESC";
                $result = mysqli_query($dbc, $query) or die("Greška u dohvatu podataka");
                while($row = mysqli_fetch_array($result)){
                    echo'<tr>
                            <td>'.$row["datumEvent"].'</td>
                            <td>'.$row["mjesto"].'</td>
                            <td>'.$row["naziv"].'</td>
                            <td>'.$row["vozilo"].'</td>
                            <td>'.$row["startniBroj"].'</td>
                            <td><a class="izbrisi" href="delete.php?id='.$row["idPrijava"].'">Izbriši</a></td>
                        </tr>';
                }
                
        echo'</table>
        </main>
        <footer>
            <h6>Copyright: Prvenstvo Zagorja 2020 / Autor: Ivan Sovec / v0.2 TESTNA VERZIJA</h6>
        </footer>';
    ?>
    </body>
</html>