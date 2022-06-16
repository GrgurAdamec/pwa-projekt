<?php
  session_start();

  if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <?php
      include 'header.php';
    ?>

    <content>
    <div class="main">
        <?php
        if(isset($_SESSION['username']) && $_SESSION['role'] == 'admin' && isset($_GET['id'])){
            echo "Dobrodošli ";
            echo "".$_SESSION['ime']." ".$_SESSION['prezime']."";
        }
        if(isset($_POST['gumbZaBrisanje'])){
          include 'connect.php';

          $id = $_POST['idClanka'];

          $query="DELETE FROM vijest WHERE id=$id";

          $result = mysqli_query($dbc, $query) or die('Error querying database.');
          mysqli_close($dbc);
        }
        ?>
        <h1 class='naslov-politika'>Politika</h1> <br />
        <div class="vijesti-politika" id='politika'>
            <?php
                include 'connect.php';

                $query = "SELECT * FROM vijest WHERE kategorija = 'politika' ORDER BY id DESC";

                $result = mysqli_query($dbc, $query) or die('Error querying database.');

                if($result){
                    while($row = mysqli_fetch_array($result)){
                        echo "<div class='vijesti2 col-lg-3 col-md-6 col-xs-12'> 
                            <div class='vijesti'>
                                <img src='". $row['slika'] ."' class='slikeClanak'>
                                <h2>".$row['naslov']."</h2>
                                <p>". $row['kratki_sadrzaj']."</p>
                                <a href='vijesti.php?id=".$row['id']."' class='linkProcitajVise'>Pročitaj više</a> <br />
                                <a href='unos.php?id=".$row['id']."' class='linkProcitajVise'>Uredi članak</a>
                            </div> 
                        </div>";
                    }
                }
            ?>
        </div>
        <h1 class="naslov-sport">Sport</h1> <br />
        <div class="vijesti-sport" id='sport'>
            <?php
                // include 'connect.php';

                $query = "SELECT * FROM vijest WHERE kategorija = 'sport' ORDER BY id DESC";

                $result = mysqli_query($dbc, $query) or die('Error querying database.');

                if($result){
                    while($row = mysqli_fetch_array($result)){
                        echo "<div class='vijesti2 col-lg-3 col-md-6 col-xs-12'> 
                          <div class='vijesti'>
                            <img src='". $row['slika'] ."' class='slikeClanak'>
                            <h2>".$row['naslov']."</h2>
                            <p>". $row['kratki_sadrzaj']."</p>
                            <a href='vijesti.php?id=".$row['id']."' class='linkProcitajVise'>Pročitaj više</a> <br />
                            <a href='unos.php?id=".$row['id']."' class='linkProcitajVise'>Uredi članak</a>
                          </div> 
                        </div>";
                    }
                }
            ?>
        </div>
    </div>
    </content>

    <footer>
        <p class="footer">Grgur Adamec | gadamec@tvz.hr | 2022.</p>
    </footer>
</body>
</html> 