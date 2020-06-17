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
    session_start();
    include 'connect.php';
    $event = $_GET["id"];
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
                    <li><a href="rezultati.php">REZULTATI</a></li>
                </ul>';
                if(isset($_SESSION['username'])){
                    echo'<div name="logreg" id="logreg">
                    <h5>'.$_SESSION['username'].'</h5>
                    <h5><a href="logout.php">Log out</a></h5>
                    </div>';
                } else {
                echo'<div name="logreg" id="logreg">
                    <h5><a href="login.php">Prijava</a></h5>
                    <h5><a href="registracija.php">Registracija</a></h5>
                </div>';
                }
            echo'</nav>
        </header>
        <main>';
            $query = "SELECT idEvent, datumEvent, slika, mjesto FROM event JOIN mjesto
            ON event.idMjesto = mjesto.idMjesto WHERE idEvent = '$event'";
            $result = mysqli_query($dbc, $query) or die("Greška u dohvatu!");
            while($row = mysqli_fetch_array($result)){
                echo'<h1>';
                $date1 = strtotime($row["datumEvent"]);
                $date2 = date('d.m.Y', $date1);
                echo $date2;
                echo ' - '.$row["mjesto"].'</h1>';
            }
        echo'<h2>Dostupne klase za prijavu:</h2> 
        <ul id="buttoni">';
                $query2 = "SELECT * FROM klasa JOIN klasezaevent ON 
                            klasa.idKlasa = klasezaevent.idKlasa JOIN event ON
                            klasezaevent.idEvent = event.idEvent WHERE klasezaevent.idEvent = '$event'
                            AND aktivno=1";
                $result2 = mysqli_query($dbc, $query2);
                while($row = mysqli_fetch_array($result2)) {
                    echo'<li><a href="eventklasa.php?id='.$row['idKZE'].'">
                        <input type="button" class="klasabutton" id="'.$row['idKlasa'].'" name="'.$row['idKlasa'].'" 
                        value="'.$row['naziv'].'">
                        </a></li>';
                }
        echo'</ul><br>
        <a id="povratak" href="utrke.php">Povratak</a>
        </main>
        <footer>
            <h6>Copyright: Prvenstvo Zagorja 2020 / Autor: Ivan Sovec / v0.1 TESTNA VERZIJA</h6>
        </footer>'
    ?>
    </body>
</html>