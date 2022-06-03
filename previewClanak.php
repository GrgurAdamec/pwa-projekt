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
    
    
    $currentDirectory = getcwd();
    $uploadDirectory = "/Slike/";

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['jpeg','jpg','png']; // These will be the only file extensions allowed 

    $fileName = $_FILES['slika']['name'];
    $fileSize = $_FILES['slika']['size'];
    $fileTmpName  = $_FILES['slika']['tmp_name'];
    $fileType = $_FILES['slika']['type'];
    //$fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

    // if (! in_array($fileExtension,$fileExtensionsAllowed)) {
    //   $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
          // }

    // if ($fileSize > 4000000) {
    //   $errors[] = "File exceeds maximum size (4MB)";
    // }

    if (empty($errors)) {
      $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

    // if ($didUpload) {
    //   echo "The file " . basename($fileName) . " has been uploaded";
    // } else {
    //   echo "An error occurred. Please contact the administrator.";
    //   }
    // } else {
    //   foreach ($errors as $error) {
    //     echo $error . "These are the errors" . "\n";
    //   }
    }


    echo "<content>
    <div class='main'>
        <article class='article'>
            <h4 style='color:red;'> $kategorija </h4>
            <br />
            <h1 class='naslov-clanka'> $naslov </h1>
            <br />
            <h6 style='color:grey;'> 3.6.2022. </h6>
            <br />
            <img src='Slike/". basename($fileName) ."' class='slikeClanak slika'>
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