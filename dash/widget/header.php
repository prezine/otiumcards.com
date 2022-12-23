<header class="navbar navbar-header navbar-header-fixed">
    <a href="dashboard-one.html" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
    <div class="navbar-brand">
    <a href="./" class="df-logo">
        <img src="<?php echo APP_URL . '../images/logo/logo.svg' ?>" style="width: 150px">
    </a>
    </div><!-- navbar-brand -->
    <div id="navbarMenu" class="navbar-menu-wrapper">
    <div class="navbar-menu-header">
        <a href="#" class="df-logo">
        <img src="<?php echo APP_URL . '../images/logo/logo.svg' ?>" style="width: 150px">
        </a>
        <a id="mainMenuClose" href="#"><i data-feather="x"></i></a>
    </div><!-- navbar-menu-header -->
    <ul class="nav navbar-menu">
        <li class="nav-label pd-l-20 pd-lg-l-25 d-lg-none">Main Navigation</li>
        <li class="nav-item <?php echo $uri['home'] ?>">
            <a href="./" class="nav-link"><i data-feather="pie-chart"></i> Dashboard</a>
        </li>
        <li class="nav-item <?php echo $uri['customize'] ?>">
            <a href="./configure" class="nav-link"><i data-feather="package"></i> Customize</a>
        </li>
        <li class="nav-item <?php echo $uri['contact'] ?>">
            <a href="./contact" class="nav-link"><i data-feather="layers"></i> My Contacts</a>
        </li>
        <li class="nav-item <?php echo $uri['settings'] ?>">
            <a href="#" class="nav-link"><i data-feather="layers"></i> Settings</a>
        </li>
    </ul>
    </div><!-- navbar-menu-wrapper -->
    <div class="navbar-right">
    <div class="dropdown dropdown-profile">
        <a href="dashboard-one.html" class="dropdown-link" data-toggle="dropdown" data-display="static">
            <div class="avatar avatar-sm"><img src="<?php echo $dp; ?>" class="rounded-circle" alt=""></div>
        </a><!-- dropdown-link -->
        <div class="dropdown-menu dropdown-menu-right tx-13">
            <div class="avatar avatar-lg mg-b-15"><img src="<?php echo $dp; ?>" class="rounded-circle" alt=""></div>
            <h6 class="tx-semibold mg-b-5"><?php echo $name; ?></h6>
            <p class="mg-b-25 tx-12 tx-color-03"><?php echo $email; ?></p>
            <div class="dropdown-divider"></div>
            <a href="<?php echo APP_URL . 'app/module/logout' ?>" class="dropdown-item"><i data-feather="log-out"></i>Sign Out</a>
        </div><!-- dropdown-menu -->
    </div><!-- dropdown -->
</header><!-- navbar -->