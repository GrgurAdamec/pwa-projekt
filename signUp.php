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
        <h1 class='naslov'>L'Grgur Vijesti</h1>

        <nav class='navbar navbar-inverse'>
        <div class='container-fluid'>
          <ul class='nav navbar-nav'>
            <li class='active'><a href='index.php'>Home</a></li>
            <li><a href='unos.php?id=0'>Kreiraj članak</a></li>
            <li><a href='kategorije.php?kategorija=POLITIKA'>Politika</a></li>
            <li><a href='kategorije.php?kategorija=SPORT'>Sport</a></li>
            <li><a href='urediVijest.php'>Uredi vijest</a></li>
          </ul>
          <ul class='nav navbar-nav navbar-right'>
            <li><a href='#'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
            <li><a href='logIn.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <content>
    <div class='main'>
            <?php
                echo "<form style='width:50%; margin:auto;'>
                <!-- Email input -->
                <div class='form-outline mb-4'>
                  <input type='text' id='username' class='form-control' />
                  <label class='form-label' for='username'>Username</label>
                </div>

                <div class='form-outline mb-4'>
                  <input type='text' id='ime' class='form-control' />
                  <label class='form-label' for='ime'>Ime</label>
                </div>

                <div class='form-outline mb-4'>
                  <input type='text' id='prezime' class='form-control' />
                  <label class='form-label' for='prezime'>Prezime</label>
                </div>
              
                <!-- Password input -->
                <div class='form-outline mb-4'>
                  <input type='password' id='password' class='form-control' />
                  <label class='form-label' for='password'>Password</label>
                </div>

                <div class='form-outline mb-4'>
                  <input type='password2' id='password2' class='form-control' />
                  <label class='form-label' for='password2'>Ponovite password</label>
                </div>
              
                <!-- Submit button -->
                <button type='button' class='btn btn-primary btn-block mb-4'>Sign up</button>
              
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

    <footer>
        <p class='footer'>Grgur Adamec | gadamec@tvz.hr | 2022.</p>
    </footer>
</body>
</html> 