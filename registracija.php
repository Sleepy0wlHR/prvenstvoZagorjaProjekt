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
        <script src="regValidation.js"></script> 
    </head>
    <body>
    <?php 
    include 'connect.php';
        echo '<header>
            <nav>
                <ul name="navBar" id="navBar">
                    <li><a href="index.php">POČETNA</a></li>
                    <li><a href="utrke.php">UTRKE</a></li>
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
            <h1> Registracija novog korisnika </h1>
            <form name="reg" action="reghandle.php" method="POST">
            <div class="form-item">
                <label for="ime">Ime:</label><br>
                <input type="text" name="ime" id="ime" class="textfield">
            </div>
            <div class="form-item">
                <label for="prezime">Prezime:</label><br>
                <input type="text" name="prezime" id="prezime" class="textfield">
            </div>
            <div class="form-item">
                <label for="email">E-mail:</label><br>
                <input type="email" name="email" id="email" class="textfield">
            </div>
            <div class="form-item">
                <label for="datumRod">Datum rođenja:</label><br>
                <input type="date" name="datumRod" id="datumRod">
            </div>
            <div class="form-item">
                <label for="spol">Spol:</label><br>
                <select name="spol" id="spol">
                    <option value="" disabled selected>Odaberi spol</option>
                    <option value="m">Muško</option>
                    <option value="z">Žensko</option>
                </select>
            </div>
            <div class="form-item">
                <label for="username">Korisničko ime:</label><br>
                <input type="text" name="username" id="username" class="textfield">
            </div>
            <div class="form-item">
                <label for="password1">Lozinka:</label><br>
                <input type="password" name="password1" id="password1" class="textfield">
            </div>
            <div class="form-item">
                <label for="password2">Ponovite lozinku:</label><br>
                <input type="password" name="password2" id="password2" class="textfield">
            </div>
            <div class="form-item">
                <label for="drzava">Država:</label><br>
                <select name="drzava" id="drzava">
                    <option value="" disabled selected>Odaberi državu</option>
                    <option value="1">Hrvatska</option>
                    <option value="2">Slovenija</option>
                </select>
            </div>
            <div class="form-item" id="buttoni">
                <button type="submit" value="Registracija" id="slanje">Registracija</button>
                <button type="reset" value="Poništi" id="ponisti">Poništi</button>
            </div>
        </form>
        </main>';
        require 'footer.php';
    ?>
    </body>
</html>