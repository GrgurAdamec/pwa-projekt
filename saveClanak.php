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
    <?php
        include 'header.php';
    ?>

    <?php
    $id = $_POST['id'];
    $naslov = $_POST['naslov'];    
    $kategorija = $_POST['kategorija'];
    $kratkiSadrzaj = $_POST['kratkiSadrzaj'];
    $sadrzaj = $_POST['clanak'];    
    $slika = $_POST['slika'];
    $datum = $_POST['datum'];
    $vidljivost = $_POST['vidljivost'];
    
    if($id == 0){
        if(isset($_POST['submit'])){
            include 'connect.php';

            $sql="INSERT INTO vijest (naslov, kategorija, kratki_sadrzaj, sadrzaj, slika, datum, vidljivost) values (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($dbc);
                        
            if (mysqli_stmt_prepare($stmt, $sql)){
                mysqli_stmt_bind_param($stmt,'ssssssi', $naslov, $kategorija, $kratkiSadrzaj, $sadrzaj, $slika, $datum, $vidljivost);
                mysqli_stmt_execute($stmt);
            } 
        }
    } else {
        include 'connect.php';

        $sql="UPDATE vijest SET naslov=?, kategorija=?, kratki_sadrzaj=?, sadrzaj=?, slika=?, datum=?, vidljivost=? WHERE id = $id";
            $stmt = mysqli_stmt_init($dbc);
                     
            if (mysqli_stmt_prepare($stmt, $sql)){
                mysqli_stmt_bind_param($stmt,'ssssssi', $naslov, $kategorija, $kratkiSadrzaj, $sadrzaj, $slika, $datum, $vidljivost);
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
            <img src='". $slika ."' class='slikeSave'>
            <br/>
            <h4 class='bold-text'> $kratkiSadrzaj </h4>
            <br />
            <p class='word-break'>
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