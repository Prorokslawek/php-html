<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="styl5.css">
    <title>Grzybobranie</title>
  </head>
  <body>
    <div class="naglowek">
    <div id="miniatury"><img src="borowik-miniatura.jpg" alt="Grzyborbanie" href="borowik.jpg"></div>
    <div id="tytulowy"><h1>Idziemy na grzyby!</h1></div>
    </div>

<div class="srodek">
<div id="lewy">
  <?php
             $connect = new mysqli("localhost", "root", "", "dane2");
             $sql = "SELECT `nazwa_pliku`,`potoczna` from grzyby";

             $result = $connect->query($sql);

             while ($row = $result->fetch_assoc()) {
                   echo <<< ROW

                    <img src="$row[nazwa_pliku]">




  ROW;
  }
  $connect->close();

  ?>
</div>
<div id="prawy"><h2>Grzyby jadalne</h2>
<?php
           $connect = new mysqli("localhost", "root", "", "dane2");
           $sql = "SELECT `nazwa`,`potoczna` from grzyby where jadalny like true";

           $result = $connect->query($sql);

           while ($row = $result->fetch_assoc()) {
                 echo <<< ROW
                     $row[nazwa]($row[potoczna])
                   <br>
ROW;
}
$connect->close();

?>

    <h2>Polecamy do sosów</h2>
     <ol>
    <?php
               $connect = new mysqli("localhost", "root", "", "dane2");
               $sql = "SELECT grzyby.nazwa,`potoczna`,rodzina.nazwa as'rodzinka' from grzyby
join rodzina
on rodzina.id=grzyby.rodzina_id
join potrawy
on potrawy.id=grzyby.potrawy_id
where potrawy.nazwa like 'sos'";

               $result = $connect->query($sql);
               while ($row = $result->fetch_assoc()) {
                     echo <<< ROW


                       <li>$row[nazwa]($row[potoczna]), rodzina:$row[rodzinka]</li>



    ROW;
    }
    $connect->close();

    ?>
     </ol>

    </div>
</div>



<footer><a>Autor:Sławomir Stefański</a></footer>
<script>

</script>
  </body>
</html>
