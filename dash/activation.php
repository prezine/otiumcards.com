<?php
  session_start();
  include_once './app/connect.php';
  include_once './app/controller/Otium.php';
  include_once './app/controller/Database.php';
  include_once './app/controller/User.php';
  include_once './app/app.php';
  $otium = new Otium();
  $db = new Database($conn);
  $user = new Users($conn);
  $token = (empty($_GET['token'])) ? null : $_GET['token'] ;
  $token = $otium->cleanurl($token);
  if ($token == null) {
    die("You do not have any token required to be here :(");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@pandastudio">
    <meta name="twitter:creator" content="@pandastudio">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Otiumcards">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">

    <!-- Facebook -->
    <meta property="og:url" content="#">
    <meta property="og:title" content="Otiumcards Activation">
    <meta property="og:description" content="">

    <meta property="og:image" content="#">
    <meta property="og:image:secure_url" content="#">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="Pandastudio">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo APP_URL . 'assets/img/favicon.png' ?>">

    <title>Otiumcards Activation</title>

    <!-- vendor css -->
    <link href="<?php echo APP_URL . 'lib/@fortawesome/fontawesome-free/css/all.min.css' ?>" rel="stylesheet">
    <link href="<?php echo APP_URL . 'lib/ionicons/css/ionicons.min.css' ?>" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="<?php echo APP_URL . 'assets/css/dashforge.css' ?>">
    <link rel="stylesheet" href="<?php echo APP_URL . 'assets/css/dashforge.auth.css' ?>">
  </head>
  <body>

    <header class="navbar navbar-header navbar-header-fixed">
      <a href="#" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
      <div class="navbar-brand">
        <a href="<?php echo APP_URL; ?>" class="df-logo">
            <img src="<?php echo APP_URL . '../images/logo/logo.svg' ?>" width="150px">
        </a>
      </div><!-- navbar-brand -->
      <div id="navbarMenu" class="navbar-menu-wrapper">
        <div class="navbar-menu-header">
          <a href="<?php echo APP_URL ?>" class="df-logo">
            <img src="<?php echo APP_URL . '../images/logo/logo.svg' ?>" width="150px">
          </a>
          <a id="mainMenuClose" href="<?php echo APP_URL ?>"><i data-feather="x"></i></a>
        </div><!-- navbar-menu-header -->
      </div><!-- navbar-menu-wrapper -->
    </header><!-- navbar -->

    <div class="content content-fixed content-auth">
      <div class="container">
        <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
          <div class="media-body align-items-center d-none d-lg-flex">
            <div class="mx-wd-600">
              <img src="<?php echo APP_URL . 'assets/img/activator.jpeg' ?>" class="img-fluid" alt="">
            </div>
          </div><!-- media-body -->
          <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
            <form action="../app/module/activatecard" method="post" class="wd-100p">
              <h3 class="tx-color-01 mg-b-5">Activate your Card</h3>
              <p class="tx-color-03 tx-16 mg-b-40">Hello, Otiumite 👋🏽</p>
              <?php 
                if (isset($_SESSION['errorMessage'])) {
                  echo $_SESSION['errorMessage'];
                  unset($_SESSION['errorMessage']);
                }
              ?>
              <div class="form-group">
                <label>Otium Token</label>
                <input type="text" class="form-control" name="token" value="<?php echo $token; ?>" placeholder="token" readonly>
              </div>
              <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="John Doe">
              </div>
              <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="yourname@yourmail.com">
              </div>
              <div class="form-group">
                <label>Phone Number</label>
                <input type="tel" name="phone" class="form-control" placeholder="+234xxxxxxxxxx">
              </div>
              <div class="form-group">
                <label>Choose Gender</label>
                <select class="form-control" name="gender">
                  <option value="Gender" disabled selected>Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Others">Others</option>
                </select>
              </div>
              <div class="form-group">
                <div class="d-flex justify-content-between mg-b-5">
                  <label class="mg-b-0-f">Password</label>
                </div>
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
              </div>
              <button class="btn btn-brand-02 btn-block">Activate My Otiumcard</button>
              <div class="tx-13 mg-t-20 tx-center">Something is wrong? <a href="<?php echo APP_URL . '' ?> mailto:support@otiumcards.com">Contact Support</a></div>
            </form>
          </div><!-- sign-wrapper -->
        </div><!-- media -->
      </div><!-- container -->
    </div><!-- content -->

    <footer class="footer">
      <div>
        <span>&copy; <?php echo date("Y") ?> Otiumcards v1.0.0. </span>
        <span>developed by <a href="<?php echo APP_URL . '' ?> #">Pandastudio</a></span>
      </div>
      <div>
        <nav class="nav">
          <a href="#" class="nav-link">Privacy Policy</a>
          <a href="#" class="nav-link">Terms of Services</a>
        </nav>
      </div>
    </footer>

    <script src="<?php echo APP_URL . 'lib/jquery/jquery.min.js' ?>"></script>
    <script src="<?php echo APP_URL . 'lib/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
    <script src="<?php echo APP_URL . 'lib/feather-icons/feather.min.js' ?>"></script>
    <script src="<?php echo APP_URL . 'lib/perfect-scrollbar/perfect-scrollbar.min.js' ?>"></script>

    <script src="<?php echo APP_URL . 'assets/js/dashforge.js' ?>"></script>

    <!-- append theme customizer -->
    <script src="<?php echo APP_URL . 'lib/js-cookie/js.cookie.js' ?>"></script>
    <script src="<?php echo APP_URL . 'assets/js/dashforge.settings.js' ?>"></script>
    <script>
      $(function(){
        'use script'

        window.darkMode = function(){
          $('.btn-white').addClass('btn-dark').removeClass('btn-white');
        }

        window.lightMode = function() {
          $('.btn-dark').addClass('btn-white').removeClass('btn-dark');
        }

        var hasMode = Cookies.get('df-mode');
        if(hasMode === 'dark') {
          darkMode();
        } else {
          lightMode();
        }
      })
    </script>
  </body>
</html>
