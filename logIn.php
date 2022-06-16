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
    <?php
      include 'header.php';
    ?>

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
                      if($_SESSION['role'] == 'admin'){
                        echo "<script>
                        location.href = 'urediVijest.php?id=admin';
                        </script>";
                      } else {
                        echo "<script>
                        location.href = 'index.php';
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
