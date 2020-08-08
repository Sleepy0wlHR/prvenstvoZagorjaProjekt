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
    $event = $_GET["id"];
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
                    echo'<li><a class="roundlink" href="eventklasa.php?id='.$row["idKZE"].'">
                        <input type="button" class="klasabutton" id="'.$row["idKlasa"].'" name="'.$row["idKlasa"].'" 
                        value="'.$row['naziv'].'">
                        </a></li>';
                }
        echo'</ul><br>
        <a id="povratak" href="utrke.php">Povratak</a>
        </main>';
        require 'footer.php';
    ?>
    </body>
</html>