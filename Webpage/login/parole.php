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

  session_start();

  if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: registration.php");
    exit;
  }

  // Include config file
  require_once "serverConnection.php";


  $jauna_parole = $con_parole = "";
  $jauna_parole_err = $con_parole_err = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["new_password"]))) {
      $jauna_parole_err = "Type new password";
    } elseif (strlen(trim($_POST["new_password"])) < 6) {
      $jauna_parole_err = "Password needs to contain atleast 6 characters!";
    } else {
      $jauna_parole = trim($_POST["new_password"]);
    }

    if (empty(trim($_POST["confirm_password"]))) {
      $con_parole_err = "Confirm password";
    } else {
      $con_parole = trim($_POST["confirm_password"]);
      if (empty($jauna_parole_err) && ($jauna_parole != $con_parole)) {
        $con_parole_err = "Passwords don't match!";
      }
    }

    if (empty($jauna_parole_err) && empty($con_parole_err)) {

      $sql = "UPDATE lietotaji SET password = ? WHERE id = ?";

      if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "si", $param_parole, $param_id);

        $param_parole = password_hash($jauna_parole, PASSWORD_DEFAULT);
        $param_id = $_SESSION["id"];

        if (mysqli_stmt_execute($stmt)) {
          session_destroy();
          header("location: tresais.php");
          exit();
        } else {
          echo "Whoops! Didn't work.";
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
          <li class="nav-item">
            <a class="nav-link" href="registration.php">Sign Up</a>
          </li>
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
            <h2 class="login100-form-title p-b-33">Security first</h2>
            <h2 class="login100-form-title p-b-33">Reset your password</h2>
            <!-- <p>Please fill in all the fields.</p> -->
            <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <div class="form-group rs1 validate-input <?php echo (!empty($jauna_parole_err)) ? 'has-error' : ''; ?>">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control input100" value="<?php echo $jauna_parole; ?>">
                <span class="help-block"><?php echo $jauna_parole_err; ?></span>
              </div>
              <div class="form-group rs1 validate-input <?php echo (!empty($con_parole_err)) ? 'has-error' : ''; ?>">
                <label>Re-type Password</label>
                <input type="password" name="confirm_password" class="form-control input100">
                <span class="help-block"><?php echo $con_parole_err; ?></span>
              </div>
              <div class="container-login100-form-btn m-t-20">
                  <button class="login100-form-btn" href="../Home/index.html">
                    Reset Password
                  </button>
                </div>
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