<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Modyfikacja</title>
  </head>
  <body>
<a class="right" href="index.php">Wyloguj</a>
    <?php
    echo<<<formularz
    <form  method="post">
      <label for="staraocena">Stara ocena:</label>
      <input type="text" name="staraocena" value=$_GET[ocena]><br>
      <input type="text" name="nowaocena" placeholder="Wpisz nową ocenę"><br>
      <input type="submit" value="Zaaktaulizuj">
    </form>
    formularz;
    if (isset($_POST['nowaocena'])) {
      $connect=new mysqli("localhost","root","","dziennik");
      $dataoceny=$_GET['dataoceny'];
      $ocena=$_GET['ocena'];
      $idoceny=$_GET['idoceny'];
      $sql="INSERT INTO `modyfikacje`(`data_oceny`, `ocena_przed`, `id_oceny`) VALUES ('$dataoceny','$ocena','$idoceny')";
      $connect->query($sql);
    $sql2="UPDATE `oceny` SET `ocena`='$_POST[nowaocena]',`data_dod`=current_timestamp WHERE `id_oceny`=$idoceny;";
    $connect->query($sql2);
    header("location:nauczyciel.php?info=Ocena została zmieniona!&id=$_GET[id]");
    $connect->close();

    }


     ?>

  </body>
</html>
