<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Video on Demnad</title>
    <link rel="stylesheet" href="styl3.css">
  </head>
  <body>
<div id="banery">
  <div id="lewybaner">
    <h1>Internetowa wpozyczalnia filmow</h1>
  </div>
  <div id="prawybaner">
<table>
  <tr>
    <td>Kryminal</td>
    <td>Horror</td>
    <td>Przygodowy</td>
  </tr>
  <tr>
    <td>20</td>
    <td>30</td>
    <td>20</td>
  </tr>
</table>
  </div>
</div>
<div id="polecamy">
<h3>Polecamy</h3>
<div id="jeden">


<?php
$connect = new mysqli("localhost","root","","dane3");
$sql="SELECT  `id`,`nazwa`,`opis`,`zdjecie`FROM `produkty` WHERE id=18 or id =22 or id=23 or id=25;";
$result=$connect->query($sql);
while ($ob=$result->fetch_assoc()) {

echo<<<wyswietl
<div id="abc">
<h4>$ob[id]. $ob[nazwa] </h4>
<img src="$ob[zdjecie]" alt="film">
<p> $ob[opis]</p>
</div>
wyswietl;
}
$connect->close();
 ?>
 </div>

  </div>
<div id="filmyfantastyczne">
<h3>Filmy Fantastyczne</h3>
<div id="dwa">


<?php
$connect = new mysqli("localhost","root","","dane3");
$sql="SELECT  `id`,`nazwa`,`opis`,`zdjecie`FROM `produkty` WHERE Rodzaje_id=12;";
$result=$connect->query($sql);
while ($ob=$result->fetch_assoc()) {

echo<<<wyswietl
<div id="abc">
<h4>$ob[id]. $ob[nazwa] </h4>
<img src="$ob[zdjecie]" alt="film">
<p> $ob[opis]</p>
</div>
wyswietl;
}
$connect->close();
 ?>
 </div>
  </div>
</div>
<footer>
<form  method="post">
  <label for="identyfikator">Usun film nr:</label>
  <input type="number" name="identyfikator">
  <input type="submit" value="Usun film">
</form>

<?php
if (!empty($_POST['identyfikator'])) {
  $zmienna=$_POST['identyfikator'];
  $connect = new mysqli("localhost","root","","dane3");
  $sql="DELETE FROM `produkty` WHERE id=$zmienna;";
  $result=$connect->query($sql);
  $connect->close();
}

 ?>

Strone wykonal: <a href=mailto:"ja@poczta.com">2815018251</a>

</footer>
  </body>
</html>
