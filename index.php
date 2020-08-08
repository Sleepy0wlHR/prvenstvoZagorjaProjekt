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
    require 'header.php';
        echo'<main>
            <h1>Dobrodošli!</h1>
            <h2>Uputstvo za korištenje:</h2>
            <p>
                Važno!<br>
                Molim Vas da koristite novije web browsere poput Google Chrome-a, Opere i sl. da bi se stranica prikazala ispravno.
            </p>
            <p>
                Ukoliko ste prvi put na ovoj stranici, molim Vas da se registrirate. Gumb za registraciju možete naći u gornjem desnom kutu stranice. 
                Ako ste već registrirani, molim Vas da se prijavite. Gumb za prijavu je također u gornjem desnom kutu stranice. 
                Morate biti prijavljeni na stranici da bi se mogli prijaviti na utrku. 
            </p>
            <p>
                Na navigacijskom panelu na vrhu stranice možete vidjeti gumb "Utrke". Kada pritisnete na taj gumb, pokazat će Vam se svi dostupni eventovi.
                Kada izaberete event na koji se želite prijaviti, prikazat će Vam se sve dostupne klase za taj event. Odabirom klase prikazat će Vam se svi već prijavljeni
                natjecatelji. Desno iznad tablice prijavljenih vidjet ćete tamno-sivi gumb "Prijava". Klikom na taj gumb otvorit će Vam se kratka forma koju treba ispuniti. 
                Nakon toga stisnite narančasti gumb "Prijava" i Vaša prijava će biti zabilježena.
            </p>
            <p>
                Ova web aplikacija za prijave je amatersko-volonterski rad jedne osobe u slobodno vrijeme,
                stoga Vas molim da ukoliko primjetite bilo kakvu nepravilnost u radu stranice, 
                da istu prijavite na mail: ivan.sovec.1@gmail.com
            </p>
            </main>';
    require 'footer.php';
    ?>
    </body>
</html>