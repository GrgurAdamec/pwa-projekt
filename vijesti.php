<?php
 session_start();

 if(!isset($_GET['id'])) {
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
            <p class='word-break'>".$row['sadrzaj']."</p>";
          ?>
        </article>
    </div>
    </content>

    <footer>
        <p class="footer">Grgur Adamec | gadamec@tvz.hr | 2022.</p>
    </footer>
</body>
</html> 