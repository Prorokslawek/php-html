<?php
$connect= new mysqli("localhost","root","","studia");
$sql="DELETE FROM `studenci` WHERE `studenci`.`id` = $_GET[delUser]";
$connect->query($sql);
header("location:./Studenci.php?info=$_GET[delUser]");

 ?>
