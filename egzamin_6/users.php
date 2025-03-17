<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Panel Administratora</title>
    <link rel="stylesheet" href="styl4.css">
  </head>
  <body>
  <div id="baner">
    <h3>Portal Spolecznosciowy- panel adiministratora</h3>
  </div>
<div id="glowny">
  <div id="lewy">
    <h4>Uzytkownicy</h4>
    <?php
    $connect= new mysqli("localhost","root","","dane_4");
    $sql="SELECT  `id`,`imie`,`nazwisko`,`rok_urodzenia`,`opis`,`zdjecie` FROM `osoby` limit 30;";
    $result=$connect->query($sql);
    while ($ob=$result->fetch_assoc()) {

      $wiek=date('Y')-$ob['rok_urodzenia'];
     echo<<<wyswietl
     $ob[id].$ob[imie] $ob[nazwisko],$wiek<br>
     wyswietl;
    }
    $connect->close();
     ?>
    <a href="settings.html">Inne ustawienia</a>
  </div>
  <div id="prawy">
    <h4>Podaj id uzytkownika</h4>
      <form  method="post">
      <input type="number" name="identyfikator" id="id">
      <input type="submit" id="zobacz" value="Zobacz"><hr>
        </form>
      <?php
      $numer=$_POST["identyfikator"];
      $connect= new mysqli("localhost","root","","dane_4");
      $sql="SELECT  `imie`,`nazwisko`,`rok_urodzenia`,`opis`,`zdjecie`,`nazwa` FROM `osoby`join hobby on hobby.id=osoby.Hobby_id  where osoby.id =$numer;";
      $result=$connect->query($sql);
      while ($ob=$result->fetch_assoc()) {
      echo<<<zdj
      <h2>
      $numer. $ob[imie] $ob[nazwisko]<br>
      <img src="$ob[zdjecie]" alt="$numer">
      <p>Rok urodzenia: $ob[rok_urodzenia] </p>
      <p>Opis: $ob[opis] </p>
      <p>Hobby: $ob[nazwa] </p>
      </h2>
      zdj;



      }
      $connect->close();
       ?>


  </div>

</div>
<footer>Strone wykonal: 7281057182</footer>
  </body>
</html>
