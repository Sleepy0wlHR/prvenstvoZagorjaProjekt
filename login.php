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
            <h1> Prijava korisnika </h1>
            <form name="login" action="logincheck.php" method="POST">
                <div class="form-item">
                    <label for="username">Korisničko ime:</label><br>
                    <input type="text" name="username" id="username" class="textfield">
                </div>
                <div class="form-item">
                    <label for="password1">Lozinka:</label><br>
                    <input type="password" name="password1" id="password1" class="textfield">
                </div>
                <div class="form-item" id="buttoni">
                    <button type="submit" value="Prijava" id="slanje">Prijava</button>
                    <button type="reset" value="Poništi" id="ponisti">Poništi</button>
                </div>
            </form>
        </main>';
        require 'footer.php';
    ?>
    </body>
</html>