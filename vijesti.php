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
                echo "<li><a href='urediVijest.php'>Uredi vijest</a></li>";
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
        <article class="article">
          <?php
            $id = $_GET['id'];
            include 'connect.php';

            $query = "SELECT * FROM vijest WHERE id = $id";

            $result = mysqli_query($dbc, $query) or die('Error querying database.');

            $row = mysqli_fetch_array($result);

            echo "<h4 style='color:red;''> ".$row['kategorija']." </h4>
            <br />
            <h1 class='naslov-clanka'> ".$row['naslov']." </h1>
            <br />
            <h6 style='color:grey;'> ".$row['datum']." </h6>
            <br />
            <img src='".$row['slika']."' class='slikeVijesti'>
            <br/>
            <h4 class='bold-text'>".$row['kratki_sadrzaj']."</h4>
            <br />
            <p style='word-break:break-all;'>".$row['sadrzaj']."</p>";
          ?>
        </article>
    </div>
    </content>

    <footer>
        <p class="footer">Grgur Adamec | gadamec@tvz.hr | 2022.</p>
    </footer>
</body>
</html> 