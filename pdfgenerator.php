<?php
include 'connect.php';
$idKZE = $_GET["id"];  
require_once('tcpdf_min/tcpdf.php');
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
$obj_pdf->SetCreator(PDF_CREATOR);
$query2 = "SELECT * FROM klasa JOIN klasezaevent
            ON klasa.idKlasa = klasezaevent.idKlasa WHERE klasezaevent.idKZE = '$idKZE'";
            $result2 = mysqli_query($dbc, $query2) or die("Greška u dohvatu!");
            while($row = mysqli_fetch_array($result2)){
				$obj_pdf->SetTitle($row["naziv"]);
				$klasa = $row["naziv"];
            }   
$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
$obj_pdf->SetDefaultMonospacedFont('times');  
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
$obj_pdf->setPrintHeader(false);  
$obj_pdf->setPrintFooter(false);  
$obj_pdf->SetAutoPageBreak(TRUE, 10);
$fontname = TCPDF_FONTS::addTTFfont('tcpdf_min/fonts/FreeSerif.ttf', 'TrueTypeUnicode', '', 96);
$obj_pdf->SetFont($fontname, '', 11); 
$obj_pdf->setFontSubsetting(true);
$obj_pdf->AddPage();
$content = '';
$query = "SELECT event.idEvent, event.datumEvent, mjesto.mjesto FROM event JOIN mjesto
            ON event.idMjesto = mjesto.idMjesto JOIN klasezaevent
            ON event.idEvent = klasezaevent.idEvent WHERE klasezaevent.idKZE = '$idKZE'";
            $result = mysqli_query($dbc, $query) or die("Greška u dohvatu!");
            while($row = mysqli_fetch_array($result)){
                $content .= '<h1>';
                $date1 = strtotime($row["datumEvent"]);
                $date2 = date('d.m.Y', $date1);
                $content .= $date2;
				$content .= ' - '.$row["mjesto"].'</h1>';
				$mjesto = $row["mjesto"];
            }

$content .= '<h2>'.$klasa.'</h2>';
$content .= '  
<table border="1" cellspacing="0" cellpadding="3">  
<tr>  
<th width="8%">Država</th>
<th width="26%">Ime</th>
<th width="25%">Vozilo</th>
<th width="11%">Startni broj</th>
<th width="15%">Transponder</th>  
<th width="15%">Potpis</th>  
</tr>  ';
$sql = "SELECT prijava.startniBroj, prijava.vozilo, korisnik.ime, korisnik.prezime, drzava.drzava FROM prijava 
JOIN korisnik ON prijava.idKorisnik = korisnik.id
JOIN drzava ON korisnik.idDrzava = drzava.idDrzava WHERE prijava.idKZE='$idKZE'";
$result = mysqli_query($dbc, $sql);  
while($row = mysqli_fetch_array($result))  
{       
$content .= '<tr>
<td>'.$row["drzava"].'</td>
<td>'.$row["ime"].' '.$row["prezime"].'</td>
<td>'.$row["vozilo"].'</td>
<td>'.$row["startniBroj"].'</td>
<td></td>
<td></td>
</tr>';  
}  
$content .= '</table>';  
$obj_pdf->writeHTML($content);  
ob_end_clean();
$filename = $klasa .'_'. $mjesto . '.pdf';
$obj_pdf->Output($filename, 'I');  
?> 