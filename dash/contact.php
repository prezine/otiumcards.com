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
    <meta name="twitter:title" content="Otiumcards">
    <meta name="twitter:description" content="Otiumcards Dashboard">
    <meta name="twitter:image" content="">

    <!-- Facebook -->
    <meta property="og:url" content="">
    <meta property="og:title" content="Otiumcards">
    <meta property="og:description" content="">

    <meta property="og:image" content="">
    <meta property="og:image:secure_url" content="">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="PandaStudio">

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

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="assets/css/dashforge.css">
    <link rel="stylesheet" href="assets/css/dashforge.dashboard.css">
  </head>
  <body class="page-profile">
    <?php
      $uri['contact'] = "active";
      $uri['customize'] = $uri['home'] = $uri['settings'] = NULL;
      include_once './widget/header.php';
    ?>

    <div class="content content-fixed">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
          <div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">Hi Tom 👋🏽</a></li>
              </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Your Otiumcards Contacts</h4>
          </div>
          <div class="d-none d-md-block">
            <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="settings" class="wd-10 mg-r-5"></i> Customize Card</button>
          </div>
        </div>

        <div class="row row-xs">
          <div class="col-lg-12 col-xl-12 mg-t-10">
          <div data-label="Example" class="df-example demo-table">
          <table id="contacts" class="table">
            <thead>
              <tr>
                <th class="wd-20p">Name</th>
                <th class="wd-25p">Position</th>
                <th class="wd-20p">Country, State</th>
                <th class="wd-15p">Phone</th>
                <th class="wd-20p">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if ($contacts->fetchContactList($token) !== null) {
                  $allcontacts = $contacts->fetchContactList($token);
                  foreach ($allcontacts as $ac) {
                    echo 
                    '<tr>
                      <td class="tx-color-03 tx-normal">'. $otium->time_elapsed_string($ac['dateAdded']) .'</td>
                      <td class="tx-medium text-left">'. $ac['contactName'] .'</td>
                      <td class="text-left tx-teal">'. $ac['contactEmail'] .'</td>
                      <td class="text-left tx-pink">'. $ac['contactPhone'] .'</td>
                      <td>
                        <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5">View more <i data-feather="arrow-right" class="wd-10 mg-r-5"></i></button>
                      </td>
                    </tr>';
                  }
                }
              ?>
            </tbody>
          </table>
        </div><!-- df-example -->
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

    <script src="assets/js/dashforge.js"></script>
    <script src="assets/js/dashforge.sampledata.js"></script>
    <script src="assets/js/dashboard-one.js"></script>

    <!-- append theme customizer -->
    <script src="lib/js-cookie/js.cookie.js"></script>
    <script src="assets/js/dashforge.settings.js"></script>

    <!-- -->
    <script>
      $(function(){
        'use strict'
        $('#contacts').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });
        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
      });
    </script>

  </body>
</html>
