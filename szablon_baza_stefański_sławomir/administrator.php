<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Administrator</title>
  </head>
  <body>
    <a class="right" href="index.php">Wyloguj</a>
    <?php


     ?>
    <h3>Lista wszystkich użytkowników:</h3>
    <?php
    $connect=new mysqli("localhost","root","","dziennik");
    $sql="SELECT * FROM `uzytkownicy` join uprawnienia on uprawnienia.id_typu=uzytkownicy.typ";
    $result = $connect->query($sql);
    echo<<<table
    <table>
      <tr>
        <th>ID</th>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Klasa</th>
        <th>Login</th>
        <th>Hasło</th>
        <th>Uprawnienie</th>
        <th>Usuń</th>
        <th>Aktualizuj</th>
      </tr>
    table;
    while ($ob = $result->fetch_assoc()) {
      echo<<<uzytkownicy
      <tr>
        <td>$ob[id]</td>
        <td>$ob[imie]</td>
        <td>$ob[nazwisko]</td>
        <td>$ob[klasa]</td>
        <td>$ob[login]</td>
        <td>$ob[password]</td>
        <td>$ob[nazwa_uprawnienia]</td>
        <td><a href="usun.php?del=$ob[id]">Usuń użytkownika</a></td>
        <td><a href="administrator.php?upd=$ob[id]">Aktualizuj uzytkownika</a></td>
      </tr>
      uzytkownicy;

    }
echo<<<table
</table>
table;

?>

<div class="duzy">


<div id="a">


<h3>Wyszukiwanie po grupach:</h3>
<?php
echo<<<wyszukanie
<form method="post">
  <select class="selekt" name="typ">
wyszukanie;

$sql = "SELECT * FROM `uprawnienia`";
      $result = $connect->query($sql);
      while ($uprawnienie=$result->fetch_assoc()) {
        echo "<option value=\"$uprawnienie[id_typu]\">$uprawnienie[nazwa_uprawnienia]</option>";
      }


echo <<< wyszukanie
      </select>
      <input type="submit" name="wyszukaj" value="Szukaj"><br>
      </form>
wyszukanie;

if (isset($_POST['wyszukaj'])) {
  $typ=$_POST['typ'];
  $sql="SELECT * FROM `uzytkownicy` join uprawnienia on uprawnienia.id_typu=uzytkownicy.typ where typ=$typ";
  $result = $connect->query($sql);
  echo<<<tabela
  <table>
    <tr>
      <th>ID</th>
      <th>Imie</th>
      <th>Nazwisko</th>
      <th>Klasa</th>
      <th>Login</th>
      <th>Haslo</th>
      <th>Uprawnienie</th>
    </tr>
  tabela;
  while ($obb = $result->fetch_assoc()) {
    echo<<<uzytkownicy
    <tr>
      <td>$obb[id]</td>
      <td>$obb[imie]</td>
      <td>$obb[nazwisko]</td>
      <td>$obb[klasa]</td>
      <td>$obb[login]</td>
      <td>$obb[password]</td>
      <td>$obb[nazwa_uprawnienia]</td>
    </tr>
    uzytkownicy;

  }
  echo<<<tabela
  </table>
  tabela;

  $connect->close();
}
 ?>
 </div>
<div id="b">


 <h3>Dodawanie ocen:</h3>
 <?php
 $connect=new mysqli("localhost","root","","dziennik");
 $sql="SELECT `id`,`imie`,`nazwisko`,`klasa` FROM `uzytkownicy` where typ=3;";
 $result = $connect->query($sql);
 while ($ob = $result->fetch_assoc()) {
 echo<<<Uczniowie
 <h5>
 $ob[imie] $ob[nazwisko] $ob[klasa] <a href="dodawanie_ocenAdmin.php?idu=$ob[id]">Dodaj ocenę</a><br>
 </h5>
 Uczniowie;
 }



  ?>
  </div>
</div>
 <h3 class="center">Rejestracja nowego użytkownika</h3>

 <h3 class="center"><a href="?dodaj">Dodaj nowego uzytkownika</a></h3>
<?php if (isset($_GET['dodaj'])) {
?>
<div class="center">
<?php
echo<<<dodaj
<form method="GET" action="register.php">
 <label for="imie">Imię:</label>
 <input type="text" name="imie" placeholder="Podaj imie"><br>
 <label for="nazwisko">Nazwisko:</label>
 <input type="text" name="nazwisko" placeholder="Podaj nazwisko"><br>
 <label for="klasa">Klasa:</label>
 <input type="text" name="klasa" placeholder="Podaj klase"><br>
 <label for="login">Login:</label>
 <input type="text" name="login" placeholder="Podaj login"><br>
 <label for="pass1">Haslo:</label>
 <input type="password" name="pass1" placeholder="Podaj haslo"><br>
 <label for="pass2">Powtórz haslo:</label>
 <input type="password" name="pass2" placeholder="Powtorz haslo"><br>

<label for="typy">Podaj typ:</label>
<select class="selekt" name="typy">
dodaj;
?>
</div>
<?php
 $sql = "SELECT * FROM `uprawnienia`";
       $result = $connect->query($sql);
       while ($uprawnienie=$result->fetch_assoc()) {
         echo "<option value=\"$uprawnienie[id_typu]\">$uprawnienie[nazwa_uprawnienia]</option>";
       }

echo<<<dodaj
       </select>
       <br>
       <input type="submit" value="zarejestruj">
       </form>
dodaj;
}
if (isset($_GET['info'])) {
  echo "<h2>$_GET[info]</h2>";
}
if (isset($_GET['hasla'])) {
  echo "<h2>$_GET[hasla]</h2>";
}






//Akutalizowanie użytkownika

if (isset($_GET['upd'])) {
$connect=new mysqli("localhost","root","","dziennik");
$update=$_GET['upd'];
$sql="SELECT `id`,`imie`,`nazwisko`,`klasa`,`login`,`password`,`typ` FROM `uzytkownicy` WHERE `id`=$update";
$result = $connect->query($sql);
  while ($ob = $result->fetch_assoc()) {
    echo<<<formularz
    <form action="./update.php" method="GET">
    <h3>Aktualizujesz uzytkownika o id=$_GET[upd]</h3>
    <input type="hidden" name="identyfikator" value="$_GET[upd]">
    <label for="imie">Imię:</label>
    <input type="text" name="imie" value="$ob[imie]"><br>
    <label for="nazwisko">Nazwisko:</label>
    <input type="text" name="nazwisko" value="$ob[nazwisko]"><br>
    <label for="klasa">Klasa:</label>
    <input type="text" name="klasa" value="$ob[klasa]"><br>
    <label for="login">Login:</label>
    <input type="text" name="login" value="$ob[login]"><br>
    <label for="pass1">Haslo:</label>
    <input type="password" name="pass1" value="$ob[password]"><br>
    <label for="typy">Typy:</label>
     <select class="selekt" name="typy">
    formularz;
  }




$sql = "SELECT * FROM `uprawnienia`";
     $result = $connect->query($sql);
     while ($uprawnienie=$result->fetch_assoc()) {
       echo "<option value=\"$uprawnienie[id_typu]\">$uprawnienie[nazwa_uprawnienia]</option>";
     }
     echo<<<formularz

     </select>

     <br><input type="submit" value="zaaktualizuj">
      </form>
     formularz;
     $connect->close();
   }
?>


  </body>
</html>
