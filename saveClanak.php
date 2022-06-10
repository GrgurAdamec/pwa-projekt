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
    $kategorija = $_POST['kategorija'];
    $kratkiSadrzaj = $_POST['kratkiSadrzaj'];
    $sadrzaj = $_POST['clanak'];    
    $slika = $_POST['slika'];
    $slika_full_path = $_POST['slika_full_path'];
    $datum = $_POST['datum'];
    $vidljivost = $_POST['vidljivost'];
    
    if(isset($_POST['submit'])){
        $dbc = mysqli_connect('localhost', 'root', '', 'projekt') or
                    die('Error connecting to MySQL server.' . mysqli_connect_error());

        $sql="INSERT INTO vijest (naslov, kategorija, kratki_sadrzaj, sadrzaj, slika, slika_full_path, datum, vidljivost) values (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($dbc);
                    
        if (mysqli_stmt_prepare($stmt, $sql)){
            mysqli_stmt_bind_param($stmt,'sssssssi', $naslov, $kategorija, $kratkiSadrzaj, $sadrzaj, $slika, $slika_full_path, $datum, $vidljivost);
            mysqli_stmt_execute($stmt);
        } 
    }

    mysqli_close($dbc);

    echo "<content>
    <div class='main'>       
        <h3 style='margin-left: 5%;'> Sadržaj uspješno spremljen! </h3>
        <a href='index.php' style='margin-left: 5%; margin-bottom:30px; color:black;'>Vratite se na početnu stranicu</a>
        <br/>

        <article class='article'>
            <h4 style='color:red;'> $kategorija </h4>
            <br />
            <h1 class='naslov-clanka'> $naslov </h1>
            <br />
            <h6 style='color:grey;'> $datum </h6>
            <br />
            <img src='". $slika ."' class='slikeClanak slika'>
            <br/>
            <h4 class='bold-text'> $kratkiSadrzaj </h4>
            <br />
            <p>
                $sadrzaj
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