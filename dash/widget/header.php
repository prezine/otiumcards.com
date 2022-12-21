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
        <div class="avatar avatar-sm"><img src="assets/img/img1.png" class="rounded-circle" alt=""></div>
        </a><!-- dropdown-link -->
        <div class="dropdown-menu dropdown-menu-right tx-13">
        <div class="avatar avatar-lg mg-b-15"><img src="assets/img/img1.png" class="rounded-circle" alt=""></div>
        <h6 class="tx-semibold mg-b-5">Katherine Pechon</h6>
        <p class="mg-b-25 tx-12 tx-color-03">Administrator</p>

        <a href="dashboard-one.html" class="dropdown-item"><i data-feather="edit-3"></i> Edit Profile</a>
        <a href="page-profile-view.html" class="dropdown-item"><i data-feather="user"></i> View Profile</a>
        <div class="dropdown-divider"></div>
        <a href="page-help-center.html" class="dropdown-item"><i data-feather="help-circle"></i> Help Center</a>
        <a href="dashboard-one.html" class="dropdown-item"><i data-feather="life-buoy"></i> Forum</a>
        <a href="dashboard-one.html" class="dropdown-item"><i data-feather="settings"></i>Account Settings</a>
        <a href="dashboard-one.html" class="dropdown-item"><i data-feather="settings"></i>Privacy Settings</a>
        <a href="page-signin.html" class="dropdown-item"><i data-feather="log-out"></i>Sign Out</a>
        </div><!-- dropdown-menu -->
    </div><!-- dropdown -->
    </div><!-- navbar-right -->
    <div class="navbar-search">
    <div class="navbar-search-header">
        <input type="search" class="form-control" placeholder="Type and hit enter to search...">
        <button class="btn"><i data-feather="search"></i></button>
        <a id="navbarSearchClose" href="dashboard-one.html" class="link-03 mg-l-5 mg-lg-l-10"><i data-feather="x"></i></a>
    </div><!-- navbar-search-header -->
    <div class="navbar-search-body">
        <label class="tx-10 tx-medium tx-uppercase tx-spacing-1 tx-color-03 mg-b-10 d-flex align-items-center">Recent Searches</label>
        <ul class="list-unstyled">
        <li><a href="dashboard-one.html">modern dashboard</a></li>
        <li><a href="app-calendar.html">calendar app</a></li>
        <li><a href="collections/modal.html">modal examples</a></li>
        <li><a href="components/el-avatar.html">avatar</a></li>
        </ul>

        <hr class="mg-y-30 bd-0">

        <label class="tx-10 tx-medium tx-uppercase tx-spacing-1 tx-color-03 mg-b-10 d-flex align-items-center">Search Suggestions</label>

        <ul class="list-unstyled">
        <li><a href="dashboard-one.html">cryptocurrency</a></li>
        <li><a href="app-calendar.html">button groups</a></li>
        <li><a href="collections/modal.html">form elements</a></li>
        <li><a href="components/el-avatar.html">contact app</a></li>
        </ul>
    </div><!-- navbar-search-body -->
    </div><!-- navbar-search -->
</header><!-- navbar -->