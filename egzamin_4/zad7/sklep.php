<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="styl1.css">
    <title>Hurtownia</title>
  </head>
  <body>
<div class="gora">
     <div id="logo"><img src="komputer.png " alt="hurtownia komuterowa"></div>
     <div class="lisiform">
    <ul>
    <li>Sprzet</li><ol>
        <li>Procesory</li>
        <li>Pamieci ram</li>
        <li>Monitory</li>
        <li>Obudowy</li>
        <li>Karty graficzne</li>
        <li>Dyski twarde</li>
        </ol>
    <li>Oprogramowanie</li>
    </ul>
    </div>
     <div class="lisiform"><h2>Hurtownia komputerowa</h2>
    <form method="get">Wybierz kategorie sprzetu:
    <input name="numer" type="number">
    <input type="submit" value="Sprawdz">
    </form>
    </div>
</div>
      <div class="srodek">
      <div id="glowny"><h1>Podzespoły we wskazanej kategorii</h1>
        <?php
         $connect = new mysqli("localhost", "root", "", "sklep");
        if (isset($_GET["numer"])) {
          switch ($_GET["numer"]){
            case 1:
               $_GET["numer"]="Procesor";
              break;
            case 2:
               $_GET["numer"]="RAM";
              break;
          }
          $sql = "Select nazwa, podzespoly.opis,cena FROM podzespoly join typy on typy.id=podzespoly.typy_id where kategoria = '".$_GET["numer"]."';";

          $result = $connect->query($sql);

          while ($row = $result->fetch_assoc()) {
                echo <<< ROW
                    $row[nazwa] $row[opis] Cena: $row[cena]
                  <br>
ROW;
}
        }
        $connect->close();

        ?>
      </div>
      </div>

<footer id="stopka"><h3>Hurtownia działa od poniedziałku
do soboty w godzinach 7<sup>00</sup>-16<sup>00</sup></h3><a href="mailto: bok@hurtownia.pl">Napisz do nas</a>
Partnerzy
<a href="http://intel.pl" target="_blank">Intel</a>
<a href="http://amd.pl" target="_blank">AMD</a>
<p>Strone wykonal: Slawomir Stefanski</p>

</footer>
<script>


</script>
  </body>
</html>
