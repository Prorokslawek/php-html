<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./style.css">
    <title></title>
  </head>
  <body>
<?php
$connect= new mysqli("localhost","root","","studia");
$sql="SELECT studenci.id as 'studentid',`imie`,`nazwisko`,obywatelstwo FROM `studenci`join obywatelstwo on studenci.obywatelstwo_id=obywatelstwo.id;";
$result=$connect->query($sql);

echo<<<table
<table>
  <tr>
    <th>id</th>
    <th>imie</th>
    <th>nazwisko</th>
    <th>obywatelstwo</th>
    <th>Usun</th>
  </tr>
table;

while ($row=$result->fetch_assoc()) {
echo<<<ety
<tr>
  <td>$row[studentid]</td>
  <td>$row[imie]</td>
  <td>$row[nazwisko]</td>
  <td>$row[obywatelstwo]</td>
  <td><a href="delete.php?delUser=$row[studentid]">Usun</a></td>
</tr>
ety;
}

echo<<<table
</table>
table;

if(isset($_GET['info'])){
echo 'Usunieto uzytkownika o id: '.$_GET['info'];
}
if(isset($_GET['mess'])){
echo $_GET['mess'];
}


$connect->close();
 ?>





  </body>
</html>
