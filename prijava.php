<!DOCTYPE html>
<html>
    <head>
        <title>Prvenstvo Zagorja</title>
        <link type="text/css" rel="stylesheet" href="style.css">
        <meta charset="UTF-8">
        <meta name="description" content="Stranica za prijavu na utrke Prvenstva Zagorja">
        <meta name="keywords" content="Prvenstvo, Zagorja, Prijave, Kebel, Lobor, Breznica, Bedenica, Bedekovčina">
        <meta name="author" content="Ivan Sovec">
        <script type="text/javascript" src="jquery-1.11.0.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <script src="prijavaValidation.js"></script> 
    </head>
    <body>
    <?php
    session_start();
    include 'connect.php';
    $idKZE = $_GET["id"];
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
                    <li><a class="currentOne" href="utrke.php">UTRKE</a></li>
                    <li><a href="rezultati.php">REZULTATI</a></li>';
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
            }
            $query2 = "SELECT * FROM klasa JOIN klasezaevent
            ON klasa.idKlasa = klasezaevent.idKlasa WHERE klasezaevent.idKZE = '$idKZE'";
            $result2 = mysqli_query($dbc, $query2) or die("Greška u dohvatu!");
            while($row = mysqli_fetch_array($result2)){
                echo'<h2>'.$row["naziv"].'</h2>';
            }
            if (isset($_SESSION['username'])){
            echo'<form name="prijava" action="prijavahandle.php?id='.$idKZE.'" method="POST">
                <div class="form-item">
                <label for="vozilo">Vozilo:</label><br>
                <input type="text" name="vozilo" id="vozilo" class="textfield" placeholder="Yamaha YZ250F, Opel Corsa 1.6...">
                </div>
                <div class="form-item">
                <label for="sbroj">Startni broj:</label><br>
                <input type="number" name="sbroj" id="sbroj" class="textfield">
                </div>
                <div class="form-item" id="buttoni">
                <button type="submit" value="Prijava" id="slanje">Prijava</button>
                <button type="reset" value="Poništi" id="ponisti">Poništi</button>
                </div>
                </form>';
            }else {
                echo'<p>Potrebno je ulogirati se da bi se mogli prijaviti na utrku.
                    Ulogirati se možete <a href="login.php">ovdje!</a></p>'; 
            }
        echo'<a id="povratak" href="eventklasa.php?id='.$idKZE.'">Povratak</a>
        </main>
        <footer>
            <h6>Copyright: Prvenstvo Zagorja 2020 / Autor: Ivan Sovec / v0.2 TESTNA VERZIJA</h6>
        </footer>'
    ?>
    </body>
</html>