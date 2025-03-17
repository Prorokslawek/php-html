<?php
if (isset($_GET['wstaw'])) {
    $connect=new mysqli("localhost","root","","dziennik");
    $ocena=$_GET['ocena'];
    $nauczyciel=$_GET['nauczyciel'];
    $idprzedmiot=$_GET['nazwa'];
    $sql="INSERT INTO `oceny`(`id_ucznia`, `ocena`, `id_nauczyciela`,`id_przedmiotu`) VALUES ('$_GET[iducznia]','$ocena','$nauczyciel','$idprzedmiot');";
    $connect->query($sql);
    header("location: ./administrator.php?info=Dodano ocenę!");
    $connect->close();
  }


 ?>
