<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Logowanie</title>
  </head>
  <body>

      <h2 class="center">Logowanie</h2>
    <div class="center">
    <form method="POST">
      <label for="login">Login:</label>
      <input type="text" name="login" placeholder="Podaj login"><br>
      <label for="password">Haslo:</label>
      <input type="password" name="password" placeholder="Podaj hasło"><br>
      <input type="submit" value="zaloguj">
    </form>
    </div>



<?php


if ($_SERVER['REQUEST_METHOD']!='POST')  return;
$connect=new mysqli("localhost","root","","dziennik");
$login=$_POST['login'];
$sql="Select * from uzytkownicy where login='$login';";
$result=$connect->query($sql);
$ob=$result->fetch_assoc();
if (empty($_POST['login'])||empty($_POST['password'])) {

echo "<div class='center'>Wypełnij wszystkie pola</div>";
}
elseif ($ob == NULL) {
echo "<div class='center'>Nie ma takiego uzytkownika</div>";
}
elseif (password_verify($_POST['password'],$ob['password'])) {
  switch ($ob['typ']) {
        case 1:
          header("location:./administrator.php?id=$ob[id]");
          break;
        case 2:
          header("location:./nauczyciel.php?id=$ob[id]");
          break;
        case 3:
          header("location:./uczen.php?id=$ob[id]");
          break;
      }
  }
else {
  echo "<div class='center'>Podano bledne haslo</div>";
}
 ?>



  </body>
</html>
