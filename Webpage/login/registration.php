<!DOCTYPE html>
<html lang="en">

<head>

  <title>EMF Scanner</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!--===============================================================================================-->
</head>


<body>

  <?php
  require_once "serverConnection.php";

  $lietotajvards = $parole = $con_parole = "";
  $lietotajvards_err = $parole_err = $con_parole_err = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Lietotājavārda konfirmācija
    if (empty(trim($_POST["username"]))) {
      $lietotajvards_err = "Enter your username";
    } else {
      $sql = "SELECT User_ID FROM User WHERE username = ?";

      if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $param_lietotajvards);

        $param_lietotajvards = trim($_POST["username"]);

        if (mysqli_stmt_execute($stmt)) {
          mysqli_stmt_store_result($stmt);

          if (mysqli_stmt_num_rows($stmt) == 1) {
            $lietotajvards_err = "This user is already registered";
          } else {
            $lietotajvards = trim($_POST["username"]);
          }
        } else {
          echo "Oops! Failed to register user!";
        }
      }
      mysqli_stmt_close($stmt);
    }

    //paroles konfirmācija
    if (empty(trim($_POST["password"]))) {
      $parole_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 10 || strlen(trim($_POST["password"])) > 50) {
      $parole_err = "Password must have at least 10 and maximum 50 characters.";
    } else {
      $parole = trim($_POST["password"]);
    }

    if (empty(trim($_POST["confirm_password"]))) {
      $con_parole_err = "Please confirm the password";
    } else {
      $con_parole = trim($_POST["confirm_password"]);
      if (empty($parole_err) && ($parole != $con_parole)) {
        $con_parole_err = "Passwords do not match";
      }
    }
    //Pārbauda errors pirms ieraksta datubāzē
    if (empty($lietotajvards_err) && empty($parole_err) && empty($con_parole_err)) {

      $sql = "INSERT INTO User (username, password) VALUES (?, ?)";

      if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $param_lietotajvards, $param_parole);

        $param_lietotajvards = $lietotajvards;
        $param_parole = password_hash($parole, PASSWORD_DEFAULT); // Passwort to hash

        if (mysqli_stmt_execute($stmt)) {
          // Pārmet uz login lapu
          header("location: tresais.php");
        } else {
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
      <a class="navbar-brand" href="../Home/index.html">
        <h4>EMF-Scanner</h4>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <!-- <li class="nav-item">
            <a class="nav-link" href="signup.html">Sign Up</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="login.php">Log In</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <section>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100" >
            <div class="p-5">
              <h2 class="login100-form-title p-b-33">Welcome, new friend...</h2>
              <p>Create your profile to stay tuned with upcoming news from us and track your daily EMF load.</p>
              <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group wrap-input100 validate-input" <?php echo (!empty($lietotajvards_err)) ? 'has-error' : ''; ?>">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control input100" placeholder="Username" value="<?php echo $lietotajvards; ?>">
                  <span class="help-block"><?php echo $lietotajvards_err; ?></span>
                </div>
                <div class="form-group wrap-input100 rs1 validate-input" data-validate="Password is required" <?php echo (!empty($parole_err)) ? 'has-error' : ''; ?>">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control input100" type="password" placeholder="Password" value="<?php echo $parole; ?>">
                  <span class="help-block"><?php echo $parole_err; ?></span>
                </div>
                <div class="form-group wrap-input100 rs1 validate-input" <?php echo (!empty($con_parole_err)) ? 'has-error' : ''; ?>">
                  <label>Confirm password</label>
                  <input type="password" name="confirm_password" class="form-control input100" type="password" placeholder="Type Password again" value="<?php echo $con_parole; ?>">
                  <span class="help-block"><?php echo $con_parole_err; ?></span>
                </div>
                <div class="container-login100-form-btn m-t-20">
                  <button class="login100-form-btn" href="../Home/index.html">
                    Sign in
                  </button>
                </div>
                <p>Have account already? <a href="login.php">Login</a></p>
              </form>
            </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; Andra and Jonas - Students @ Epitech Paris</p>
      <p class="m-0  text-center text-white small"><img src="images/email.png" alt="email" width="30" height="30"><a href="mailto:jonas.pfaff@epitech.eu">jonas.pfaff@epitech.eu</a></p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
  <!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>

</html>