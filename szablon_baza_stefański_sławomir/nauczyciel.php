<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Nauczyciel</title>
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
<h3>Oceny uczniów:</h3>
<?php
 $connect=new mysqli("localhost","root","","dziennik");
$sql="select oceny.id_oceny, oceny.ocena as ocena,data_dod as data, uzytkownicy.imie as imie, uzytkownicy.nazwisko as nazwisko, przedmioty.nazwa as nazwa_przedmiotu from oceny join uzytkownicy on oceny.id_ucznia=uzytkownicy.id join przedmioty on oceny.id_przedmiotu=przedmioty.id_przedmiotu order by imie;";
$result = $connect->query($sql);
while ($ob = $result->fetch_assoc()) {
  echo<<<table
  <table>
    <tr>
      <th>Imie</th>
      <th>Nazwisko</th>
      <th>Przedmiot</th>
      <th>Ocena</th>
      <th>Data</th>
      <th>Aktualizacja oceny</th>
      <th>Historia aktualizacji</th>
    </tr>
  table;
  while ($ob = $result->fetch_assoc()) {
    echo<<<oceny
    <tr>
      <th>$ob[imie]</th>
      <th>$ob[nazwisko]</th>
      <td>$ob[nazwa_przedmiotu]</td>
      <td>$ob[ocena]</td>
      <td>$ob[data]</td>
      <td><a href="modyfikacja.php?idoceny=$ob[id_oceny]&ocena=$ob[ocena]&dataoceny=$ob[data]&id=$_GET[id]">Modyfikuj</a></td>
      <td><a href="historia.php?idoceny=$ob[id_oceny]&id=$_GET[id]">Wyświetl historię</a></td>
    </tr>
    oceny;

  }
echo<<<table
</table>
table;
}
 ?>
<h3>Dodawanie ocen:</h3>
<?php
$sql="SELECT `id`,`imie`,`nazwisko`,`klasa` FROM `uzytkownicy` where typ=3;";
$result = $connect->query($sql);
while ($ob = $result->fetch_assoc()) {
echo<<<Uczniowie
<h5>
$ob[imie] $ob[nazwisko]  $ob[klasa] <a href="dodawanie_ocen.php?idu=$ob[id]&id=$_GET[id]">Dodaj ocenę</a><br>
</h5>

Uczniowie;
}


if (isset($_GET['info'])) {
  echo "<h2>$_GET[info]</h2>";
}
 ?>

  </body>
</html>
