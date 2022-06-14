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
      $id = $_POST['idClanka'];
      $naslov = $_POST['naslov']; 
      $kratkiSadrzaj = $_POST['kratkiSadrzaj'];
      $clanak = $_POST['clanak'];
      $kategorija = $_POST['kategorija'];
      $datum = date("d.m.Y");

      if(isset($_POST['staraSlika'])) {
        $slika = $_POST['staraSlika'];
      }


    if(isset($_POST['provjera'])){
      $vidljivost = 1;
    }else{
      $vidljivost = 0;
    }
    
    if($_POST['idClanka'] == 0 || !empty($_FILES['slika']['name'])){
        $currentDirectory = getcwd();
        $uploadDirectory = "/Slike/";

        $errors = []; 

        $fileExtensionsAllowed = ['jpeg','jpg','png'];

        $fileName = $_FILES['slika']['name'];
        $fileSize = $_FILES['slika']['size'];
        $fileTmpName  = $_FILES['slika']['tmp_name'];
        $fileType = $_FILES['slika']['type'];

        $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

        $slika = 'Slike/' . basename($fileName);

        if (empty($errors)) {
          $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
        }
    }

    echo "<content>
    <div class='main'>
        <form method='post' action='saveClanak.php'>
          <input type='hidden' name='id' value='$id' />
          <input type='hidden' name='kategorija' value='$kategorija' />
          <input type='hidden' name='naslov' value='$naslov' />
          <input type='hidden' name='kratkiSadrzaj' value='$kratkiSadrzaj' />
          <input type='hidden' name='datum' value='$datum' />
          <input type='hidden' name='clanak' value='$clanak' />
          <input type='hidden' name='vidljivost' value='$vidljivost' />
          <input type='hidden' name='slika' value='$slika' />
          <button type='button' onclick='history.back()' class='btn btn-primary col' style='margin-left: 5%; margin-bottom: 10px;'> Povratak </button>
          <button type='submit' name='submit' class='btn btn-primary col' style=' margin-bottom: 10px;'> Spremi </button>
        </form>
        <article class='article'>
            <h4 style='color:red;'> $kategorija </h4>
            <br />
            <h1 class='naslov-clanka'> $naslov </h1>
            <br />
            <h6 style='color:grey;'> $datum </h6>
            <br />
            <img src='$slika' class='slikePreview'>
            <br/>
            <h4 class='bold-text'> $kratkiSadrzaj </h4>
            <br />
            <p class='word-break'>
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