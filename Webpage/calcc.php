<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ticket prices</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Fonti -->
<link href="https://fonts.googleapis.com/css?family=Noto+Sans|Open+Sans" rel="stylesheet">

  <!-- Custom styles-->
  <link href="css/get-beauty.min.css" rel="stylesheet">
  <script>

var sum;
var a;
            function display() {
              if (a==null){
                alert("Please choose Discount type!")
              } else {
              var b = 26.00;
              sum  = b*a;
              sum = sum.toFixed(2);
              document.getElementById("info2").innerHTML = "Monthly ticket full price is 26 Eur. With your discount it is:  " + sum+" Eur!";
              }
            }
            function display4() {
              if (a==null){
                alert("Please choose Discount type!")
              } else {
              var b = 18.60;
              sum  = b*a;
              sum = sum.toFixed(2);
              document.getElementById("info2").innerHTML ="Monthly working day ticket full price is 18.60 Eur. With your discount it is:  " + sum+" Eur!";
              }
            }
            function display5() {
              if (a==null){
                alert("Please choose Discount type!")
              } else {
              var b = 2.30;
              sum  = b*a;
              sum = sum.toFixed(2);
              document.getElementById("info2").innerHTML ="Day ticket's full price is 2.30 Eur. With your discount it is:  " + sum+" Eur!";
              }
             }
            function display6() {
              if (a==null){
                alert("Please choose Discount type!")
              } else {
              var b = 0.60;
              sum  = b*a;
              sum = sum.toFixed(2);
              document.getElementById("info2").innerHTML ="One time ticket full price is 0.60 Eur. With your discount it is:  " + sum+" Eur!";
              }
            }
            function display7() {
              if (a==null){
                alert("Please choose Discount type!")
              } else {
                 var b = 6.00;
              sum  = b*a;
              sum = sum.toFixed(2);
              document.getElementById("info2").innerHTML ="Weekly ticket's full price is 0.60 Eur. With your discount it is:  " + sum+" Eur!";
              }
            }
             
         //-->
            function display1() {
              a =  0.50;
              document.getElementById("info1").innerHTML ="You have a 50% discount!";
              return a;
            }
            function display2() {
              a =  0.00;
              document.getElementById("info1").innerHTML ="You have a 100% discount!";
              return a;
            }
            function display3() {
              a =  0.1;
              document.getElementById("info1").innerHTML ="You have a 90% discount!";
              return a;
            }
            

  </script>
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
      <a class="navbar-brand" href="index.html"><h4>Valmiera transit</h4></a>
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
    <div id="learnmore" class="container">
      <div class="row align-items-center">
      
        <div class="col-lg-12 order-lg-1">
          <div class="p-5">
            <h2 class="display-4"><b> <?php echo htmlspecialchars($_SESSION["username"]); ?> calculate ticket prices!</b></h2>

            <p> </p><br>
<main>    
<h1>Tickets and prices</h1>
<p>To calculate your ticket price, please click first one of the discount type options and then one of the ticket type options.</p>
 <h4 class="great">Discount type</h4>
                    <span>Please choose one</span>
                    <div class="btn-group btn-group-justified">
                      <div class="btn-group btn-group-lg">
                        <button type="button"onclick="display1()" class="btn btn-primary btn-lg btn-block month active-month selected-month" id='students'>ViA Students, Valmiera pupils</button>
                      </div>
                      <div class="btn-group btn-group-lg">
                        <button type="button"onclick="display2()" class="btn btn-primary btn-lg btn-block month" id='pupils'>Pupils in Koceni County</button>
                      </div>
                      <div class="btn-group btn-group-lg">
                        <button type="button"onclick="display2()" class="btn btn-primary btn-lg btn-block month" id='disabled'>1st and 2nd group disabled people, disabled children + companion</button>
                      </div>
                    
                     <div class="btn-group btn-group-lg">
                        <button type="button"onclick="display1()" class="btn btn-primary btn-lg btn-block month" id='3+parent'>3+ card parents</button>
                      </div>
                   
                      <div class="btn-group btn-group-lg">
                        <button type="button"onclick="display3()" class="btn btn-primary btn-lg btn-block month" id='3+children'>3+ card children</button>			
                        </div>
                      </div>
                      <p id="info1"> </p>  
                      <div class="price-slider">
                    <h4 class="great">Ticket type</h4>
                    <span>Please choose one</span>
                      <input name="sliderVal" type="hidden" id="sliderVal" value='0' readonly="readonly" />
                <input name="month" type="hidden" id="month" value='24month' readonly="readonly" />
                <input name="term" type="hidden" id="term" value='quarterly' readonly="readonly" />
                      <div class="btn-group btn-group-justified">
                        <div class="btn-group btn-group-lg">
                          <button type="button"onclick="display()" class="btn btn-primary btn-lg btn-block term" id='monthly'>Monthly: 26.00 Eur</button>
                  </div>
                        <div class="btn-group btn-group-lg">
                          <button type="button"onclick="display4()" class="btn btn-primary btn-lg btn-block term" id='weekly'>Monthly,working days: 18.60 Eur </button>
                        </div>
                        <div class="btn-group btn-group-lg">
                          <button type="button"onclick="display5()" class="btn btn-primary btn-lg btn-block term" id='monthly'>Day ticket: 2.30 Eur</button>
                  </div>
                  <div class="btn-group btn-group-lg">
                          <button type="button"onclick="display6()" class="btn btn-primary btn-lg btn-block term" id='monthly'>One time ticket: 0.60 Eur</button>
                  </div>
                  <div class="btn-group btn-group-lg">
                          <button type="button"onclick="display7()" class="btn btn-primary btn-lg btn-block term" id='monthly'>Weekly ticket(monday-sunday): 6.00 Eur</button>
                  </div>
                      </div>
                  </div>
                  <p id="info2"> </p>     
 
    </form>
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