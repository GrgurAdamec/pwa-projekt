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
    
    <content>
    <div class="main">
        <h1 class="naslov-politika">Politika</h1> <br />
        <div class="vijesti-politika" id='politika'>
            <?php
                include 'connect.php';

                $query = "SELECT * FROM vijest WHERE kategorija = 'politika' AND vidljivost = 1 ORDER BY id DESC LIMIT 4";

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
            ?>
        </div>
        <h1 class="naslov-sport">Sport</h1> <br />
        <div class="vijesti-sport" id='sport'>
            <?php
                include 'connect.php';

                $query = "SELECT * FROM vijest WHERE kategorija = 'sport' AND vidljivost = 1 ORDER BY id DESC LIMIT 4";

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
            ?>
        </div>
    </div>
    </content>

    <footer>
        <p class="footer">Grgur Adamec | gadamec@tvz.hr | 2022.</p>
    </footer>
</body>
</html> 
