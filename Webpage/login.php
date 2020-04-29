
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Valmiera transit</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Fonti -->
<link href="https://fonts.googleapis.com/css?family=Noto+Sans|Open+Sans" rel="stylesheet">

  <!-- Custom styles-->
  <link href="css/get-beauty.min.css" rel="stylesheet">

</head>

<body>

<?php
require_once "serverConnection.php";

$lietotajvards = $parole = $con_parole = "";
$lietotajvards_err = $parole_err = $con_parole_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Lietotājavārda konfirmācija
    if(empty(trim($_POST["username"]))){
        $lietotajvards_err= "Enter your username";
    } else{
        $sql = "SELECT User_ID FROM User WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)) { 

            mysqli_stmt_bind_param($stmt, "s", $param_lietotajvards);

            $param_lietotajvards = trim($_POST["username"]);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $lietotajvards_err = "This user is already registered";
                } else{
                    $lietotajvards = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Failed to register user!";
            }
        }
        mysqli_stmt_close($stmt);
    }

//paroles konfirmācija
    if(empty(trim($_POST["password"]))){
        $parole_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 10 || strlen(trim($_POST["password"])) > 50) {
        $parole_err = "Password must have at least 10 and maximum 50 characters.";
    } else{
        $parole = trim($_POST["password"]);
    }

    if(empty(trim($_POST["confirm_password"]))){
        $con_parole_err = "Please confirm the password";
    } else{
        $con_parole = trim($_POST["confirm_password"]);
        if(empty($parole_err) && ($parole != $con_parole)){
            $con_parole_err = "Passwords do not match";
        }
    }
    //Pārbauda errors pirms ieraksta datubāzē
    if(empty($lietotajvards_err) && empty($parole_err) && empty($con_parole_err)){

        $sql = "INSERT INTO User (username, password) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_lietotajvards, $param_parole);

            $param_lietotajvards = $lietotajvards;
            $param_parole = password_hash($parole, PASSWORD_DEFAULT); // Passwort to hash

            if(mysqli_stmt_execute($stmt)){
                // Pārmet uz login lapu
                header("location: tresais.php");
            } else{
                echo "Oops! Failed, please try again later!";
            }
        }
         mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
}
?>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.html"><h4>Valmiera transit</h4></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="signup.html">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Log In</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  

  <section>
    <div id="learnmore" class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="img/04.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h2 class="display-4">Welcome, new friend...</h2>
            <p>Create your profile to stay tuned with upcoming news from us and get all the news about getting around in Valmiera first!</p>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group <?php echo (!empty($lietotajvards_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $lietotajvards; ?>">
                <span class="help-block"><?php echo $lietotajvards_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($parole_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $parole; ?>">
                <span class="help-block"><?php echo $parole_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($con_parole_err)) ? 'has-error' : ''; ?>">
                <label>Confirm password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $con_parole; ?>">
                <span class="help-block"><?php echo $con_parole_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Create profile">
                <input type="reset" class="btn btn-default" value="Clean up!">
            </div>
            <p>Have account already? <a href="registration.php">Login</a></p>
        </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; Andra Website 2019</p>
      <p class="m-0  text-center text-white small"><img src="images/email.png" alt="email" width="30" height="30"><a href="mailto:info@vtu-valmiera.lv">info@vtu-valmiera.lv</a></p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
