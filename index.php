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
            <li class="active"><a href="#">Home</a></li>
            <li><a href="unos.html">Kreiraj članak</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <content>
    <div class="main">
        <h1 class="naslov-politika">Politika</h1> <br />
        <div class="vijesti-politika" id='politika'>
            <?php
                for($i = 0; $i < 4; $i++){
                    echo "<div class='vijesti col-lg-3 col-md-6 col-xs-12'>
                    <img src='Slike/smrle.jpg' class='slikeClanak'>
                    <h2>Netko je papak</h2>
                    <p>Bla bla kupio sam novi ususivacč al ne radi a ne znam zašto jer piše da bi trebao raditi</p>
                    <a href='vijesti.php' class='linkProcitajVise'>Pročitaj više</a>
                    </div>";
                }
            ?>
        </div>
        <h1 class="naslov-sport">Sport</h1> <br />
        <div class="vijesti-sport" id='sport'>
            <?php
                for($i = 0; $i < 4; $i++){
                    echo "<div class='vijesti col-lg-3 col-md-6 col-xs-12'>
                    <img src='Slike/smrle.jpg' class='slikeClanak'>
                    <h2>Netko je papak</h2>
                    <p>Bla bla kupio sam novi ususivacč al ne radi a ne znam zašto jer piše da bi trebao raditi</p>
                    <a href='vijesti.php' class='linkProcitajVise'>Pročitaj više</a>
                    </div>";
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
