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
        <?php
        $kategorija = $_GET['kategorija'];
        echo "<h1 class='naslov-politika'>VIJESTI $kategorija</h1> <br />";
        echo "<div class='vijesti-politika' id='politika'>";
                include 'connect.php';

                $query = "SELECT * FROM vijest WHERE kategorija = '$kategorija' ORDER BY id DESC";

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
        ?>
    </div>
    </content>

    <footer>
        <p class="footer">Grgur Adamec | gadamec@tvz.hr | 2022.</p>
    </footer>
</body>
</html> 
