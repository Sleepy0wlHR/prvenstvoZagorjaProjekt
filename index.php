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
                    <li><a class="currentOne" href="index.php">POČETNA</a></li>
                    <li><a href="utrke.php">UTRKE</a></li>
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
            <h1>Dobrodošli!</h1>
            <h2>Uputstvo za korištenje:</h2>
            <p>
                Važno!<br>
                Molim vas da koristite novije web browsere poput Google Chrome-a, Opere i sl. da bi se stranica prikazala ispravno.
            </p>
            <p>
                Ukoliko ste prvi put na ovoj stranici, molim vas da se registrirate. Gumb za registraciju možete naći u gornjem desnom kutu stranice. 
                Ako ste već registrirani, molim Vas da se prijavite. Gumb za prijavu je također u gornjem desnom kutu stranice. 
                Morate biti prijavljeni na stranici da bi se mogli prijaviti na utrku. 
            </p>
            <p>
                Na navigacijskom panelu na vrhu stranice možete vidjeti gumb "Utrke". Kada pritisnete na taj gumb, pokazat će vam se svi dostupni eventovi.
                Kada izaberete event na koji se želite prijaviti, prikazat će vam se sve dostupne klase za taj event. Odabirom klase prikazat će vam se svi već prijavljeni
                natjecatelji. Desno iznad tablice prijavljenih vidjet ćete plavi gumb "Prijava". Klikom na taj gumb otvorit će vam se kratka forma koju treba ispuniti. 
                Nakon toga stisnite zeleni gumb "Prijava" i vaša prijava će biti zabilježena.
            </p>
            <p>
                Ova web aplikacija za prijave je amatersko-volonterski rad jedne osobe u slobodno vrijeme,
                stoga Vas molim da ukoliko primjetite bilo kakvu nepravilnost u radu stranice, 
                da istu prijavite na mail: ivan.sovec.1@gmail.com
            </p>
        </main>
        <footer>
            <h6>Copyright: Prvenstvo Zagorja 2020 / Autor: Ivan Sovec / v0.1 TESTNA VERZIJA</h6>
        </footer>'
    ?>
    </body>
</html>