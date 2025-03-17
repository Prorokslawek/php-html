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
    if (isset($_GET['wstaw'])) {
        $connect=new mysqli("localhost","root","","dziennik");
        $ocena=$_GET['ocena'];
        $nauczyciel=$_GET['nauczyciel'];
        $idprzedmiot=$_GET['nazwa'];
        $sql="INSERT INTO `oceny`(`id_ucznia`, `ocena`, `id_nauczyciela`,`id_przedmiotu`) VALUES ('$_GET[iducznia]','$ocena','$nauczyciel','$idprzedmiot');";
        $connect->query($sql);
        header("location: ./nauczyciel.php?info=Dodano ocenę!&id=$_GET[iducz]");
        $connect->close();
      }


     ?>
  </body>
</html>
