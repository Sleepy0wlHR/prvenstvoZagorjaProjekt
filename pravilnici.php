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
    echo'<header>
            <nav>
                <ul name="navBar" id="navBar">
                    <li><a href="index.php">POČETNA</a></li>
                    <li><a href="utrke.php">UTRKE</a></li>
                    <li><a href="rezultati.php">REZULTATI</a></li>
                    <li><a class="currentOne" href="pravilnici.php">PRAVILNICI</a></li>';
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
            <h1>Pravilnici</h1>
            <h2>Mopedcross</h2>
            <div class="pravilnici">
            <a href="pravilnici/mopedcross.pdf"><img class="pdficon"src="'. UPLPATH . 'pdficon.png"><h4>Mopedcross.pdf</h4></a>
            </div>
            <h2>MX/Quad</h2>
            <div class="pravilnici">
            <a href="pravilnici/mxquad.pdf"><img class="pdficon"src="'. UPLPATH . 'pdficon.png"><h4>MXandQuad.pdf</h4></a>
            </div>
            <h2>Autocross</h2>
            <div class="pravilnici">
            <a href="pravilnici/autocross.pdf"><img class="pdficon"src="'. UPLPATH . 'pdficon.png"><h4>Autocross.pdf</h4></a>
            </div>
            <h2>Buggycross</h2>
            <div class="pravilnici">
            <a href="pravilnici/buggy.pdf"><img class="pdficon"src="'. UPLPATH . 'pdficon.png"><h4>Buggycross.pdf</h4></a>
            </div>
            </main>';
    require 'footer.php';
    ?>
    </body>
</html>