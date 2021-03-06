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
        </main>';
        require 'footer.php';
    ?>
    </body>
</html>