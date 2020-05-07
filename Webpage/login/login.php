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
  // start session
  session_start();

  // Checks if the user is registered, if so go to the welcome page
  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ../Home/userprofile1.php");
    exit;
  }

  // db connection
  require_once "serverConnection.php";

  $lietotajvards = $parole = "";
  $lietotajvards_err = $parole_err = "";

  // Processes data from a form
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Checks if the username is empty
    if (empty(trim($_POST["username"]))) {
      $lietotajvards_err = "Please enter a username.";
    } else {
      $lietotajvards = trim($_POST["username"]);
    }

    // Check that the password is not blank
    if (empty(trim($_POST["password"]))) {
      $parole_err = "Please enter a password.";
    } else {
      $parole = trim($_POST["password"]);
    }

    //Checks the entered data
    if (empty($lietotajvards_err) && empty($parole_err)) {
      // database
      $sql = "SELECT User_ID, username, password FROM User WHERE username = ?";

      if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind parametrs
        mysqli_stmt_bind_param($stmt, "s", $param_lietotajvards);

        // uzstāda tukso $
        $param_lietotajvards = $lietotajvards;

        if (mysqli_stmt_execute($stmt)) {
          // save the result
          mysqli_stmt_store_result($stmt);

          // checks if there is a user if there is a comparison of the password
          if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $id, $lietotajvards, $hashed_password);
            if (mysqli_stmt_fetch($stmt)) {
              if (password_verify($parole, $hashed_password)) {
                if (!empty($_POST["remember"])) { //creates cookies
                  setcookie("username", $_POST["username"], time() + (10 * 365 * 24 * 60 * 60));
                  setcookie("password", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));
                } else { //Deletes cookies value if unchecked
                  if (isset($_COOKIE["username"])) {
                    setcookie("username", " ");
                  }
                  if (isset($_COOKIE["password"])) {
                    setcookie("password", " ");
                  }
                }


                // Password is correct, so start a new session
                session_start();

                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $lietotajvards;

                // forward to welcome page
                header("location: ../Home/userprofile1.php");
              } else {

                $parole_err = "Invalid password";
              }
            }
          } else {
            // Nav tāds lietotājs
            $lietotajvards_err = "It looks like no such user is registered";
          }
        } else {
          echo "Oops! Something went wrong, please try again later ";
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
        </ul>
      </div>
    </div>
  </nav>



  <section>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <div class="p-5">
            <h2 class="login100-form-title p-b-33">You're about to login into your profile</h2>
            <p>Sign in with your username and password</p>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <div class="form-group <?php echo (!empty($lietotajvards_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php if (isset($_COOKIE["username"])) {
                                                                                  echo $_COOKIE["username"];
                                                                                } ?> <?php echo $lietotajvards; ?>">
                <span class="help-block"><?php echo $lietotajvards_err; ?></span>
              </div>
              <div class="form-group <?php echo (!empty($parole_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" <?php if (isset($_COOKIE["password"])) {
                                                                              echo $_COOKIE["password"];
                                                                            } ?>>
                <span class="help-block"><?php echo $parole_err; ?></span>
              </div>
              <div class="form-group">
                <input type="checkbox" name="remember" <?php if (isset($_COOKIE["username"])) { ?> checked <?php } ?> />
                <label for="remember-me">Remember me</label>
              </div>
              <div class="container-login100-form-btn m-t-20">
                <button class="login100-form-btn" href="../Home/index.html">
                  Log in
                </button>
              </div>
              <p>Don't have an account? <a href="registration.php">Sign up here!</a></p>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Footer -->
  <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-black small">Copyright &copy; Andra and Jonas - Students @ Epitech Paris</p>
      <p class="m-0  text-center text-black small"><a href="mailto:jonas.pfaff@epitech.eu">jonas.pfaff@epitech.eu</a></p>
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