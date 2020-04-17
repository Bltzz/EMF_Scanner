<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Upload</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Fonti -->
<link href="https://fonts.googleapis.com/css?family=Noto+Sans|Open+Sans" rel="stylesheet">

  <!-- Custom styles -->
  <link href="css/get-beauty.min.css" rel="stylesheet">

</head>
<body>

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
                <a class="nav-link" onclick="openNav()">Menu</a>
                <div id="mySidebar" class="sidebar">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                    <a href="userprofile1.php">My profile</a>
                    <a href="bus.html">Bus</a>
                    <a href="bicycle.html">Bicycle</a>
                    <a href="car.html">Car</a>
                  </div>
                  
                  
                  <script>
                  function openNav() {
                    document.getElementById("mySidebar").style.width = "250px";
                  }
                  
                  function closeNav() {
                    document.getElementById("mySidebar").style.width = "0";
                  }
                  </script>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Log out</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="parole.php">Reset password</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <section>
    <div id="learnmore" class="container">
      <div class="row align-items-center">
        <div class="col-lg-12 order-lg-4">
          <div class="p-5">
          <?php
            if(isset($_POST['upload'])){

            // File name
            $filename = $_FILES['imagefiles']['name'];
 
            // Valid extension
            $valid_ext = array('png','jpeg','jpg');

            // Location
            $location = "photos/".$filename;
            $thumbnail_location = "photos/thumbnail/".$filename;

            // file extension
            $file_extension = pathinfo($location, PATHINFO_EXTENSION);
            $file_extension = strtolower($file_extension);

            // Check extension
            if(in_array($file_extension,$valid_ext)){ 
 
              // Upload file
              if(move_uploaded_file($_FILES['imagefiles']['tmp_name'],$location)){

                  // Compress Image
                  compressImage($_FILES['imagefiles']['type'],$location,$thumbnail_location,60);

                   echo "Successfully Uploaded";
              }

            } else {
              echo "Something went wrong!";
            }
          }

           // Compress image
          function compressImage($type,$source, $destination, $quality) {

          $info = getimagesize($source);

          if ($type == 'image/jpeg') 
             $image = imagecreatefromjpeg($source);

            elseif ($type == 'image/gif') 
            $image = imagecreatefromgif($source);

            elseif ($type == 'image/png') 
            $image = imagecreatefrompng($source);

            imagejpeg($image, $destination, $quality);

          }

          ?>
        <br>
        <br>
        <a href="userprofile1.php" class="button btn btn-warning">Take me back!</a>
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

