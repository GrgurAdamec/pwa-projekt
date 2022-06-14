<?php
  session_start();
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
      <header>
        <h1 class="naslov">L'Grgur Vijesti</h1>

        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="unos.php">Kreiraj članak</a></li>
            <li><a href="kategorije.php?kategorija=POLITIKA">Politika</a></li>
            <li><a href="kategorije.php?kategorija=SPORT">Sport</a></li>
            <?php
            if(isset($_SESSION['username']) && $_SESSION['role'] == 'admin'){
                echo "<li><a href='#'>Uredi vijest</a></li>";
            }
            ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
            if(!isset($_SESSION['username'])){
                echo"
                <li><a href='signUp.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
                <li><a href='logIn.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
            }
            if(isset($_SESSION['username'])){
                echo "<li><a href='logOut.php'>Log out</a></li>";
            }
            ?>
          </ul>
        </div>
        </nav>
      </header>

    <content>
    <div class="main">
        <?php
        if(isset($_SESSION['username']) && $_SESSION['role'] == 'admin'){
          echo "Dobrodošli ";
          echo $_SESSION['username'];

        if(isset($_POST['gumbZaBrisanje'])){
          include 'connect.php';

          $id = $_POST['idClanka'];

          $query="DELETE FROM vijest WHERE id=$id";

          $result = mysqli_query($dbc, $query) or die('Error querying database.');

          mysqli_close($dbc);
        }

        echo "<h1 class='naslov-politika'>Vijesti</h1> <br />";
        echo "<div class='vijesti-politika' id='politika'>";
                include 'connect.php';

                $query = "SELECT * FROM vijest";

                $result = mysqli_query($dbc, $query) or die('Error querying database.');

                if($result){
                    while($row = mysqli_fetch_array($result)){
                      echo "<div class='vijesti2 col-lg-3 col-md-6 col-xs-12'> 
                        <div class='vijesti'>
                          <img src='". $row['slika'] ."' class='slikeClanak'>
                          <h2>".$row['naslov']."</h2>
                          <p>". $row['kratki_sadrzaj']."</p>
                          <a href='vijesti.php?id=".$row['id']."' class='linkProcitajVise'>Pročitaj više</a>
                        </div> 
                      </div>";
                    }
                }
        echo "</div>";
        } else{
          echo "Dobrodošli, nemate prava za pristup ovoj stranici";
        }
        ?>
    </div>
    </content>

    <footer>
        <p class="footer">Grgur Adamec | gadamec@tvz.hr | 2022.</p>
    </footer>
</body>
</html> 