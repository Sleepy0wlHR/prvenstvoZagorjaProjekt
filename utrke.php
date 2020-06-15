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
                    <li><a href="rezultati.php">REZULTATI</a></li>
                </ul>
                <div name="logreg" id="logreg">
                    <h5><a href="prijava.php">Prijava</a></h5>
                    <h5><a href="registracija.php">Registracija</a></h5>
                </div>
            </nav>
        </header>
        <main>
            
        </main>
        <footer>
            <h6>Copyright: Prvenstvo Zagorja 2020 / Autor: Ivan Sovec / v0.1</h6>
        </footer>'
    ?>
    </body>
</html>