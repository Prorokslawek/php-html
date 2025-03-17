<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Dodawanie ocen</title>
  </head>
  <body>
    <a class="right" href="index.php">Wyloguj</a>
    <?php
    if (isset($_GET['idu'])) {
    $connect=new mysqli("localhost","root","","dziennik");
    $sql="SELECT `imie`,`nazwisko` FROM `uzytkownicy` where id='$_GET[idu]'";
    $result = $connect->query($sql);
    $ob = $result->fetch_assoc();
    echo<<<abc
      <form method="GET" action="dodawanie_ocen_dwa.php?id=$_GET[id]">
        <label for="uczen">Imię i nazwisko ucznia:<br></label>
        <input type="text" name="uczen" value="$ob[imie] $ob[nazwisko]"><br>
        <select class="selekt" name="nauczyciel">
    abc;
    $sql = "SELECT * FROM `uzytkownicy` where typ=2";
    $result = $connect->query($sql);
    while ($nauczyciel=$result->fetch_assoc()) {
      echo "<option value=\"$nauczyciel[id]\">$nauczyciel[imie] $nauczyciel[nazwisko]</option>";
    }
    echo<<<abc
      </select>
      <br>
        <input type="text" name="ocena" placeholder="Podaj ocenę"><br>
        <input type="hidden" name="iducznia" value="$_GET[idu]">
        <input type="hidden" name="iducz" value="$_GET[id]">
      <select class="selekt" name="nazwa">
    abc;
    $sql = "SELECT * FROM `przedmioty`";
          $result = $connect->query($sql);
          while ($nazwa=$result->fetch_assoc()) {
            echo "<option value=\"$nazwa[id_przedmiotu]\">$nazwa[nazwa]</option>";
          }
    echo <<<abc
          </select>
          <br>
            <input type="submit" name="wstaw" value="wstaw ocenę">
          </form>
    abc;
    $connect->close();
    }


     ?>

  </body>
</html>
