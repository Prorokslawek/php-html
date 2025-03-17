<?php
  $connect=new mysqli("localhost","root","","dziennik");
  $imie=$_GET['imie'];
  $nazwisko=$_GET['nazwisko'];
  $klasa=$_GET['klasa'];
  $login=$_GET['login'];
  $hashedpw=password_hash($_GET['pass1'],PASSWORD_DEFAULT);
  $typ=$_GET['typy'];
  $identyfikator=$_GET['identyfikator'];

  $sql="UPDATE `uzytkownicy` SET `imie`='$imie',`nazwisko`='$nazwisko',`klasa`='$klasa',`login`='$login',`password`='$hashedpw',`typ`='$typ' WHERE `uzytkownicy`.`id`=$identyfikator";
  $connect->query($sql);
  if ($connect->affected_rows == 1) {
  header("location:./administrator.php?info=Prawidlowo zaaktualizowano uzytkownika!");
}



 ?>
