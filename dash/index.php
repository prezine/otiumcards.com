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
  <body class="page-profile">

    <?php
      $uri['home'] = "active";
      $uri['customize'] = $uri['contact'] = $uri['settings'] = NULL;
      include_once './widget/header.php';
    ?>

    <div class="content content-fixed">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
          <div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">Hi <?php echo $ln; ?> 👋🏽</a></li>
              </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Welcome to Otium Dashboard</h4>
          </div>
          <div class="d-none d-md-block">
            <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="settings" class="wd-10 mg-r-5"></i> Customize Card</button>
          </div>
        </div>

        <div class="row row-xs">
          <div class="col-sm-6 col-lg-4">
            <div class="card card-body">
              <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Swipped Card</h6>
              <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">Nil</h3>
                <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">0% <i class="icon ion-md-arrow-up"></i></span> than last week</p>
              </div>
            </div>
          </div><!-- col -->
          <div class="col-sm-6 col-lg-4 mg-t-10 mg-sm-t-0">
            <div class="card card-body">
              <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Account Verified</h6>
              <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1 tx-success">OK</h3>
              </div>
            </div>
          </div><!-- col -->
          <div class="col-sm-6 col-lg-4 mg-t-10 mg-lg-t-0">
            <div class="card card-body">
              <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Contact Count</h6>
              <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?php echo $user->countTotalContacts($token); ?></h3>
                <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-danger">0% <i class="icon ion-md-arrow-down"></i></span> than last week</p>
              </div>
            </div>
          </div><!-- col -->
          <div class="col-md-6 col-xl-4 mg-t-10 order-md-1 order-xl-0">
            <div class="card ht-lg-100p">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h6 class="mg-b-0">Quick Analytics</h6>
                <div class="tx-13 d-flex align-items-center">
                  <span class="mg-r-5">Country:</span> 
                  <a href="#" class="d-flex align-items-center link-03 lh-0"><?php echo ($country == null) ? 'Unknown' : $country; ?></a>
                </div>
              </div><!-- card-header -->
              <div class="card-body pd-0">
                <div class="pd-y-25 pd-x-20">
                  <img src="./assets/img/NG.svg" style="width: 100%">
                </div>
                <div class="table-responsive">
                  <table class="table table-borderless table-dashboard table-dashboard-one">
                    <thead>
                      <tr>
                        <th class="wd-40">States</th>
                        <th class="wd-25 text-right">Contacts</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="tx-medium">No State</td>
                        <td class="text-right">-</td>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- table-responsive -->
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-lg-12 col-xl-8 mg-t-10">
            <div class="card card-body ht-lg-100 mg-b-10">
              <div class="media">
                <span class="tx-color-04"><i data-feather="link" class="wd-60 ht-60"></i></span>
                <div class="media-body mg-l-20">
                  <h6 class="mg-b-10">My Unique Otiumcard Link is:</h6>
                  <p class="tx-color-03 mg-b-0">https://otiumcards.com/dash/connect/<?php echo ($nick == null) ? $token : $nick ; ?></p>
                </div>
              </div><!-- media -->
            </div>
            <div class="card mg-t-10">
              <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <div>
                  <h6 class="mg-b-5">My Contacts</h6>
                  <p class="tx-13 tx-color-03 mg-b-0">Find a list of your recently added Contacts on Otiumcard</p>
                </div>
              </div><!-- card-header -->
              <div class="card-body pd-y-30">
                <div class="d-sm-flex">
                  <div class="media">
                    <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-pink tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-5">
                      <i data-feather="bar-chart-2"></i>
                    </div>
                    <div class="media-body">
                      <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">Total Women</h6>
                      <h4 class="tx-20 tx-sm-18 tx-md-24 tx-normal tx-rubik mg-b-0"><?php echo $user->countTotalContactsGender($token, 'female'); ?></h4>
                    </div>
                  </div>
                  <div class="media mg-t-20 mg-sm-t-0 mg-sm-l-15 mg-md-l-40">
                    <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-primary tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-4">
                      <i data-feather="bar-chart-2"></i>
                    </div>
                    <div class="media-body">
                      <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">Total Men</h6>
                      <h4 class="tx-20 tx-sm-18 tx-md-24 tx-normal tx-rubik mg-b-0"><?php echo $user->countTotalContactsGender($token, 'male'); ?></h4>
                    </div>
                  </div>
                  <div class="media mg-t-20 mg-sm-t-0 mg-sm-l-15 mg-md-l-40">
                    <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-secondary tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-4">
                      <i data-feather="bar-chart-2"></i>
                    </div>
                    <div class="media-body">
                      <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">Total Non-binary</h6>
                      <h4 class="tx-20 tx-sm-18 tx-md-24 tx-normal tx-rubik mg-b-0"><?php echo $user->countTotalContactsGender($token, 'custom'); ?></h4>
                    </div>
                  </div>
                </div>
              </div><!-- card-body -->
              <div class="table-responsive">
                <table class="table table-dashboard mg-b-0">
                  <thead>
                    <tr>
                      <th>Date Swiped</th>
                      <th class="text-right">Full name</th>
                      <th class="text-right">Email Address</th>
                      <th class="text-right">Phone Number</th>
                      <th class="text-right">Role (Status)</th>
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
                            <td class="tx-medium text-right">'. $ac['contactName'] .'</td>
                            <td class="text-right tx-teal">'. $ac['contactEmail'] .'</td>
                            <td class="text-right tx-pink">'. $ac['contactPhone'] .'</td>
                            <td class="tx-medium text-right">'. $ac['contactRole'] .', '. $ac['contactCompany'].'</td>
                          </tr>';
                        }
                      }
                    ?>
                  </tbody>
                </table>
              </div><!-- table-responsive -->
            </div><!-- card -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- content -->

    <?php include_once './widget/footer.php'; ?>

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/feather-icons/feather.min.js"></script>
    <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
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

  </body>
</html>
