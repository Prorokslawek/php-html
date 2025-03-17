<?php
if (!empty($_POST["login"])&&!empty($_POST["password"])) {
  header("location:./index.php?error=Wszystkie pola są prawidłowe!");
}
else {
  header("location:./index.php?info=Uzupełnij wszystkie dane!");
}


 ?>
