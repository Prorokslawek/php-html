<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    echo<<<gmina
    <form action="dodawanie.php" method="get">
    <input type="text"  placeholder="Podaj imie" name="imie"><br>
    <input type="text" placeholder="Podaj nazwisko" name="nazwisko"><br>
    <select name="obywatelstwo"><br>

gmina;
$connect= new mysqli("localhost","root","","studia");
$sql = "SELECT * FROM `obywatelstwo`";
$result = $connect->query($sql);
while ($ob=$result->fetch_assoc()) {
  echo "<option value=\"$ob[id]\">$ob[obywatelstwo]</option>";
}
echo<<<gmina
<input type="submit" value="Wyslij">
    </select>
    </form>
gmina;
?>
  </body>
</html>
