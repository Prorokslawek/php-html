<?php
if (!empty($_GET)) {
  foreach ($_GET as $key => $value) {
    if(empty($value)) {
      header("location: ./administrator.php?info=Wypełnij wszystkie pola w formularzu!&dodaj");
      exit();
    }
  }  $zm=$_GET['pass1'];
  if ($_GET['pass1']!=$_GET['pass2']) {
    header("location: ./administrator.php?hasla=Hasła się nie zgadzają!&dodaj");
    exit();
  }

  else if(strlen(trim($zm))<4){
    header("location: ./administrator.php?hasla=Haslo musi miec wiecej niz 3 znaki!&dodaj");
    exit();
  }
else {
  $connect=new mysqli("localhost","root","","dziennik");
  $typy=$_GET['typy'];
  $hashedpw=password_hash($_GET['pass2'], PASSWORD_DEFAULT);
  $sql="INSERT INTO `uzytkownicy`(`imie`, `nazwisko`, `klasa`, `login`, `password`, `typ`) VALUES ('$_GET[imie]','$_GET[nazwisko]','$_GET[klasa]','$_GET[login]','$hashedpw','$typy')";
  $connect->query($sql);
  header("location: ./administrator.php?info=Prawidłowo dodano użytkownika!");
  $connect->close();
}
  }


 ?>
