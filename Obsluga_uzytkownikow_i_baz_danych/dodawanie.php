<?php
$connect= new mysqli("localhost","root","","studia");
if (!empty($_GET)) {
  foreach ($_GET as $key => $value) {
    if (empty($value)) {
      header("location:./Studenci.php?mess=Wypelnij wszystkie pola!");
      exit();
    }
  }
  $sql="INSERT INTO `studenci`(`imie`, `nazwisko`, `obywatelstwo_id`) VALUES ('$_GET[imie]','$_GET[nazwisko]','$_GET[obywatelstwo]');";
  $result=$connect->query($sql);
  if ($connect->affected_rows==1) {
    header("location:./Studenci.php?mess=prawidlowo dodano uzytkownika");
  }


}

  else{
    $sql="INSERT INTO `studenci`(`imie`, `nazwisko`, `obywatelstwo_id`) VALUES ('$_GET[imie]','$_GET[nazwisko]','$_GET[obywatelstwo]');";
    $result=$connect->query($sql);
    header("location:./Studenci.php?mess=Nie prawidlowo dodano uzytkownika");
  }



 ?>
