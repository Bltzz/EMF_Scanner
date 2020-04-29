

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
  <link href='photobox-master/photobox/photobox.css' rel='stylesheet' type='text/css'>
  <link href="css/get-beauty.min.css" rel="stylesheet">
  <link href='css/gallery-style.css' rel='stylesheet' type='text/css'>

</head>

<body>

<?php

session_start();
//pardauda vai logins ir ievadits
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: registration.php");
    exit;
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
          <li class="nav-item">
            <a class="nav-link" href="parole.php">Reset password</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  

  <section>
    <div style="padding-top: 10rem;" class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid" src="img/profile.gif" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h2 class="display-3">Welcome, <b><?php echo htmlspecialchars($_SESSION["username"]); ?>, into your profile!</b></h2>
            <br>
            <br>
            <p> All you need to now about getting around Valmiera in one place! </p>
            <aside>
        <figure>
            <div id="avatar"></div>
            <figcaption>Choose your topic below:</figcaption> 
        </figure>
        <nav>
            <ul class="list-group list-group-flush"> 
                <li class="list-group-item"><a href="#transportation"><img src="images/rombs.png" alt="icon" width="14" height="14">   Transportation</a></li>
                <li class="list-group-item"><a href="#news"><img src="images/rombs.png" alt="icon" width="14" height="14">   News</a></li>
                <li class="list-group-item"><a href="#gallery"><img src="images/rombs.png" alt="icon" width="14" height="14">   Your Trafgallery</a></li>
            </ul>
        </nav>
</aside>
<main>    
   
          </div>
        </div>
      </div>
    </div>
    <!-- Transportation -->

   <section>
    <div style="padding-top: 5rem;" id="transportation" class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="p-5">
            <ul class="list-unstyled">
  <li class="media">
    <img class="img-fluid mr-3" src="img/bus.png" alt="Generic placeholder image">
    <div style="padding-top: 4rem; padding-left: 2rem;" class="media-body">
      <h5 class="mt-0 mb-1"><a href="bus.html">Bus</a></h5>
      If you prefer city transportation - find bus tables and more <a href="bus.html">here</a>!
  </li>
  <li class="media my-4">
    <img class="mr-3" src="img/bicycle.png" alt="Generic placeholder image">
    <div style="padding-top: 4rem; padding-left: 2rem;" class="media-body">
      <h5 class="mt-0 mb-1"><a href="bicycle.html">Bicycle</a></h5>
      All the information needed for bicycle lovers <a href="bicycle.html">here!</a>
    </div>
  </li>
  <li class="media">
    <img class="mr-3" src="img/car.png" alt="Generic placeholder image">
    <div style="padding-top: 4rem; padding-left: 2rem;" class="media-body">
      <h5 class="mt-0 mb-1"><a href="car.html">Car</a></h5>
      Information for all the carholders in Valmiera <a href="car.html"> here! </a>
    </div>
  </li>
</ul>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="p-3">
            <h2 class="display-3">What is your favorite type of transportation?</h2>
            <p></p>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- News -->
<section>
      <div style="padding-top: 5rem;" id="news" class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid" src="img/news.gif" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h2 class="display-3">Traffic news for you!</h2>
            <p>All the useful information about road construction and other things to be aware of in one place!</p>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <div class="p-5">
<div class="media">
  <div class="media-body">
    <h5 class="mt-0 mb-1">Kārlis and Lillija street</h5>
  
In 2018 the reconstruction of Kārlis and Lilija streets was not completed. Kārlis Street will have a technological break (asphalt covering is not applied). Works are scheduled to be completed in May 2019.
  </div>
  <img src="img/clock.png" class="ml-3" alt="...">
</div>
        </div>
      </div>
    </div>
    <br>
        </div>

          <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <div class="p-5">
<div class="media">
  <div class="media-body">
    <h5 class="mt-0 mb-1">Valmiera Insutrial Highway </h5>
  
The construction of the Valmiera West Industrial Highway is continuing with the construction of the street at Leona Paegles Street along Putriņi forest to Ausekļa Street, as well as at Ausekļa Street from Voldemāra Baloža to Leona Paegles Street.
  </div>
  <img src="img/construction.png" class="ml-3" alt="...">
</div>
        </div>
      </div>
    </div>
    <br>
        </div>

 <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <div class="p-5">
<div class="media">
  <div class="media-body">
    <h5 class="mt-0 mb-1">Paegles and Brežes street crossroads </h5>
  

From April 16, Brēžas Street is connected to Leona Paegles Street. Therefore, by May 1, the traffic flow will be organized along one lane at the intersection of León Paegles and Brēžes streets.
  </div>
  <img src="img/barrier.png" class="ml-3" alt="...">
</div>
        </div>
      </div>
    </div>
    <br>
        </div>

      </div>
    </div>
  </section>
  
  <!-- Gallery -->

  <section>
    <div style="padding-top: 5rem;padding-bottom: 5rem;" id="gallery" class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <div class="p-5">
            <h2 class="display-3">Your Trafgallery</h2>
            <br>
            <p>Put all the memories of your paths in Valmiera in one place! Upload your pictures below. </p>
            <form action="upload.php" method="post" enctype="multipart/form-data">
              <h2>Photo upload</h2>
              <br>
              <label for="fileSelect">File:</label>
              <input type="file" name="imagefiles" id="fileSelect">
              <p><strong>Keep in mind:</strong> Only .jpg, .jpeg, .gif, .png max 5 MB.</p>
              <input class="button btn btn-warning" type="submit" name="upload" value="Upload">
              <br>
              <br>
              <h2>My photos:</h2>
            </form>
    <div class="gallery">
        <?php 
          // Image extensions
          $image_extensions = array("png","jpg","jpeg","gif");

          // Target directory
          $dir = 'photos/';
          if (is_dir($dir)){

          if ($dh = opendir($dir)){
             $count = 1;

          // Read files
          while (($file = readdir($dh)) !== false){

            if($file != '' && $file != '.' && $file != '..'){

              // Thumbnail image path 
              $thumbnail_path = "photos/thumbnail/".$file;

              // Image path
              $image_path = "photos/".$file;

              $thumbnail_ext = pathinfo($thumbnail_path, PATHINFO_EXTENSION);
              $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);

              // Check its not folder and it is image file
              if(!is_dir($image_path) && 
                in_array($thumbnail_ext,$image_extensions) && 
                in_array($image_ext,$image_extensions)){
        ?>
          <!-- Image -->
          <a href="<?= $image_path; ?>">
          <img src="<?= $thumbnail_path; ?>">
          </a>
        <?php
          // Break
          if( $count%4 == 0){
        ?>
          <div class="clear"></div>
        <?php 
             }
             $count++;
          }
       }

      }
        closedir($dh);
     }
   }
   ?>
   </div>


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

  <!-- JavaScript for ajax and photobox -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="photobox-master/photobox/jquery.photobox.js"></script>


</body>

</html>


