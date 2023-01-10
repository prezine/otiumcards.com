<?php
  session_start();
  include_once './app/connect.php';
  include_once './app/controller/Otium.php';
  include_once './app/controller/Database.php';
  include_once './app/controller/Auth.php';
  include_once './app/controller/Hash.php';
  include_once './app/controller/OtiumErrors.php';
  include_once './app/controller/User.php';
  include_once './app/controller/Contacts.php';
  $otium = new Otium();
  $hash = new Encryption();
  $auth = new Auth($conn);
  $errno = new Errno($conn);
  $user = new Users($conn);
  $contacts = new Contacts($conn);
  include_once './app/module/userdata.php';
  if (!isset($_SESSION['userID'])) {
    header("location: ./login");
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
    <meta name="twitter:title" content="Otiumcard">
    <meta name="twitter:description" content="Otiumcards Dashboard">
    <meta name="twitter:image" content="">

    <!-- Facebook -->
    <meta property="og:url" content="">
    <meta property="og:title" content="Otiumcard">
    <meta property="og:description" content="">

    <meta property="og:image" content="">
    <meta property="og:image:secure_url" content="">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="Otiumcards">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <title>Dashboard Otiumcard</title>

    <!-- vendor css -->
    <link href="lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="assets/css/dashforge.css">
    <link rel="stylesheet" href="assets/css/dashforge.dashboard.css">
   </head>
   <body>
        <?php
            $uri['settings'] = "active";
            $uri['customize'] = $uri['contact'] = $uri['home'] = NULL;
            include_once './widget/header.php';
        ?>
      <!-- navbar -->
      <div class="content content-fixed content-auth-alt">
         <div class="container ht-100p tx-center">
            <div class="row justify-content-center">
               <div class="col-10 col-sm-6 col-md-4 col-lg-3 d-flex flex-column">
                  <div class="tx-100 lh-1">
                    <img src="<?php echo $dp; ?>">
                  </div>
                  <h3 class="mg-b-25"><?php echo $name; ?></h3>
                  <p class="tx-color-03 mg-b-25"><?php echo $email; ?></p>
               </div>
               <!-- col -->
               <div class="col-10 col-sm-6 col-md-8 col-lg-8 mg-t-40 mg-sm-t-0 d-flex flex-column">
                    <div class="col-sm-12 text-left col-xl-12">
                        <form action="app/module/updateprofile" method="POST" href="#form">
                        <?php 
                            if (isset($_SESSION['errorMessage'])) {
                            echo $_SESSION['errorMessage'];
                            unset($_SESSION['errorMessage']);
                            }
                        ?>
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="d-block">My Fullname</label>
                            <input type="text" name="fullname" class="form-control" placeholder="Enter your fullname" value="<?php echo $name; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2" class="d-block">My Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email address" value="<?php echo $email; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="d-block">My Phone</label>
                            <input type="tel" name="phone" class="form-control" placeholder="Enter your phone number" value="<?php echo $phone; ?>" readonly>
                        </div>
                        <div class="form-group">
                        <label for="custom-select" class="d-block">Select your gender</label>
                        <select name="gender" class="custom-select" required>
                            <option selected>Choose gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Custom">Custom</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2" class="d-block">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" placeholder="Enter where you work">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="d-block" required>Enter Nick</label>
                            <input type="text" name="nick" class="form-control" placeholder="Enter your Nick" value="<?php echo $nick; ?>">
                        </div>
                        <input type="hidden" name="userID" value="<?php echo $userID; ?>">
                        <button class="btn btn-success" type="submit">Update My Otiumcard Data</button>
                        </form>
                    </div>
               </div>
               <!-- col -->
            </div>
            <!-- row -->
         </div>
         <!-- container -->
      </div>
      <!-- content -->
      <?php include_once './widget/footer.php'; ?>

      <script src="lib/jquery/jquery.min.js"></script>
      <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="lib/feather-icons/feather.min.js"></script>
      <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
      <script src="assets/js/dashforge.js"></script>
      <!-- append theme customizer -->
      <script src="lib/js-cookie/js.cookie.js"></script>
      <script src="assets/js/dashforge.settings.js"></script>
   </body>
</html>