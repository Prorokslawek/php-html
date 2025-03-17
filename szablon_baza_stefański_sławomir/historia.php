<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Historia ocen</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <a class="right" href="index.php">Wyloguj</a>
    <?php
    $connect=new mysqli("localhost","root","","dziennik");
    $sql="Select * from modyfikacje where id_oceny=$_GET[idoceny]";
    $result=$connect->query($sql);
    $ob = $result->fetch_assoc();
    if ($ob==NULL) {
      echo"<h2>Ta ocena nie miała żadnej modyfikacji!</h2>";
    }
    else {
      $result2=$connect->query($sql);
      while ($ob2 = $result2->fetch_assoc()) {
      echo<<<oceny
      Data oceny : $ob2[data_oceny] <br>
      Ocena przed poprawą : $ob2[ocena_przed]<br><br>
      oceny;

        }

    }
    $connect->close();

    echo<<<wroc
    <h2><a href="nauczyciel.php?id=$_GET[id]">Powróc do strony głównej</a></h2>
    wroc;

     ?>
  </body>
</html>
