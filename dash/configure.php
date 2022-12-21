<?php
  session_start();
  include_once './app/controller/Otium.php';
  include_once './app/app.php';
  $otium = new Otium();
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
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DashForge">
    <meta name="twitter:description" content="Otiumcards Dashboard">
    <meta name="twitter:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/dashforge">
    <meta property="og:title" content="DashForge">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <title>My Contacts</title>

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
  <body class="page-profile">
    <?php
      $uri['customize'] = "active";
      $uri['contact'] = $uri['home'] = $uri['settings'] = NULL;
      include_once './widget/header.php';
    ?>

    <div class="content content-fixed">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
          <div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">Hi Tom 👋🏽</a></li>
              </ol>
            </nav>
            <h4 class="mg-b-30 tx-spacing--1">Customize your Otiumcards</h4>

            <div class="row">
                <div class="col-sm col-lg-6">
                    <div class="col-sm-12 col-xl-12">
                        <h6>Customize your Contact Background 🎨</h6>
                        <a href="#colorpicker" data-toggle="modal" class="outline-none">
                            <div id="colorPreview" class="bg-pandascrow ht-500 d-flex align-items-center justify-content-center mg-b-15">
                                <img src="./assets/img/form-preview.svg" width="300">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm col-lg-6">
                    <h6 class="mg-b-10">Background Color Gradient Picker 📍</h6>
                    <div class="row">
                        <div class="col-sm-4 col-xl-4">
                            <a href="#colorpicker" data-toggle="modal" class="outline-none" data-color="bg-pandascrow">
                                <div class="bg-pandascrow ht-120 d-flex align-items-center justify-content-center mg-b-15"></div>
                            </a>
                            <h6>Sun on the Horizon</h6>
                        </div>
                        <div class="col-sm-4 col-xl-4">
                            <a href="#colorpicker" data-toggle="modal" class="outline-none" data-color="bg-amin">
                                <div class="bg-amin ht-120 d-flex align-items-center justify-content-center mg-b-15"></div>
                            </a>
                            <h6>Amin</h6>
                        </div>
                        <div class="col-sm-4 col-xl-4">
                            <a href="#colorpicker" data-toggle="modal" class="outline-none" data-color="bg-ohHappiness">
                                <div class="bg-ohHappiness ht-120 d-flex align-items-center justify-content-center mg-b-15"></div>
                            </a>
                            <h6>OhHappiness</h6>
                        </div>
                        <div class="col-sm-4 col-xl-4">
                            <a href="#colorpicker" data-toggle="modal" class="outline-none" data-color="bg-mello">
                                <div class="bg-mello ht-120 d-flex align-items-center justify-content-center mg-b-15"></div>
                            </a>
                            <h6>Mello</h6>
                        </div>
                        <div class="col-sm-4 col-xl-4">
                            <a href="#colorpicker" data-toggle="modal" class="outline-none" data-color="bg-visionsOfGrandeur">
                                <div class="bg-visionsOfGrandeur ht-120 d-flex align-items-center justify-content-center mg-b-15"></div>
                            </a>
                            <h6>Vision of Grandeur</h6>
                        </div>
                        <div class="col-sm-4 col-xl-4">
                            <a href="#colorpicker" data-toggle="modal" class="outline-none" data-color="bg-blueSkies">
                                <div class="bg-blueSkies ht-120 d-flex align-items-center justify-content-center mg-b-15"></div>
                            </a>
                            <h6>Blue Skies</h6>
                        </div>
                        <div class="col-sm-4 col-xl-4">
                            <a href="#colorpicker" data-toggle="modal" class="outline-none" data-color="bg-sunkist">
                                <div class="bg-sunkist ht-120 d-flex align-items-center justify-content-center mg-b-15"></div>
                            </a>
                            <h6>Sun Kist</h6>
                        </div>
                        <div class="col-sm-4 col-xl-4">
                            <a href="#colorpicker" data-toggle="modal" class="outline-none" data-color="bg-sunOnTheHorizon">
                                <div class="bg-sunOnTheHorizon ht-120 d-flex align-items-center justify-content-center mg-b-15"></div>
                            </a>
                            <h6>Coal</h6>
                        </div>
                        <div class="col-sm-4 col-xl-4">
                            <a href="#colorpicker" data-toggle="modal" class="outline-none" data-color="bg-html">
                                <div class="bg-html ht-120 d-flex align-items-center justify-content-center mg-b-15"></div>
                            </a>
                            <h6>HTML</h6>
                        </div>
                    </div>
                </div>
            </div>

          </div><!-- col -->
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- content -->

    <?php include_once './widget/footer.php'; ?>

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
