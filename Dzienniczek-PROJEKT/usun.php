<?php
if (isset($_GET['del'])) {
  $connect=new mysqli("localhost","root","","dziennik");
  $delete=$_GET['del'];
  $sqll="DELETE FROM `oceny` WHERE id_ucznia = $delete";
  $connect->query($sqll);
  $sql="DELETE FROM `uzytkownicy` WHERE `uzytkownicy`.`id` = $delete";
  $result=$connect->query($sql);
  if ($connect->affected_rows==1) {
  header("location:./administrator.php?info=Usunieto uzytkownika o id =$delete");
}
else {
  header("location:./administrator.php?info=Nie udało się usunąc użytkownika!");
}
}

 ?>
