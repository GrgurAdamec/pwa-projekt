<header>
        <h1 class="naslov">L'Grgur Vijesti</h1>
        <?php
            if(isset($_SESSION['username'])){
                echo "Prijavljeni ste kao ";
                echo $_SESSION['username'];
            }
        ?>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="kategorije.php?kategorija=POLITIKA">Politika</a></li>
                    <li><a href="kategorije.php?kategorija=SPORT">Sport</a></li>
                    <?php
                    if(isset($_SESSION['username'])){
                        echo"<li><a href='unos.php'>Kreiraj članak</a></li>";
                    }
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
                        <li><a href='logIn.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                    }
                    if(isset($_SESSION['username'])){
                        echo "<li><a href='logOut.php'>Log out</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </header>