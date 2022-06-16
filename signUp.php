<?php
 session_start();
 
if(isset($_SESSION['username'])) {
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='Style.css'/>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <style>
        form .error {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <?php
      include 'header.php';
    ?>

    <content>
    <div class='main'>
            <?php
                if(isset($_POST['submit'])){
                  $ime = $_POST['ime'];
                  $prezime = $_POST['prezime'];
                  $korisnickoIme = $_POST['username'];
                  $lozinka = $_POST['password'];
                  $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);

                  include 'connect.php';

                  $query = "SELECT * FROM users";
                  $result = mysqli_query($dbc, $query) or die('Error querying database.');
                  $brojac = 0;

                  if($result) {
                      while($row = mysqli_fetch_array($result))
                      {
                          $kIme = $row['username'];

                          if($korisnickoIme == $kIme){
                              $brojac = 1;
                          }
                      }
                  }

                  if($brojac == 0){
                    $sql="INSERT INTO users (ime, prezime, username, password) values (?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($dbc);
                                
                    if (mysqli_stmt_prepare($stmt, $sql)){
                        mysqli_stmt_bind_param($stmt,'ssss', $ime, $prezime, $korisnickoIme, $hashed_password);
                        mysqli_stmt_execute($stmt);
                    } 
                    echo "<p class='footer'>Registracija uspješna!</p> <br />  <p class='footer'>Prijavite se na ovom <a href='logIn.php'>linku</a><p>";;
                  } else {
                      echo "<p class='footer'>Korinik već postoji.</p>";
                  }    
                }

                echo "<form method='post' name='signUp' action='' style='width:50%; margin:auto;'>

                <div class='form-outline mb-4'>
                  <label class='form-label' for='ime'>Ime</label>
                  <input type='text' id='ime' class='form-control' name='ime' />
                </div>

                <div class='form-outline mb-4'>
                  <label class='form-label' for='prezime'>Prezime</label>
                  <input type='text' id='prezime' class='form-control' name='prezime' />                 
                </div>

                <div class='form-outline mb-4'>
                  <label class='form-label' for='username'>Username</label>
                  <input type='text' id='username' class='form-control' name='username' />
                </div>
              
                <div class='form-outline mb-4'>
                  <label class='form-label' for='password'>Password</label>
                  <input type='password' id='password' class='form-control' name='password' />
                </div>

                <div class='form-outline mb-4' style='margin-bottom:20px;'>
                  <label class='form-label' for='password2'>Ponovite password</label>
                  <input type='password' id='password2' class='form-control' name='password2'  stlye='margin-bottom:20px;'  />
                </div>
              
                <!-- Submit button -->
                <button type='submit' id='submit' name='submit' class='btn btn-primary btn-block mb-4'>Sign up</button>
              
                <!-- Register buttons -->
                <div class='text-center'>
                    <br/>
                    <p>Already a member? <a href='logIn.php'>Log in</a></p>
                </div>
              </form>";
            ?>
        </div>
    </div>
    </content>

    <script>
      $(function() {
          $("form[name='signUp']").validate({
            rules: {
              ime: {
                  required: true,
              },
              prezime: {
                  required: true,
              },
              username: {
                  required: true,
                  minlength: 4,
                  maxlength: 15,
              },
              password: {
                  required: true,           
              },
              password2:{
                  required: true,
                  equalTo: "#password",
              }
            },

            messages: {
              ime: {
                required: "Ime ne smije biti prazno",
              },
              prezime: {
                required: "Prezime ne smije biti prazno",
              },
              username: {
                required: "Username ne smije biti prazan",
                minlength: "Username mora imati barem 4 znaka",
                maxlength: "Username može imati najviše 15 znakova"
              },
              password: {
                required: "Password ne smije biti prazan",
              },
              password2: {
                required: "Password ne smije biti prazan",
                equalTo: "Obje lozinke moraju biti iste",
              },
          },
      
            submitHandler: function(form) {
              form.submit();
            }
          });
        });
      </script>

    <footer>
        <p class='footer'>Grgur Adamec | gadamec@tvz.hr | 2022.</p>
    </footer>
</body>
</html> 