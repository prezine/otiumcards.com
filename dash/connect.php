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

    <title>Collect Contact</title>

    <!-- vendor css -->
    <link href="lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/jqvmap/jqvmap.min.css" rel="stylesheet">

    <link href="lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="lib/prismjs/themes/prism-vs.css" rel="stylesheet">
    <link href="lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="assets/css/dashforge.css">
    <link rel="stylesheet" href="assets/css/dashforge.dashboard.css">
  </head>
  <body class="page-profile bg-pandascrow">

    <div class="content content-fixed">
        <div class="container col-lg-6 offset-sm-3">
            <div class="align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                        <li class="breadcrumb-item"><a href="#">Hi There 👋🏽</a></li>
                    </ol>
                </nav>
                <h4 class="mg-b-30">I'm Tom Precious, Would like to have your contact Information</h4>
            </div><!-- row -->
        </div><!-- container -->
        <div class="col-sm col-lg-6 offset-sm-3">
            <div class="col-sm-12 col-xl-12">
                <form href="#form m-2 bg-pandascrow ht-500 mg-b-15">
                    <div class="form-group">
                      <label for="formGroupExampleInput" class="d-block">Fullname *</label>
                      <input type="text" class="form-control" placeholder="Enter your fullname" required>
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2" class="d-block">Email *</label>
                      <input type="email" class="form-control" placeholder="Enter your email address" required>
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput" class="d-block">Phone *</label>
                      <input type="tel" class="form-control" placeholder="Enter your phone number" required>
                    </div>
                    <div class="form-group">
                    <label for="custom-select" class="d-block">Select your gender *</label>
                    <select class="custom-select" required>
                      <option selected>Choose gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="custom">Custom</option>
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput" class="d-block" required>Profession *</label>
                      <input type="text" class="form-control" placeholder="Enter your profession">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2" class="d-block">Company (optional)</label>
                      <input type="text" class="form-control" placeholder="Enter where you work">
                    </div>
                    <button class="btn btn-primary" type="submit">Save Contact Details</button>
                    <button class="btn btn-secondary" type="reset">Reset Form</button>
                </form>
            </div>
        </div>
    </div><!-- content -->

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/feather-icons/feather.min.js"></script>
    <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="lib/prismjs/prism.js"></script>
    <script src="lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>
    <script src="lib/jquery.flot/jquery.flot.js"></script>
    <script src="lib/jquery.flot/jquery.flot.stack.js"></script>
    <script src="lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="lib/chart.js/Chart.bundle.min.js"></script>
    <script src="lib/jqvmap/jquery.vmap.min.js"></script>
    <script src="lib/jqvmap/maps/jquery.vmap.usa.js"></script>

    <script>
      $(function() {
        $('a[href="#colorpicker"]').on('click', function (e) {
            e.preventDefault();
            // var placeholderColor = $("#bgHolder").data('placeholder')
            $("#colorPreview").removeClass("bg-pandascrow bg-amin bg-ohHappiness bg-mello bg-visionsOfGrandeur bg-blueSkies bg-sunkist bg-sunOnTheHorizon bg-html")
            $("#colorPreview").addClass($(this).data('color'))
            // $("#bgHolder").attr('data-placeholder', $(this).data('color'))
            console.log($(this).data('color'))
        })
      });
    </script>

    <script src="assets/js/dashforge.js"></script>
    <script src="assets/js/dashforge.sampledata.js"></script>
    <script src="assets/js/dashboard-one.js"></script>

    <!-- append theme customizer -->
    <script src="lib/js-cookie/js.cookie.js"></script>
    <script src="assets/js/dashforge.settings.js"></script>
  </body>
</html>
