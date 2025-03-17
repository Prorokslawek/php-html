<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Uczeń</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
<a class="right" href="index.php">Wyloguj</a>
<?php
$connect=new mysqli("localhost","root","","dziennik");
$id=$_GET['id'];
$sql="SELECT `imie`,`nazwisko` FROM `uzytkownicy` WHERE id=$id;";
$result = $connect->query($sql);
$ob = $result->fetch_assoc();
echo<<<witaj
<h3>
<div class='center'>Witaj, $ob[imie] $ob[nazwisko]</div>
</h3>

witaj;
 ?>


<h3>Twoje oceny:</h3>
<?php
$id=$_GET['id'];
$sql="select  oceny.id_oceny, oceny.ocena as ocena,data_dod as data, uzytkownicy.imie as imie, uzytkownicy.nazwisko as nazwisko, przedmioty.nazwa as nazwa_przedmiotu from oceny join uzytkownicy on oceny.id_nauczyciela=uzytkownicy.id join przedmioty on oceny.id_przedmiotu=przedmioty.id_przedmiotu where id_ucznia=$id;";
$result = $connect->query($sql);
  echo<<<table
  <table>
    <tr>
    <th>Nauczyciel</th>
    <th>Nazwa przedmiotu</th>
    <th>Ocena</th>
    <th>Data dodania</th>
    <th>Historia aktualizacji</th>
    </tr>
table;
  while($oba = $result->fetch_assoc()) {
    echo<<<oceny
    <tr>
    <th>$oba[imie] $oba[nazwisko]</th>
    <td>$oba[nazwa_przedmiotu]</td>
      <td>$oba[ocena]</td>
      <td>$oba[data]</td>
      <td><a href="historiauczen.php?idoceny=$oba[id_oceny]&id=$_GET[id]">Wyświetl historię</a></td>
    </tr>
oceny;
  }
echo<<<table
</table>
table;


 ?>

  </body>
</html>
