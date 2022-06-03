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
            <li><a href="unos.html">Kreiraj članak</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <?php
    $naslov = $_POST['naslov']; 
    $kratkiSadrzaj = $_POST['kratkiSadrzaj'];
    $clanak = $_POST['clanak'];
    $kategorija = $_POST['kategorija'];

    echo "<content>
    <div class='main'>
        <article class='article'>
            <h4 style='color:red;'> $kategorija </h4>
            <br />
            <h1 class='naslov-clanka'> $naslov </h1>
            <br />
            <h6 style='color:grey;'> 3.6.2022. </h6>
            <br />
            <img src='Slike/smrle.jpg' class='slikeClanak slika'>
            <br/>
            <p>
                $clanak
            </p>
        </article>
    </div>
    </content> "
    ?>

    <footer>
        <p class="footer">Grgur Adamec | gadamec@tvz.hr | 2022.</p>
    </footer>
</body>
</html> 