<?php
session_start();

if(isset($_SESSION['username'])) {
  header('Location: http://localhost/Vjezbe/Projekt/index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='Style.css'/>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
</head>
<body>
      <header>
        <h1 class="naslov">L'Grgur Vijesti</h1>

        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="unos.php">Kreiraj članak</a></li>
            <li><a href="kategorije.php?kategorija=POLITIKA">Politika</a></li>
            <li><a href="kategorije.php?kategorija=SPORT">Sport</a></li>
            <?php
            if(isset($_SESSION['username']) && $_SESSION['role'] == 'admin'){
                echo "<li><a href='urediVijest.php'>Uredi vijest</a></li>";
            }
            ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
            if(!isset($_SESSION['username'])){
                echo"
                <li><a href='signUp.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
                <li><a href='#'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
            }
            if(isset($_SESSION['username'])){
                echo "<li><a href='logOut.php'>Log out</a></li>";
            }
            ?>
          </ul>
        </div>
        </nav>
      </header>

    <content>
    <div class='main'>
            <?php
                if(isset($_POST['submit'])){
                  include'connect.php';
      
                  $korisnickoIme = $_POST['username'];
                  $lozinka = $_POST['password'];
      
                  $query = "SELECT * FROM users";
                  $result = mysqli_query($dbc, $query) or die('Error querying database.');
                  $brojac = 0;
      
                  if($result) {
                      while($row = mysqli_fetch_array($result))
                      {
                          $kIme = $row['username'];
                          $hash_lozinka = $row['password'];
                          // $hash_lozinka = substr($hash_lozinka, 0, 60 );
      
      
                          if($korisnickoIme == $kIme){
                              if(password_verify($lozinka, $hash_lozinka)){
                                  $brojac = 1;
                                  $_SESSION['role'] = $row['autorizacija'];
                              } 
                          }
                      }
                  }
      
                  if($brojac == 1){
                      $_SESSION['username'] = $korisnickoIme;
                      echo "Dobrodošli ";
                      echo $_SESSION['username'];
                      if($_SESSION['role'] == 'admin'){
                        echo "<script>
                        location.href = 'urediVijest.php';
                        </script>";
                      }
                  } else {
                      echo "Krivi username ili password. <br /> Ukoliko niste registrirani registrirajte se na ovom <a href='signUp.php'>linku</a>";
                  }
      
                  mysqli_close($dbc);
                }

                echo "<form method='post' action='' style='width:50%; margin:auto;'>
                <!-- Email input -->
                <div class='form-outline mb-4'>
                  <input type='text' id='username' name='username' class='form-control' />
                  <label class='form-label' for='username'>Username</label>
                </div>
              
                <!-- Password input -->
                <div class='form-outline mb-4'>
                  <input type='password' id='password' name='password' class='form-control' />
                  <label class='form-label' for='password'>Password</label>
                </div>
              
                <!-- Submit button -->
                <button type='submit' id='submit' name='submit' class='btn btn-primary btn-block mb-4'>Sign in</button>
              
                <!-- Register buttons -->
                <div class='text-center'>
                    <br/>
                    <p>Not a member? <a href='signUp.php'>Register</a></p>
                </div>
              </form>";

            ?>
        </div>
    </div>
    </content>

    <footer>
        <p class='footer'>Grgur Adamec | gadamec@tvz.hr | 2022.</p>
    </footer>
</body>
</html> 
