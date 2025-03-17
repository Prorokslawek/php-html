<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Restauracja - mona</title>
  </head>
  <body>
    <div id="baner">
        <a href="#zdjecie"><img height="100px" src="logo.svg" alt="pizza"></a>
      <div id="onas">
        <a href="#menu"><h2>O nas</h2></a>
      </div>
      <div id="oferta">
        <a href="#ofertajeden"><h2>Oferta</h2></a>
      </div>
      <div id="galeria">
        <a href="#galeriaa"><h2>Galeria</h2></a>
      </div>
      <div id="kontakt">
        <a href="#kafelki"><h2>Kontakt</h2></a>
      </div>
    </div>
    <div id="display">
      <div id="zdjecie">

        <img src="pizza.jpg" width=100% height=350px alt="pizza">
      </div>
    </div>

    <div id="menu">
      <h3> <p id="animacja">Lokal gastronomiczny, specjalizujący się w przyrządzaniu i serwowaniu pizzy. Mamy wieloletnie doświadczenie i
         mnóstwo pozytywnych opinii klientów! Zapraszamy od poniedziałku do niedzieli w godzinach od 12:00 do 21:00</p></h3>
      <img src="pizzeria.jpg" wdith=100% height=200px alt="pizzeria">
    </div>
    <div id="displaydwa">
      <div id="ofertajeden">
        <h3 id="animacja">Pepsi 1l Gratis do Pizzy</h3>
        <h6>Przy zamówieniu powyżej 40 zł</h6>
        <img class="zdj" src="pepsi.jfif" alt="pepsi">
      </div>
      <div id="ofertadwa">
        <h3 id="animacja">Dowóz od 20zł</h3>
        <h6>Tylko dla miejscowości: Dopiewo,Konarzewo,Trzcielin,Dopiewiec,Dąbrówka</h6>
        <img class="zdj" src="dostawa.png" alt="dostawa">
      </div>
      <div id="ofertatrzy">
        <h3 id="animacja">Trzecia pizza za złotówkę</h3>
        <h6>Mała, najtańsza z zamówionych</h6>
        <img class="zdj"  src="zlotowka.jfif" alt="pepsi">
      </div>
    </div>

<div id="galeriaa">
<?php
$connect = new mysqli("localhost", "root", "", "mona");
$sql = "SELECT * FROM `pizza`;";
$result = $connect->query($sql);


   while ($row2 = $result->fetch_assoc()) {
     echo <<< ROW

         <img class="zdjecia" width=20% height=20% src=$row2[zdj]>

     ROW;
   }

   $connect->close();
 ?>
</div>

  <footer>
    <div id="kafelki">
      <div id="nrtel">
        <p>Numer telefonu: 829-198-192</p>
      </div>
      <div id="mail">
        <p>e-mail:<a href="mailto:pizzeria@mona.gmail.com">pizzeria@mona.gmail.com</a></p>
      </div>
      <div id="adres">
        <p>Adres:Dopiewo, ul. Leśna 1</p>
      </div>
      <div id="godziny">
        <p>Godziny otwarcia:Poniedziałek - Niedziela: 12:00 - 21:002</p>
      </div>
    </div>

    </footer>





<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2436.8829450541925!2d16.67
6089851099416!3d52.35440825614135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!
3m3!1m2!1s0x47044940663da327%3A0x84544e32f10fe8ae!2sBistro%20Mona%20Dopiewo!
5e0!3m2!1spl!2spl!4v1645552786048!5m2!1spl!2spl" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

<script>

let zdjecia = document.querySelectorAll(".zdjecia");

        for (let i in zdjecia) {
            zdjecia[i].onclick = () => {
                zdjecia[i].classList.toggle("zoom")
                for (let j in zdjecia) {
                    if (j != i) {
                        zdjecia[j].classList.toggle("hide")
                    }
                }
            }
        }






</script>

  </body>
</html>
