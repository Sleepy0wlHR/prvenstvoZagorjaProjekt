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
        <script src=""></script> 
    </head>
    <body>
    <?php
    session_start();
    include 'connect.php';
        echo '<header>
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
        <main>
            <h1> Unos novog rezultata </h1>
            <form name="newresult" action="resulthandle.php" method="POST" enctype="multipart/form-data">
            <div class="form-item">
                <label for="event">Event:</label><br>
                <select name="event" id="event">
                <option value="" disabled selected>Odaberi event</option>';
                $query = "SELECT idEvent, datumEvent, mjesto FROM event JOIN mjesto
                ON event.idMjesto = mjesto.idMjesto WHERE event.aktivnost=0";
                $result = mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($result)) {
                    echo'<option value="'.$row['idEvent'].'">';
                    $date1 = strtotime($row["datumEvent"]);
                    $date2 = date('d.m.Y', $date1);
                    echo $date2;
                    echo ' - '.$row["mjesto"].'</option>';
                }
                echo'</select>
            </div>
            <div class="form-item">
            <label for="klasa">Klasa:</label><br>
                <select name="klasa" id="klasa">
                <option value="" disabled selected>Odaberi klasu</option>';
                $query2 = "SELECT idKlasa, naziv FROM klasa";
                $result2 = mysqli_query($dbc, $query2);
                while($row = mysqli_fetch_array($result2)) {
                    echo'<option value="'.$row['idKlasa'].'">'.$row["naziv"].'</option>';
                }
                echo'</select>
            </div>
            <div class="form-item">
            <label for="pdf">Slika: </label><br>
            <input type="file" id="pdf" accept="application/pdf" name="pdf"/>
            </div>
            <div class="form-item">
            <button type="submit" value="Prihvati" id="slanje">Spremi</button>
            </div>
        </form>
        </main>
        <footer>
            <h6>Copyright: Prvenstvo Zagorja 2020 / Autor: Ivan Sovec / v0.2 TESTNA VERZIJA</h6>
        </footer>'
    ?>
    </body>
</html>