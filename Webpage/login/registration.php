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

  <!-- Custom styles -->
  <link href="css/get-beauty.min.css" rel="stylesheet">

</head>

<body>

  <?php
  // sākt sesiju
  session_start();

  // Paŗbauda, vai lietotājs ir piereģistrējies, ja jā iet uz welcome lapu
  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: userprofile1.php");
    exit;
  }

  // savienojums ar db
  require_once "serverConnection.php";

  $lietotajvards = $parole = "";
  $lietotajvards_err = $parole_err = "";

  // Apstrādā datus no formas
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Pārbauda vai username nav tukšs
    if (empty(trim($_POST["username"]))) {
      $lietotajvards_err = "Please enter a username.";
    } else {
      $lietotajvards = trim($_POST["username"]);
    }

    // Pārbauda vai parole nav tukša
    if (empty(trim($_POST["password"]))) {
      $parole_err = "Please enter a password.";
    } else {
      $parole = trim($_POST["password"]);
    }

    // Pārbauda ievadītos datus
    if (empty($lietotajvards_err) && empty($parole_err)) {
      //dabu baze
      $sql = "SELECT User_ID, User_username, password FROM User WHERE username = ?";

      if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind parametrs
        mysqli_stmt_bind_param($stmt, "s", $param_lietotajvards);

        // uzstāda tukso $
        $param_lietotajvards = $lietotajvards;

        if (mysqli_stmt_execute($stmt)) {
          // noglabaa rezultatu
          mysqli_stmt_store_result($stmt);

          // parbauda vai ir tads lietotajs, ja ir salidzina paroli
          if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $id, $lietotajvards, $hashed_password);
            if (mysqli_stmt_fetch($stmt)) {
              if (password_verify($parole, $hashed_password)) {
                if (!empty($_POST["remember"])) { //izveido cookies
                  setcookie("username", $_POST["username"], time() + (10 * 365 * 24 * 60 * 60));
                  setcookie("password", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));
                } else { //Izdzēš cookies value, ja neatzīmē
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

                // Uz welcome lapu
                header("location: userprofile1.php");
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
      <a class="navbar-brand" href="index.html">
        <h4>Valmiera transit</h4>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="signup.php">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registration.php">Log In</a>
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
            <img class="img-fluid" src="img/login.gif" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h2 class="display-4">You're about to login into your profile...</h2>
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
              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
              </div>
              <p>Don't have an account? <a href="signup.php">Sign up here!</a></p>
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