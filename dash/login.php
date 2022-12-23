<?php
  session_start();
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
    <meta property="og:title" content="Otiumcards">
    <meta property="og:description" content="">

    <meta property="og:image" content="#">
    <meta property="og:image:secure_url" content="#">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="PandaStudio">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/favicon.png">

    <title>Otiumcards Login</title>

    <!-- vendor css -->
    <link href="./lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="./lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="./assets/css/dashforge.css">
    <link rel="stylesheet" href="./assets/css/dashforge.auth.css">
  </head>
  <body>

    <header class="navbar navbar-header navbar-header-fixed">
      <a href="page-signin.html#" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
      <div class="navbar-brand">
        <a href="./" class="df-logo">
            <img src="../images/logo/logo.svg" width="150px">
        </a>
      </div><!-- navbar-brand -->
      <div id="navbarMenu" class="navbar-menu-wrapper">
        <div class="navbar-menu-header">
          <a href="./" class="df-logo">
            <img src="../images/logo/logo.svg" width="150px">
          </a>
          <a id="mainMenuClose" href="./"><i data-feather="x"></i></a>
        </div><!-- navbar-menu-header -->
      </div><!-- navbar-menu-wrapper -->
    </header><!-- navbar -->

    <div class="content content-fixed content-auth">
      <div class="container">
        <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
          <div class="media-body align-items-center d-none d-lg-flex">
            <div class="mx-wd-600">
              <img src="./assets/img/img15.png" class="img-fluid" alt="">
            </div>
          </div><!-- media-body -->
          <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
            <form action="./app/module/login" method="post" class="wd-100p">
              <h3 class="tx-color-01 mg-b-5">Sign In</h3>
              <p class="tx-color-03 tx-16 mg-b-40">Welcome back! Please signin to continue.</p>
              <?php 
                if (isset($_SESSION['errorMessage'])) {
                  echo $_SESSION['errorMessage'];
                  unset($_SESSION['errorMessage']);
                }
              ?>
              <div class="form-group">
                <label>Email address</label>
                <input type="email" name="email" class="form-control" placeholder="yourname@yourmail.com">
              </div>
              <div class="form-group">
                <div class="d-flex justify-content-between mg-b-5">
                  <label class="mg-b-0-f">Password</label>
                  <a href="./forgotpassword" class="tx-13">Forgot password?</a>
                </div>
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
              </div>
              <button type="submit" class="btn btn-brand-02 btn-block">Sign In</button>
            </form>
          </div><!-- sign-wrapper -->
        </div><!-- media -->
      </div><!-- container -->
    </div><!-- content -->

    <footer class="footer">
      <div>
        <span>&copy; <?php echo date("Y") ?> Otiumcards v1.0.0. </span>
        <span>developed by <a href="#">Pandastudio</a></span>
      </div>
      <div>
        <nav class="nav">
          <a href="https://themeforest.net/licenses/standard" class="nav-link">Privacy Policy</a>
          <a href="http://themepixels.me/demo/dashforge1.1/change-log.html" class="nav-link">Terms of Services</a>
        </nav>
      </div>
    </footer>

    <script src="./lib/jquery/jquery.min.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./lib/feather-icons/feather.min.js"></script>
    <script src="./lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="./assets/js/dashforge.js"></script>

    <!-- append theme customizer -->
    <script src="./lib/js-cookie/js.cookie.js"></script>
    <script src="./assets/js/dashforge.settings.js"></script>
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
