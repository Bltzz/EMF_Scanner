<!DOCTYPE html>
<html lang="en">

<head>

  <title>EMF-Scanner</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/statistics.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <?php

  session_start();
  //or a login has been entered
  if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: registration.php");
    exit;
  }
  ?>

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
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
              <a class="nav-link" style="color:black" href="logout.php">Log out</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:black" href="parole.php">Reset password</a>
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
              <h2 class="display-4">Welcome <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>, into your profile!</h2>
              <br>
              <br>
              <p> Here you can manage your profile and your data! </p>
              <aside>
                <figure>
                  <div id="avatar"></div>
                  <figcaption>Choose your topic below:</figcaption>
                </figure>
                <nav>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="#data"><img src="images/rombs.png" alt="icon" width="14" height="14"> Data upload</a></li>
                    <li class="list-group-item"><a href="#news"><img src="images/rombs.png" alt="icon" width="14" height="14"> News</a></li>
                    <li class="list-group-item"><a href="#gallery"><img src="images/rombs.png" alt="icon" width="14" height="14"> Your Gallery</a></li>
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
        

    <div class="wrapper-statistics">
      <div class="panel">
        <div class="panel-header">
          <h3 class="title">Statistics</h3>

          <div class="calendar-views">
            <span>Day</span>
            <span>Week</span>
            <span>Month</span>
          </div>
        </div>

        <div class="panel-body">
          <div class="categories">
            <div class="category">
              <span>EMF-load</span>
              <span>1.897</span>
            </div>
            <div class="category">
              <span>Other load</span>
              <span>127</span>
            </div>
            <div class="category">
              <span>Stuff</span>
              <span>8.648</span>
            </div>
          </div>

          <div class="chart">
            <div class="operating-systems">
              <span class="ios-os">
                <span></span>iOS
              </span>
              <span class="windows-os">
                <span></span>Windows
              </span>
              <span class="android-os">
                <span></span>Android
              </span>
            </div>

            <div class="android-stats">
              453.67<span></span>
            </div>
            <div class="ios-stats">
              <span></span>453.67
            </div>
            <div class="windows-stats">
              <span></span>453.67
            </div>

            <svg width="563" height="204" class="data-chart" viewBox="0 0 563 204" xmlns="http://www.w3.org/2000/svg">
              <g fill="none" fill-rule="evenodd">
                <path class="dataset-1" d="M30.046 97.208c2.895-.84 5.45-2.573 7.305-4.952L71.425 48.52c4.967-6.376 14.218-7.38 20.434-2.217l29.447 34.46c3.846 3.195 9.08 4.15 13.805 2.52l31.014-20.697c4.038-1.392 8.485-.907 12.13 1.32l3.906 2.39c5.03 3.077 11.43 2.753 16.124-.814l8.5-6.458c6.022-4.577 14.563-3.676 19.5 2.056l54.63 55.573c5.622 6.526 15.686 6.647 21.462.258l37.745-31.637c5.217-5.77 14.08-6.32 19.967-1.24l8.955 7.726c5.42 4.675 13.456 4.63 18.82-.11 4.573-4.036 11.198-4.733 16.508-1.735l61.12 34.505c4.88 2.754 10.916 2.408 15.45-.885L563 90.915V204H0v-87.312-12.627c5.62-.717 30.046-6.852 30.046-6.852z" fill="#7DC855" opacity=".9"></path>
                <path class="dataset-2" d="M563 141.622l-21.546-13.87c-3.64-2.343-8.443-1.758-11.408 1.39l-7.565 8.03c-3.813 4.052-10.378 3.688-13.718-.758L469.83 84.58c-3.816-5.08-11.588-4.687-14.867.752l-28.24 46.848c-2.652 4.402-8.48 5.673-12.74 2.78l-15.828-10.76c-3.64-2.475-8.55-1.948-11.575 1.245l-53.21 43.186c-3.148 3.32-8.305 3.74-11.953.974l-100.483-76.2c-3.364-2.55-8.06-2.414-11.27.326l-18.24 15.58c-3.25 2.773-8.015 2.874-11.38.24L159.91 93.79c-3.492-2.733-8.467-2.51-11.697.525l-41.58 39.075c-2.167 2.036-5.21 2.868-8.117 2.218L39.05 112.5c-4.655-1.808-9.95-.292-12.926 3.7L0 137.31V204h563v-62.378z" fill="#F8E71C" opacity=".6"></path>
                <path class="dataset-3" d="M0 155.59v47.415c0 .55.448.995 1 .995h562v-43.105l-40.286 11.83c-3.127.92-6.493.576-9.368-.954l-53.252-28.32c-5.498-2.924-12.323-1.365-15.987 3.654l-25.48 34.902c-4.08 5.59-12.478 5.513-16.455-.148L360.06 121.92c-2.802-4.073-8.2-5.457-12.633-3.237L322.2 133.827c-4.415 2.21-9.792.848-12.604-3.196L282.78 99.25c-4.106-5.906-12.978-5.6-16.665.57l-26.757 44.794c-3.253 5.446-10.753 6.468-15.36 2.092l-16.493-15.673c-4.27-4.058-11.138-3.522-14.72 1.148l-23.167 30.21c-3.722 4.852-10.937 5.207-15.12.744l-44.385-47.345c-5.807-5.427-14.83-5.508-20.734-.19l-55.76 48.31c-3.76 3.26-9.127 3.93-13.582 1.703L0 155.59z" fill="#F5A623" opacity=".7"></path>
                <path class="lines" fill="#FFF" opacity=".2" d="M0 203h563v1H0zM0 153h563v1H0zM0 102h563v1H0zM0 51h563v1H0zM0 0h563v1H0z"></path>
              </g>
            </svg>
          </div>
        </div>
      </div>
    </div>
      </section>
      <!-- <section>
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
    </section> -->
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
            <h2 class="display-3">Your Gallery</h2>
            <br>
            <p>Put all the memories of your paths in one place! Upload your pictures below. </p>
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
              $image_extensions = array("png", "jpg", "jpeg", "gif");

              // Target directory
              $dir = 'photos/';
              if (is_dir($dir)) {

                if ($dh = opendir($dir)) {
                  $count = 1;

                  // Read files
                  while (($file = readdir($dh)) !== false) {

                    if ($file != '' && $file != '.' && $file != '..') {

                      // Thumbnail image path
                      $thumbnail_path = "photos/thumbnail/" . $file;

                      // Image path
                      $image_path = "photos/" . $file;

                      $thumbnail_ext = pathinfo($thumbnail_path, PATHINFO_EXTENSION);
                      $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);

                      // Check its not folder and it is image file
                      if (
                        !is_dir($image_path) &&
                        in_array($thumbnail_ext, $image_extensions) &&
                        in_array($image_ext, $image_extensions)
                      ) {
              ?>
                        <!-- Image -->
                        <a href="<?= $image_path; ?>">
                          <img src="<?= $thumbnail_path; ?>">
                        </a>
                        <?php
                        // Break
                        if ($count % 4 == 0) {
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
      <p class="m-0 text-center text-white small">Copyright &copy; Andra and Jonas 2020</p>
      <p class="m-0  text-center text-white small"><img src="images/email.png" alt="email" width="30" height="30"><a href="mailto:jonas.pfaff@epitech.eu"> jonas.pfaff@epitech.eu</a></p>
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