<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style.css"/>
</head>
<body>
    <header>
        <h1 class="naslov">L'Grgur Vijesti</h1>
        <nav class="navigacija">
            <a href="" class="linkNav">Home</a>
            <a href="#politika" class="linkNav">Politika</a>
            <a href="#sport" class="linkNav">Sport</a>
            <a href="" class="linkNav">Login</a>
        </nav>
    </header>
    <div class="main">
        <div class="vijesti-politika" id='politika'>
            <?php
                for($i = 0; $i < 4; $i++){
                    echo "<div class='vijesti'>
                    <img src='Slike/smrle.jpg' class='slikeClanak'>
                    <h2>Netko je papak</h2>
                    <p>Bla bla kupio sam novi ususivacč al ne radi a ne znam zašto jer piše da bi trebao raditi</p>
                    <a href='' class='linkProcitajVise'>Pročitaj više</a>
                    </div>";
                }
            ?>
        </div>
        <div class="vijesti-sport" id='sport'>
            <?php
                for($i = 0; $i < 4; $i++){
                    echo "<div class='vijesti'>
                    <img src='Slike/smrle.jpg' class='slikeClanak'>
                    <h2>Netko je papak</h2>
                    <p>Bla bla kupio sam novi ususivacč al ne radi a ne znam zašto jer piše da bi trebao raditi</p>
                    <a href='' class='linkProcitajVise'>Pročitaj više</a>
                    </div>";
                }
            ?>
        </div>
    </div>
    <footer>
        <p class="footer">Grgur Adamec | gadamec@tvz.hr | 2022.</p>
    </footer>
</body>
</html> 









<!-- // $dbc = mysqli_connect('localhost', 'root', '', 'vjezba_3') or
        // die('Error connecting to MySQL server.' . mysqli_connect_error());

        // $query = "SELECT * FROM korisnik";

        // $result = mysqli_query($dbc, $query) or die('Error querying database.');
        //     while($row = mysqli_fetch_array($result))
        //     {
        //         if($row['godine'] < 33){
        //             echo "<tr style='background-color:blue;'>";
        //             echo "<td>" . $row['id'] . "</td>";
        //             echo "<td>" . $row['ime'] . "</td>";
        //             echo "<td>" . $row['prezime'] . "</td>";
        //             echo "<td>" . $row['spol'] . "</td>";
        //             echo "<td>" . $row['telefon'] . "</td>";
        //             echo "<td>" . $row['email'] . "</td>";
        //             echo "<td>" . $row['godine'] . "</td>";
        //             echo "<td>" . $row['hobi'] . "</td>";
        //             echo "</tr>";
        //         } else{
        //             echo "<tr style='background-color:red;'>";
        //             echo "<td>" . $row['id'] . "</td>";
        //             echo "<td>" . $row['ime'] . "</td>";
        //             echo "<td>" . $row['prezime'] . "</td>";
        //             echo "<td>" . $row['spol'] . "</td>";
        //             echo "<td>" . $row['telefon'] . "</td>";
        //             echo "<td>" . $row['email'] . "</td>";
        //             echo "<td>" . $row['godine'] . "</td>";
        //             echo "<td>" . $row['hobi'] . "</td>";
        //             echo "</tr>";
        //         }
        //     }
        //     echo "</table>";
        

        // mysqli_close($dbc);  -->