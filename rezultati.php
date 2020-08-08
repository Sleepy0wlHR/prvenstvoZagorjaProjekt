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
    define("UPLPATH", "img/"); 
    include 'connect.php'; 
        echo '<header>
            <nav>
                <ul name="navBar" id="navBar">
                    <li><a href="index.php">POČETNA</a></li>
                    <li><a href="utrke.php">UTRKE</a></li>
                    <li><a class="currentOne" href="rezultati.php">REZULTATI</a></li>
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
        <main>
        <h1> Završene utrke </h1>';
        $query = "SELECT idEvent, datumEvent, slika, mjesto FROM event JOIN mjesto
                ON event.idMjesto = mjesto.idMjesto WHERE event.aktivnost=0";
        $result = mysqli_query($dbc, $query) or die("Greška u dohvatu!");
        while($row = mysqli_fetch_array($result)){
            echo '<article>';
                echo '<a href="eventrezultat.php?id='.$row['idEvent'].'">';
                echo '<ul id="evart">';
                echo '<li><img class="uimg" src="'. UPLPATH . $row['slika'] . '"></li>';
                echo '<li><h3>';
                $date1 = strtotime($row["datumEvent"]);
                $date2 = date('d.m.Y', $date1);
                echo $date2;
                echo ' - '.$row["mjesto"];
                echo '</h3></li>
                </a>
                </article>';
        }
    echo'</main>';
    require 'footer.php';
    ?>
    </body>
</html>