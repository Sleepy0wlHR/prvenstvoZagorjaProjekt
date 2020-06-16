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
        <script type="text/javascript" src="jquery-1.11.0.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <script src=""></script> 
    </head>
    <body>
    <?php 
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
                    <li><a href="utrke.php">UTRKE</a></li>
                    <li><a href="rezultati.php">REZULTATI</a></li>
                </ul>
                <div name="logreg" id="logreg">
                    <h5><a href="login.php">Prijava</a></h5>
                    <h5><a href="registracija.php">Registracija</a></h5>
                </div>
            </nav>
        </header>
        <main>
            <h1> Unos novog eventa </h1>
            <form name="newevent" action="eventhandle.php" method="POST">
            <div class="form-item">
                <label for="datumEvent">Datum eventa:</label><br>
                <input type="date" name="datumEvent" id="datumEvent">
            </div>
            <div class="form-item">
                <label for="mjesto">Mjesto održavanja:</label><br>
                <select name="mjesto" id="mjesto">
                <option value="" disabled selected>Odaberi mjesto</option>';
                $query = "SELECT * FROM mjesto";
                $result = mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($result)) {
                    echo'<option value="'.$row['idMjesto'].'">'.$row['mjesto'].'</option>';
                }
                echo'</select>
            </div>
            <label>Odaberite klase za event:</label>
            <ul id="checkboxes">';
                $query2 = "SELECT * FROM klasa";
                $result2 = mysqli_query($dbc, $query2);
                while($row = mysqli_fetch_array($result2)) {
                    echo'<li>
                        <input type="checkbox" id="'.$row['idKlasa'].'" name="'.$row['idKlasa'].'" value="'.$row['idKlasa'].'">
                        <label for="'.$row['idKlasa'].'">'.$row['naziv'].'</label>
                        </li>';
                }
            echo'</ul><br>
            <div class="form-item" id="buttoni">
                <button type="submit" value="Stvori" id="slanje">Stvori event</button>
                <button type="reset" value="Poništi" id="ponisti">Poništi</button>
            </div>
        </form>
        </main>
        <footer>
            <h6>Copyright: Prvenstvo Zagorja 2020 / Autor: Ivan Sovec / v0.1</h6>
        </footer>'
    ?>
    </body>
</html>