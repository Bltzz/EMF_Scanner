
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

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: registration.php");
    exit;
}

// Include config file
require_once "serverConnection.php";


$jauna_parole = $con_parole = "";
$jauna_parole_err = $con_parole_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["new_password"]))){
        $jauna_parole_err= "Type new password";
    } elseif(strlen(trim($_POST["new_password"])) < 6){
       $jauna_parole_err = "Password needs to contain atleast 6 characters!" ;
    } else{
        $jauna_parole = trim($_POST["new_password"]);
    }

    if(empty(trim($_POST["confirm_password"]))){
        $con_parole_err = "Confirm password";
    } else{
        $con_parole = trim($_POST["confirm_password"]);
        if(empty($jauna_parole_err) && ($jauna_parole != $con_parole)){
            $con_parole_err = "Passwords don't match!";
        }
    }

    if(empty($jauna_parole_err) && empty($con_parole_err)){

        $sql = "UPDATE lietotaji SET password = ? WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "si", $param_parole, $param_id);

            $param_parole = password_hash($jauna_parole, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            if(mysqli_stmt_execute($stmt)){
                session_destroy();
                header("location: tresais.php");
                exit();
            } else{
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
      <a class="navbar-brand" href="#"><h4>Valmiera transit</h4></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Log out</a>
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
            <img class="img-fluid" src="img/password.gif" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h2 class="display-4">Security first...</h2>
             <h2>Reset your password</h2>
    <p>Please fill in all the fields.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($jauna_parole_err)) ? 'has-error' : ''; ?>">
            <label>New Password</label>
            <input type="password" name="new_password" class="form-control" value="<?php echo $jauna_parole; ?>">
            <span class="help-block"><?php echo $jauna_parole_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($con_parole_err)) ? 'has-error' : ''; ?>">
            <label>Re-type new</label>
            <input type="password" name="confirm_password" class="form-control">
            <span class="help-block"><?php echo $con_parole_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Reset password">
           
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
