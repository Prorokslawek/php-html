<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styl3.css">
    <title>Dane o zwierzętach</title>
  </head>
  <body>
<div id="baner">
  <h1>ATLAS ZWIERZĄT</h1>
</div>

<div id="formularz">

<h2>Gromady</h2>
<ol>
  <li>Ryby</li>
  <li>Płazy</li>
  <li>Gady</li>
  <li>Ptaki</li>
  <li>Ssaki</li>
</ol>
<form  method="post">
Wybierz gromade:
<input type="number" name="gromada">
<input type="submit" name="guzik" value="Wyswietl">
</form>
</div>

<div class="glowne">
  <div id="lewy">
  <img src="zwierzeta.jpg" alt="dzikie zwierzeta">
</div>
  <div id="srodek">
    <?php
               $connect = new mysqli("localhost", "root", "", "baza");
               if(isset($_POST['gromada'])){
                 switch ($_POST["gromada"]) {
                   case 1:
                     $_POST["gromada"]="ryby";
                     break;
                  case 2:
                       $_POST["gromada"]="plazy";
                       break;
                  case 3:
                         $_POST["gromada"]="gady";
                       break;
                  case 4:
                           $_POST["gromada"]="ptaki";
                       break;
                  case 5:
                             $_POST["gromada"]="ssaki";
                      break;



                 }
                 $sql = "SELECT `gatunek`,`wystepowanie` FROM `zwierzeta` JOIN `gromady` on `gromady`.`id`=zwierzeta.Gromady_id where nazwa like '".$_POST["gromada"]."';";

                 $result = $connect->query($sql);

                 while ($row = $result->fetch_assoc()) {
                       echo <<< ROW
                           $row[gatunek], $row[wystepowanie]
                         <br>
      ROW;
      }
               }

    $connect->close();

    ?>
  </div>
  <div id="prawy"><h2>Wszystkie
zwierzęta w bazie"</h2>
<?php
           $connect = new mysqli("localhost", "root", "", "baza");

           $sql = "SELECT zwierzeta.id,`gatunek`,gromady.nazwa as'Nazwa_gromady' FROM `zwierzeta`JOIN
Gromady
on gromady.id=zwierzeta.Gromady_id;";

           $result = $connect->query($sql);

           while ($row = $result->fetch_assoc()) {
                 echo <<< ROW
                     $row[gatunek], $row[Nazwa_gromady]
                   <br>
ROW;
}
$connect->close();

?>
</div>

</div>
<footer><a target="_blank "href="atlas-zwierzat.pl">Poznaj inne strony o zwierzętach</a>
autor Atlasu zwierząt: 8510271582
</footer>
<script>


</script>
  </body>
</html>
