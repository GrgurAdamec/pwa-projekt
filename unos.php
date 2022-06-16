<?php
 session_start();

 if(!isset($_SESSION['username'])) {
  header('Location: http://localhost/Vjezbe/Projekt/index.php');
 }
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='Style.css'/>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
</head>
<body>
    <?php
      include 'header.php';
    ?>

    <content>
    <?php
      include 'connect.php';

      if(isset($_GET['id'])){
      $query = "SELECT * FROM vijest WHERE id = ".$_GET['id']."";

      $result = mysqli_query($dbc, $query) or die('Error querying database.');

      $row = mysqli_fetch_array($result);

      echo "<div class='main'>
          <form method='post' action='previewClanak.php' enctype='multipart/form-data'>
              <div class='form-row'>
                <div class='form-group col-md-12'>
                  <input type='hidden' class='form-control' id='idClanka' name='idClanka' value='".$row['id']."'>
                </div>
                <div class='form-group col-md-12'>
                  <label for='naslov'>Naslov članka</label>
                  <input type='text' class='form-control' id='naslov' placeholder='Naslov...' name='naslov' value='".$row['naslov']."' required>
                  <span id='porukaNaslov' class='error'></span> </br>
                </div>
                <div class='form-group col-md-12'>
                  <label for='kratkiSadrzaj'>Kratki sadržaj</label>
                  <textarea name='kratkiSadrzaj' rows='3' class='form-control' id='kratkiSadrzaj' placeholder='Kratki sadrzaj...' required>".$row['kratki_sadrzaj']."</textarea>
                  <span id='porukaKratkiSadrzaj' class='error'></span> </br>
                </div>
              </div>
              <div class='form-group col-md-12'>
                <label for='clanak'>Tekst članka</label>
                <textarea name='clanak' rows='20' class='form-control' id='clanak' placeholder='Tekst članka...'  required>".$row['sadrzaj']."</textarea>
                <span id='porukaClanak' class='error'></span> </br>
              </div>
              <div class='form-group col-md-12'>
                  <label for='kategorija'>Kategorija</label>
                  <select id='kategorija' name='kategorija' class='form-control'>
                      <option  value='".$row['kategorija']."' selected hidden>".$row['kategorija']."</option>
                      <option value='SPORT'>Sport</option>
                      <option value='POLITIKA'>Politika</option>
                  </select>
                  <span id='porukaKategorija' class='error'></span> </br>
              </div>
              <div class='form-group col-md-12'>
                <label for='slika'>Slika</label>
                <input type='hidden' class='form-control' id='staraSlika' name='staraSlika' value='".$row['slika']."'>
                <input type='file' name='slika' class='form-control' id='slika'>
                <br><img src='".$row['slika']."' width=100px>
                <span id='porukaSlika' class='error'></span> </br>
              </div>";

              if($row['vidljivost'] == 0){
              echo "<div class='form-group col-md-12'>
                <div class='form-check'>
                  <input class='form-check-input' type='checkbox' id='provjera' name='provjera'>
                  <label class='form-check-label' for='gridCheck'>
                      Želim da članak bude vidljiv svima.
                  </label>
                </div>
              </div>";
              } else {
                echo "<div class='form-group col-md-12'>
                  <div class='form-check'>
                    <input class='form-check-input' type='checkbox' id='provjera' name='provjera' checked>
                    <label class='form-check-label' for='gridCheck'>
                        Želim da članak bude vidljiv svima.
                    </label>
                  </div>
                </div>";
              }
              echo "<button type='submit' class='btn btn-primary col' id='gumb'>Pošalji</button> <br/>";

          echo "</form>

         <form method='post' action='urediVijest.php' enctype='multipart/form-data'>
            <input type='hidden' class='form-control' id='idClanka' name='idClanka' value='".$row['id']."'>
            <button type='submit' class='btn btn-primary col' id='gumbZaBrisanje' name='gumbZaBrisanje' style='margin-top:20px;'>Izbriši</button>
         </form>
      </div>";
      } else {
        echo "<div class='main'>
        <form method='post' action='previewClanak.php' enctype='multipart/form-data'>
          	  <div class='form-row'>
                <div class='form-group col-md-12'>
                  <input type='hidden' class='form-control' id='idClanka' name='idClanka' value='0'>
                </div>
              <div class='form-row'>
              <div class='form-group col-md-12'>
                <label for='naslov'>Naslov članka</label>
                <input type='text' class='form-control' id='naslov' placeholder='Naslov...' name='naslov' required>
                <span id='porukaNaslov' class='error'></span> </br>
              </div>
              <div class='form-group col-md-12'>
                <label for='kratkiSadrzaj'>Kratki sadržaj</label>
                <textarea name='kratkiSadrzaj' rows='3' class='form-control' id='kratkiSadrzaj' placeholder='Kratki sadrzaj...' required></textarea>
                <span id='porukaKratkiSadrzaj' class='error'></span> </br>
              </div>
            </div>
            <div class='form-group col-md-12'>
              <label for='clanak'>Tekst članka</label>
              <textarea name='clanak' rows='20' class='form-control' id='clanak' placeholder='Tekst članka...' required></textarea>
              <span id='porukaClanak' class='error'></span> </br>
            </div>
            <div class='form-group col-md-12'>
                <label for='kategorija'>Kategorija</label>
                <select id='kategorija' name='kategorija' class='form-control' required>
                    <option value='none' selected disabled hidden>Odaberite kategoriju</option>
                    <option value='SPORT'>Sport</option>
                    <option value='POLITIKA'>Politika</option>
                </select>
                <span id='porukaKategorija' class='error'></span> </br>
            </div>
            <div class='form-group col-md-12'>
              <label for='slika'>Slika</label>
              <input type='file' name='slika' class='form-control' id='slika' accept='image/*' required>
              <span id='porukaSlika' class='error'></span> </br>
            </div>
            <div class='form-group col-md-12'>
              <div class='form-check'>
                <input class='form-check-input' type='checkbox' id='provjera' name='provjera'>
                <label class='form-check-label' for='gridCheck'>
                    Želim da članak bude vidljiv svima.
                </label>
              </div>
            </div>
            <button type='submit' class='btn btn-primary col' id='gumb'>Pošalji</button>
        </form>
    </div>";
      }
    ?>
    </content>

    <script type = 'text/javascript'>
      document.getElementById('gumb').onclick = function(event) {
          var slanje_forme = true;
      
          var poljeNaslov = document.getElementById('naslov');
          var naslov = document.getElementById('naslov').value;
          if (naslov.length < 4 || naslov.length > 30) {
              slanje_forme = false;
              poljeNaslov.style.border = '1px solid red';
              document.getElementById('porukaNaslov').innerHTML = 'Naslov mora imat između 5 i 30 znakova!<br>';
              document.getElementById('porukaNaslov').style.color = 'red';
          }
  
          var poljeKratkiSadrzaj = document.getElementById('kratkiSadrzaj');
          var kratkiSadrzaj = document.getElementById('kratkiSadrzaj').value;
          if (kratkiSadrzaj.length < 9 || kratkiSadrzaj.length > 100) {
              slanje_forme = false;
              poljeKratkiSadrzaj.style.border = '1px solid red';
              document.getElementById('porukaKratkiSadrzaj').innerHTML = 'Kratki sadržaj mora imati između 10 i 100 znakova! <br>';
              document.getElementById('porukaKratkiSadrzaj').style.color = 'red';
          }

          var poljeClanak = document.getElementById('clanak');
          var clanak = document.getElementById('clanak').value;    
          if (clanak.length == 0) {
              slanje_forme = false;
              poljeClanak.style.border = '1px solid red';
              document.getElementById('porukaClanak').innerHTML = 'Sadržaj članka ne smije biti prazan!';
              document.getElementById('porukaClanak').style.color = 'red';
          }
      
          var poljeSlika = document.getElementById('slika');
          var slika = document.getElementById('slika').value; 
          var idClanak = document.getElementById('idClanka').value;   
          if (slika.length == 0 && idClanak == 0) {
              slanje_forme = false;
              poljeSlika.style.border = '1px solid red';
              document.getElementById('porukaSlika').innerHTML = 'Slika mora biti odabrana!';
              document.getElementById('porukaSlika').style.color = 'red';
          }

          var poljeKategorija = document.getElementById('kategorija');
          var kategorija = document.getElementById('kategorija').value;
          var idClanak = document.getElementById('idClanka').value;     
          if (poljeKategorija.selectedIndex == 0 && idClanak == 0) {
              slanje_forme = false;
              poljeKategorija.style.border = '1px solid red';
              document.getElementById('porukaKategorija').innerHTML = 'Kategorija mora biti odabrana!';
              document.getElementById('porukaKategorija').style.color = 'red';
          }
      
          if (slanje_forme != true) {
              event.preventDefault();
              return false;
          }
      
      }
    </script>

    <footer>
        <p class='footer'>Grgur Adamec | gadamec@tvz.hr | 2022.</p>
    </footer>
</body>
</html> 